<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Illuminate\Support\Str;

class UserController extends BaseAdminController
{
    public function show(User $user)
    {

    }
    
    public function update_datos(Request $request, User $user)
    {
        
        $this->validate($request, [
            'name' => 'required',
            'nickname' => 'required',
            'num_doc' => 'required',
            'type_doc' => 'required',
            'address' => 'required|max:60',
            'distrito' => 'required',
            'id_distrito' => 'required',
            'phone' => 'nullable|numeric',
            'movil' =>'required|numeric',
            'about_me' => 'required',
            'title' => 'required|max:45',
            'email2' => 'nullable|email:rfc,dns'
            ]);

        $success = true;

        \DB::beginTransaction();
    		try {
            $profile = Profile::find($user->id);
            $profile->type_doc = $request->get('type_doc');
            $profile->num_doc = $request->get('num_doc');
            $profile->distrito = $request->get('distrito');
            $profile->id_distrito = $request->get('id_distrito');
            $profile->address = $request->get('address');
            $profile->phone = $request->get('phone');
            $profile->movil = $request->get('movil');
            $profile->about_me = $request->get('about_me');
            $profile->title = $request->get('title');
            $profile->email2 = $request->get('email2');
            $profile->save();
            
            $user->name = $request->get('name');
            $user->nickname = $request->get('nickname');
            $user->save();
        } catch (\Exception $exception) {
            $success = $exception->getMessage();
            \DB::rollBack();
        }
        if($success === true) {
            \DB::commit();
            return redirect()->route('datos')->withFlash('Se actulizo datos de usuario');
        }

		session()->flash('message', ['danger', $success]);
    	return redirect('login'); 

    }

    public function update_redes(Request $request, User $user)
    {
        $this->validate($request, [
            'url_facebook' => 'nullable|url',
            'url_linkedin' => 'nullable|url',
            'url_twitter' => 'nullable|url',
            'url_instagram'=> 'nullable|url',
            'url_youtube' =>'nullable|url',
            'url_web'=> 'nullable|url',
            'w_messenger'=> 'nullable|numeric',
            'w_bussines'=> 'nullable|numeric'
            ]);
        return $request;
    }

    public function update_password(Request $request, User $user)
    {
        $this->validate($request, [
            'password' => 'confirmed|min:8'
            ]);
            $user->password = Hash::make($request['password']);
            $user->save();
        return redirect()->route('datos', $user)->withFlash('Se cambio la contraseña');
    }

    public function update_email(Request $request, User $user)
    {
        return $request;
    }

    

    public function update_foto(Request $request, User $user)
    {
        if ($foto = $request->file('foto_up')) {
          
            $request->validate([
                'foto_up' => 'required|image|mimes:jpeg,png,jpg|max:1024',
            ]);
            
            $foto = $request->file('foto_up');
            if(isset($user->avatar))
            {
                $actual = $user->avatar;
                Storage::disk('public')->delete("avatars/$actual");
            }
           
            $imageName = $user->id . Str::random(10) .'.jpg';
            $imagen = Image::make($foto)->encode('jpg', 75);
            $imagen->resize(200, 200, function ($constraint) {
                $constraint->upsize();
            });
            Storage::disk('public')->put("avatars/$imageName", $imagen->stream());
            $user->avatar = $imageName;
            $user->save();
            return redirect()->route('datos', $user)->withFlash('Foto subida');
        }
       
        return redirect()->route('datos', $user)->withFlash('No se subio ninguna Foto');
    }

}
