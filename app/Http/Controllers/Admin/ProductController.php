<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

use App\Http\Requests;
use App\Http\Requests\SaveProductRequest;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;

class ProductController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(auth()->user()->type == 'publisher') $products = Product::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->paginate(15);
		else $products = Product::orderBy('id', 'desc')->paginate(15);
		//dd($products);
		return view('admin.product.index', compact('products'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = Category::orderBy('id', 'desc')->lists('name', 'id');
		//dd($categories);
		return view('admin.product.create', compact('categories'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function store(SaveProductRequest $request)
	{
		if(auth()->user()->type == 'admin') $visible = $request->has('visible') ? 1 : 0;
		else $visible = 0;

		$data = [
			'name'          => $request->get('name'),
			'slug'          => str_slug($request->get('name')),
			'description'   => $request->get('description'),
			'extract'       => $request->get('extract'),
			'price'         => $request->get('price'),
			'image'         => $request->get('image'),
			'visible'       => $visible,
			'category_id'   => $request->get('category_id'),
			'user_id'       => auth()->user()->id
		];

		$product = Product::create($data);

		$msg = $product ? 'Producto agregado correctamente!' : 'El producto NO pudo agregarse!';

		if($product){
			if(auth()->user()->type == 'publisher'){
				// Correo al admin
				Mail::send('emails.new_product_publisher', ['product' => $product], function($message){
					$user_name = auth()->user()->name . " " . auth()->user()->last_name;
					$message->to('laura.hermosa2112@gmail.com', 'lau')->subject('El publicador ' . $user_name . " agrego un producto");
				});
			}
		}
		
		return redirect()->route('admin.product.index')->with('message', $msg);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Product $product)
	{
		return $product;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Product $product)
	{
		$categories = Category::orderBy('id', 'desc')->lists('name', 'id');

		return view('admin.product.edit', compact('categories', 'product'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Request  $request
	 * @param  int  $id
	 * @return Response
	 */
	public function update(SaveProductRequest $request, Product $product)
	{
		$product->fill($request->all());
		$product->slug = str_slug($request->get('name'));
		if(auth()->user()->type == 'admin') $product->visible = $request->has('visible') ? 1 : 0;
		//$product->visible = $request->has('visible') ? 1 : 0;
		
		$updated = $product->save();
		
		$message = $updated ? 'Producto actualizado correctamente!' : 'El Producto NO pudo actualizarse!';
		
		return redirect()->route('admin.product.index')->with('message', $message);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Product $product)
	{
		$deleted = $product->delete();
		
		$message = $deleted ? 'Producto eliminado correctamente!' : 'El producto NO pudo eliminarse!';
		
		return redirect()->route('admin.product.index')->with('message', $message);
	}
}
