<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Administrator;
use Illuminate\Support\Str;

class AdministratorFotosController extends BaseBackendController
{
    public function update(Request $request, Administrator $administrator)
    {
        if ($foto = $request->file('foto_up')) {
          
            $request->validate([
                'foto_up' => 'required|image|mimes:jpeg,png,jpg|max:1024',
            ]);
            
            $foto = $request->file('foto_up');
            if(isset($administrator->foto))
            {
                $actual = $administrator->foto;
                Storage::disk('public')->delete("avatars/$actual");
            }
           
            $imageName = $administrator->id . Str::random(10) .'.jpg';
            $imagen = Image::make($foto)->encode('jpg', 75);
            $imagen->resize(200, 200, function ($constraint) {
                $constraint->upsize();
            });
            Storage::disk('public')->put("avatars/$imageName", $imagen->stream());
            $administrator->foto = $imageName;
            $administrator->save();
            return redirect()->route('backend.administrators.edit', $administrator)->withFlash('Foto subida');
        }
       
        return redirect()->route('backend.administrators.edit', $administrator)->withFlash('No se subio ninguna Foto');
    }

   
}
