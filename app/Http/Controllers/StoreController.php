<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\User;
use Validator;

class StoreController extends Controller
{
	public function index()
	{
		$products = Product::where('visible', 1)->orderBy('id', 'desc')->paginate(15);
		//dd($products);
		return view('store.index', compact('products'));
	}

	public function show($slug)
	{
		$product = Product::where('slug', $slug)->where('visible', '1')->first();
		//dd($product);

		return view('store.show', compact('product'));
	}

	public function getPerfil()
	{
		if(\Auth::check()){
			if(\Auth::user()->type == 'admin') return redirect()->route('home');
			
			$user = User::findOrFail(\Auth::user()->id);
			return view('store.perfil', compact('user'));
		}else{
			return redirect()->route('login-get');
		}
	}

	public function postPerfil(Request $request)
	{
		if(!\Auth::check()) return redirect()->route('login-get');
		
		$validator = Validator::make($request->all(), [
			'name' 		=> 'required|max:50',
			'last_name' => 'required|max:50',
			'email' 	=> 'required|email',
			'address' 	=> 'max:250',
			'telefono' 	=> 'max:20',
			'celular' 	=> 'max:20',
			'type' 		=> 'in:user,publisher',
			'password'	=> ($request->get('password') != "") ? 'required|confirmed' : "",
		]);

		if ($validator->fails()) {
			return redirect('perfil')
						->withErrors($validator)
						->withInput();
		}
		
		$user = User::findOrFail(\Auth::user()->id);
		
		$user->name 		= $request->get('name');
		$user->last_name 	= $request->get('last_name');
		$user->email 		= $request->get('email');
		$user->telefono 	= $request->get('telefono');
		$user->celular 		= $request->get('celular');
		$user->address 		= $request->get('address');
		$user->type 		= $request->get('type');
		$user->info_visible = $request->has('info_visible') ? 1 : 0;
		if($request->get('password') != "") $user->password = \Hash::make($request->get('password'));
		
		$user->save();
		
		$message = 'Perfil actualizado correctamente!';
        
        return redirect()->route('get-perfil')->with('message', $message);
	}
}
