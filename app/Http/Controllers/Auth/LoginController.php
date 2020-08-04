<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\User;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller {
	/*
		    |--------------------------------------------------------------------------
		    | Login Controller
		    |--------------------------------------------------------------------------
		    |
		    | This controller handles authenticating users for the application and
		    | redirecting them to your home screen. The controller uses a trait
		    | to conveniently provide its functionality to your applications.
		    |
	*/

	use AuthenticatesUsers;

	/**
	 * Where to redirect users after login.
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
		$this->middleware('guest')->except('logout');
		
	}

	 // Metodo encargado de la redireccion a Facebook
     public function redirectToProvider($provider)
     {
         return Socialite::driver($provider)->redirect();
     }

     // Metodo encargado de obtener la información del usuario
    public function handleProviderCallback($provider)
    {
        // Obtenemos los datos del usuario
         $social_user = Socialite::driver($provider)->user(); 
        
        
        // Comprobamos si el usuario ya existe
        if ($user = User::where('email', $social_user->email)->first()) { 
            return $this->authAndRedirect($user); // Login y redirección
        } else {  
            // En caso de que no exista creamos un nuevo usuario con sus datos.

            
            $id = $social_user->id;
            $fbUrl = $social_user->avatar;
            $photoUrl = 'profile_'.$id.'.jpg';
            $image = Image::make(file_get_contents($fbUrl))->encode('jpg', 75);
            Storage::disk('public')->put('avatars/'. $photoUrl, $image->stream());
            
            $splitName = explode(' ',  $social_user->name, 2); 
		    // Restricts it to only 2 values, for names like Billy Bob Jones
            $username = $splitName[0];
        
            $user = User::create([
                
                'name' => $social_user->name,
                'nickname' => $username,
                'email' => $social_user->email,
                'avatar' => $photoUrl
            ]);

            $user->email_verified_at = now();
            $user->save();

            return $this->authAndRedirect($user); // Login y redirección
        }
    }


    // Login y redirección
    public function authAndRedirect($user)
    {
        Auth::login($user);

        return redirect()->to('/admin/cuenta');
    }

}
