<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request as FacadesRequest;

class registerController extends Controller
{
    //verify user
    public function verifyUser(Request $request){
        $verification_code = FacadesRequest::get('code');
        $user = User::where('verification_code', $verification_code)->first();
        if ($user !== null) {
            $user->is_verified = 1;
            $user->save();
            return view('auth.password', compact('user'));
        }
    }

    //password reset
    public function setPassword(Request $request){
        $data = $this->validate($request, [
            'password' => ['required','confirmed','min:6'],
            'password_confirmation' => ['required','min:6']
        ]);
        $id = $request->userid;
        $user = User::findOrFail($id);
        $update = $user->update([
            'password' => Hash::make($data['password'])
        ]);

        if ($update) {
            return redirect()->route('login.index');
        }
    }


}
