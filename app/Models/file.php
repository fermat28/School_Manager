<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class File extends Model
{


    protected $fillable = [
        'name',
        'file_path',
        'id_devoir'

    ];
    use HasFactory;
    protected $primaryKey = 'id';
    protected $foreignKey = "id_devoir";
    public function file()
    {
        return $this->hasOne('App\Models\file');
    }

    /* public function update_file($data = array() , $id)
    {
        $idn = File::find($id);
        $file = DB::table('devoirs')
        ->join('files', 'devoirs.code', '=', 'files.id_devoir')->get();
        return DB::table('files')->where('id' , $idn) ->update($data);

    }

   /* public function update_file($data = array() , $id)
    {
        $current_id = File::find($id);
        //$current = DB::table('files')->join('groups', 'files.id_devoir', '=', 'groups.id_devoir' )->select('name')->distinct()->get();
        // $current_file  = file::where('id_devoir', '=', '')->first()->id;
        // $current_id = $current_file->id;
        return DB::table('files')->where('id' , $current_id) ->update($data);

    }*/

    /*  public function delete_file()
    {
       // $current_file  = File::where('id','=', session('LoggedFile'))->first();
        $file = DB::table('devoirs')
            ->join('files', 'devoirs.code', '=', 'files.id_devoir')->get();
            dd($file);
      //  return DB::table('files')->where('id' , $file) ->delete();

    }*/

    public function delet($id)
    {
        $file = File::find($id);
        $destination = '/storage/' . $file->file_path;;
        if (File::exists($destination)) {
        }
        $file->delete();
        return redirect()->back()->with('status', 'file Deleted Successfully');
    }
}
