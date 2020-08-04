<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use App\Profile;


class RegisterController extends Controller {
	/*
		    |--------------------------------------------------------------------------
		    | Register Controller
		    |--------------------------------------------------------------------------
		    |
		    | This controller handles the registration of new users as well as their
		    | validation and creation. By default this controller uses a trait to
		    | provide this functionality without requiring any additional code.
		    |
	*/

	use RegistersUsers;
	/**
	 * Where to redirect users after registration.
	 *
	 * @var string
	 */
	protected $redirectTo = '/admin/cuenta';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('guest');
	}

	 /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
		$this->validator($request->all())->validate();

		$success = true;

		$splitName = explode(' ', $request['name'], 2); 
		// Restricts it to only 2 values, for names like Billy Bob Jones
		$username = $splitName[0];
		// $last_name = !empty($splitName[1]) ? $splitName[1] : ''; // If last name doesn't exist, make it empty

		
		\DB::beginTransaction();
    		try {
				$user = User::create([
					'name' => $request['name'],
					'nickname'=> $username,
					'email' => $request['email'],
					'password' => Hash::make($request['password']),
				]);
		
				Profile::create([
					'user_id' => $user->id,
					//'nickname' => $user->name,
				]);
    			
		    } catch (\Exception $exception) {
				$success = $exception->getMessage();
				\DB::rollBack();
			}
			if($success === true) {
				\DB::commit();
				//enviar email
				event(new Registered($user));
				$this->guard()->login($user);
       			 return $this->registered($request, $user) ? : redirect($this->redirectPath());
			}

		session()->flash('message', ['danger', $success]);
    	return redirect('login'); 
    }

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data) {
		return Validator::make($data, [
			'name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:users',
			'password' => 'required|string|min:6|confirmed',
		]);
	}

	

	/**
	 * @param array $data
	 *
	 * @return mixed
	 */
	protected function create(array $data) {
		
			return User::create([
				'name' => $data['name'],
				'email' => $data['email'],
				'password' => Hash::make($data['password']),
			]);
	
			
			
		
    		
	    
	    
    
	}




}
