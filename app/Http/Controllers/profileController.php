<?php

namespace App\Http\Controllers;

use App\Models\Devoir;
use App\Models\file;
use App\Models\File as ModelsFile;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class profileController extends Controller
{
    public function update(Request $request)
    {
        $new = new User();
        $dat = [
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'date_nais' => $request->date_nais,
            'telephone' => $request->telephone,
            'password' => Hash::make($request->password),
            'matricule' => $request->matricule,
        ];
        $data = $new->update_data($dat);
        return redirect()->route('profile');
    }

    public function fileUpload(Request $req)
    {

        $fileModel = new file();
        $fileName = $req->file->getClientOriginalName();
        $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
        $fileModel->name = $req->file->getClientOriginalName();
        $fileModel->file_path = '/storage/' . $filePath;
        $fileModel->id_groupe = User::where('id', '=', session('LoggedUser'))->first()->group_id;
        $save = $fileModel->save();
        //$det = DB::table('devoirs')->join('files' , 'devoirs.id_groupe', '=', 'files.id_groupe')->select('name')->get();
        //  $finame = $det ->lied_file;
        // $update = $det->update(['lied_file' => $finame]);

        if ($save) {
        //    $req->session()->put('LoggedFile', $fileModel->id);
            return redirect()->route('profile')->with('success', 'New file has been successfuly added to database');
        } else {
            return back()->with('fail', 'Something went wrong, try again later');
        }
    }



 /*   public function modify(Request $request , $id)
    {
        $to = new file();
        $fileName = $request->file->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
        $data = [
            'name' => $request->file->getClientOriginalName(),
            'file_path' => $request->file_path = '/storage/' . $filePath,
        ];
        $to->update_file($data , $id);
        return redirect()->route('profile');
    }*/

    public function modify( Request $request , $id)
{
    $file = file::find($id);
    $fileName = $request->file->getClientOriginalName();
    $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
    $data = [
        'name' => $request->file->getClientOriginalName(),
        'file_path' => $request-> file_path = $filePath,
    ];
    //$data = $file -> update($data);
    file::whereId($id)-> update($data);
    return redirect()->route('profile');
}

/*public function delete($id)
{
            $to = file::find($id);
            $data = $to -> delete_file();
            return redirect()->route('profile');

}*/
 /*   public function delete(file $file)
    {
    /*  if(File::exists($destination))
    {
        File::delete($destination);
    }
        $file->delete();
        return redirect()->back()->with('status', 'file Deleted Successfully');
    }*/
    public function delete($id)
	{
		$file = file::find($id);
		$file->delete();
		return redirect()->back()->with('status', 'file Deleted Successfully');
	}

    public function download($id)
    {
        $current_file = file::find($id);
         return response()->download( str_replace('\\', '/', storage_path("app\public{$current_file->file_path}")));
    }

    public function note(Request $request , $id){

        $date = [
            'note' => $request->note
        ];
        Group::whereId($id)->update($date);
        return redirect()->back()->with('status', 'note updated Successfully');


    }

    public function uploadimage(Request $request)
    {
        $currentUser = User::where('id','=', session('LoggedUser'))->first();
        $current_id = $currentUser->id;
        $filename = $request->image->getClientOriginalName();
        $request->image->storeAs('images',$filename,'public');
        $photo = $request->file('image')->storeAs(str_replace('\\', '/', 'public\assets\img\profile'),$filename);
        DB::table('users')->where('id' , $current_id)->update(['photo' => $photo]);

        return redirect()->back();
    }
}
