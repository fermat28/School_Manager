<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class Quizz extends Controller
{
    //
    public function getWelcome() {
        $currentUser = User::where('id','=', session('LoggedUser'))->first();
        $photo = $currentUser->photo;
       // $photo_path = str_replace('\\', '/', storage_path("app\public\storage{$photo}")) ;
        $nom = $currentUser->nom;
        $prenom = $currentUser->prenom;
        return view('teachDasboard');
    }

}
