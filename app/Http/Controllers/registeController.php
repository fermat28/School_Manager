<?php

namespace App\Http\Controllers;

use App\Models\Devoir;
use App\Models\Faculte;
use App\Models\File;
use App\Models\Filiere;
use App\Models\Group;
use App\Models\Niveau;
use App\Models\Specialite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class registeController extends Controller
{
    public function showRegistrationForm()
    {
        $ecoles = Faculte::all();
        $filieres = Filiere::all();
        $specialites = Specialite::all();
        $niveaux = Niveau::all();
        return view('register', ['ecoles' => $ecoles, 'filieres' => $filieres, 'specialites' => $specialites, 'niveau' => $niveaux ]);
    }
    public function compte()
    {
        $currentUser = User::where('id','=', session('LoggedUser'))->first();
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
        return view('profile' , ['nom'=> $nom , 'prenom'=> $prenom , 'devoirs'=> $devoirs ,'photo'=> $photo ,
                                'files'=> $files , 'dat' => $dat ,  'telephone' => $telephone, 'matricule' => $matricule ,'groups' => $groups , 'groups_files' => $groups_files]);
    }

    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect() -> route('login');
        }
    }

    function showDashboard(Request $request){

         //Insert data into database
         $user = new User;
         $user->nom = $request->nom;
         $user->prenom = $request->prenom;
         $user->date_nais = $request->date_nais;
         $user->genre = $request->genre;
         $user->telephone = $request->telephone;
         $user->matricule = $request->matricule;
         $user->photo = $request->photo;
         $user->password = Hash::make($request->password);
         $save = $user->save();

         if($save){
            $request->session()->put('LoggedUser', $user->id);
            return redirect() -> route('profile');
         }else{
             return back()->with('fail','Something went wrong, try again later');
         }
    }
}
