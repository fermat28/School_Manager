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
   $profInfo = User::where('matricule','=', $request->matricule)->where('type' , '=' , 2)->first();

        if(!$userInfo && !$profInfo){
            return back()->with('fail','Matricule incorrect');
        }elseif(Hash::check($request->password, $userInfo->password)){
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect() -> route('profile');

            }elseif(Hash::check($request->password, $profInfo->password)){
                $request->session()->put('LoggedUser', $profInfo->id);
                return redirect() -> route('get-welcome');

            }else{
                return back()->with('fail','Incorrect password');
            }
        }

}

