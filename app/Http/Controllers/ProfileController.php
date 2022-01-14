<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use File;
use Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function update(Request $request){
		$user = User::find(Auth::user()->id);
    	$user->name = $request->name;
    	$user->email = $request->email;
        $user->jabatan = $request->jabatan;
        $user->location = $request->location;
        $user->phone = $request->phone;
    	if ($request->password) {
    		$user->password = Hash::make($request->password);
    	}
    	if ($request->has('foto')) {
    		$foto = $request->file('foto');
			$folder = 'uploads'; 
			$filename = "avatar_".Auth::user()->id.".".$foto->getClientOriginalExtension();
            if (Auth::user()->foto) {
                File::delete(Auth::user()->foto);
            }
			$foto->move($folder, $filename);
    		$user->foto = $folder . "/" . $filename;
    	}
	    $user->save();

        return redirect()->route('profile');
    }

    public function generate_qr($id)
    {
        $user = User::find($id);
        $qrcode = QrCode::size(400)->generate($user->id);
        return view('qrcode', compact('qrcode'));
    }
}
