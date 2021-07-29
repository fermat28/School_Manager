<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class loginController extends Controller
{
     public function login(){
      return view('login');
}


public function check(Request $request){

    $request->validate([
        'matricule'=>'required',
        'password'=>'required|min:5|max:12'
   ]);

   $userInfo = User::where('matricule','=', $request->matricule)->first();

        if(!$userInfo){
            return back()->with('fail','Matricule incorrect');
        }else{
            //check password
            if(Hash::check($request->password, $userInfo->password)){
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect() -> route('profile');

            }else{
                return back()->with('fail','Incorrect password');
            }
        }

}
}
