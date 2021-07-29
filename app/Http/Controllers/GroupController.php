<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{


    public function loadCreationPage()
    {
    return view('group');
    }


    public function createGroup(Request $req){

          $req->validate([
            'nom'=>'required',
            'participants'=>'required|max:12'
       ]);
        $new = new Group;
        $new->nom = $req->nom;
        $new-> Description = $req->description;
        $new->Participants = $req -> participants;
        $save = $new->save();
        if($save){
            $req->session()->put('actualGroup', $new->id);
            return redirect() -> route('group.members')->with('success','New User has been successfuly added to database');
         }else{
             return back()->with('fail','Something went wrong, try again later');
         }

   }

   public function choiceMembers()
   {
        $data = Group::where('id','=', session('actualGroup'))->first();
        $groupNbreParts = $data->Participants;
        $users = DB::table('users')->select('*')->whereNull('group_id')->get();
       return view('Participants' , ['users' => $users , 'groupNbreParts' => $groupNbreParts]);
              //
   }

    public function registerGroup(Request $req)
    {
        $data = Group::where('id','=', session('actualGroup'))->first();
        $groupId = $data ->id;


        if(!empty($req->input('name')))
        {
             $input = $req->all();
             $tab = $input['name'];

             foreach($tab as  $cle=> $value)
             {
                 $noms = $tab[$cle];
                 DB::table('users')->where('nom' , $noms)->update(['group_id' => $groupId]);
             }

            return redirect() -> route('profile')->with('success','Group successfully created');

        }

        }
    }


