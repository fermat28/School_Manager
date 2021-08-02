<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Devoir;
use App\Models\File;
use App\Models\Group;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Quizz extends Controller
{
    //
    public function getWelcome() {
        view('home',[]);
      /*  $currentUser = User::where('id','=', session('LoggedUser'))->first();
        $photo = $currentUser->photo;
       // $photo_path = str_replace('\\', '/', storage_path("app\public\storage{$photo}")) ;
        $nom = $currentUser->nom;
        $prenom = $currentUser->prenom;
        $telephone = $currentUser->telephone;
        $matricule = $currentUser->matricule;
        $devoirs = Devoir::all();
        $files = File::all();
        $dat =  DB::table('groups')->where('id' , $currentUser->group_id)->first();
        $groups = Group::all();
        $groups_files = DB::table('groups')->join('files', 'groups.id', '=', 'files.id_groupe')->get();
        $currentUser = User::where('id','=', session('LoggedUser'))->first();
        $photo = $currentUser->photo;
       // $photo_path = str_replace('\\', '/', storage_path("app\public\storage{$photo}")) ;
        $nom = $currentUser->nom;
        $prenom = $currentUser->prenom;
        return view('teachDasboard' , ['nom'=> $nom , 'prenom'=> $prenom , 'devoirs'=> $devoirs ,'photo'=> $photo ,
        'files'=> $files , 'dat' => $dat ,  'telephone' => $telephone, 'matricule' => $matricule ,'groups' => $groups , 'groups_files' => $groups_files]);
    */

}

}
