<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Mail;

use App\User;
use Validator;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	protected $redirectPath = '/';
	//protected $redirectAfterLogout = "/auth/login";

	/**
	 * Create a new authentication controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest', ['except' => 'getLogout']);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data)
	{
		return Validator::make($data, [
			'name' 		=> 'required|max:255',
			'last_name' => 'max:255',
			'email' 	=> 'required|email|max:255|unique:users',
			'user' 		=> 'required|max:255|unique:users',
			//'password' 	=> 'required|confirmed|min:6',
			//'address' 	=> 'required',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	protected function create(array $data)
	{
		$random_password = str_random(8);

		$user = User::create([
			'name' 		=> $data['name'],
			'last_name' => $data['last_name'],
			'email' 	=> $data['email'],
			'user' 		=> $data['user'],
			'type' 		=> "user",
			'active' 	=> 1,
			'password' 	=> bcrypt($random_password),
			'address' 	=> $data['address'],
		]);

		if($user){
			// Correo al usuario
			Mail::send('emails.new_user_account', ['user' => $user, 'password' => $random_password], function($message) use ($user){
				$message->to($user->email, $user->name . " " . $user->last_name)->subject("Nueva cuenta de usuario en Tienda Demo");
			});

			// Correo al admin
			Mail::send('emails.notify_admin_new_user', ['user' => $user], function($message) use ($user){
				$message->to('laura.hermosa2112@gmail.com', "Admin Tienda Demo")->subject("Nueva cuenta de usuario de " . $user->name . " " . $user->last_name);
			});

			$msg = "Tu cuenta ha sido creada y se te envio un correo a " . $user->email . " con tus datos de acceso, ";
			$msg .= "si no lo recibes revisa tu spam.";
		}else{
			$msg = "Error: La cuenta no pudo crearse.";
		}

		$user->msg = $msg;

		return $user;
	}

	public function postRegister(Request $request)
	{
		$validator = $this->validator($request->all());

		if ($validator->fails()) {
			$this->throwValidationException(
				$request, $validator
			);
		}

		$user = $this->create($request->all());

		return redirect('/')->with('message', $user->msg);
	}
}
