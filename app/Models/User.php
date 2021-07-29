<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'picture',
        'password',
        'prenom' ,
        'date_nais' ,
        'genre',
        'telephone' ,
        'matricule',
        'password',
        'group_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getPictureAttribute($value){
        if($value){
            return asset('users/images/'.$value);
        }else{
            return asset('users/images/no-image.png');
        }
    }

    public function get_user($id)
    {
        $users = DB::table('users')
        ->select('*')
        ->where('id', $id)
        ->get();
        return $users;
    }


 public function add_user($data = array())
    {

 $test = (bool) DB::table('users')-> insert($data);
         if ($test) return DB::getPdo()->lastInsertId();
            else return false;
    }



    public function add_inscription($data = array())
    {
        return (bool) DB::table('inscription')->insert($data);;
    }


    public function update_data($data = array())
    {
        $current_user  = User::where('id','=', session('LoggedUser'))->first();
        $current_id = $current_user->id;
        return DB::table('users')->where('id' , $current_id) ->update($data);

    }



}
