<?php

namespace App\Http\Controllers;

use App\Fichier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FichierController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function form()
    {
        return view("file_form");
    }

    public function getFile(Request $request)
    {
        $test=$request->validate([
            'title' => 'required:max:255',
            'description' => 'required',
            //'fichier' => 'image|required'
        ]);

        if($test){
            //var_dump('eeee');
        }else{
            var_dump("non oki");die;
        }

        //get file with ext
        $fileNameWithExt=$request->file('fichier')->getClientOriginalName();
        //echo $fileNameWithExt;die;
        //get file's  ext
       // $fileExt=$request->file('fichier')->getClientOriginalExtension();
        //echo "############";
        $fileExt= $request->file('fichier')->extension();
        /*echo "############";
        echo $fileExt;die;*/
        //get just file mane
        $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
        $fileNameToStore=$fileName."_".time()."_.".$fileExt;
       // echo $fileNameToStore;die;
        $path=$request->file("fichier")->storeAs('public/images',$fileNameToStore);
        // reate File
        $file=New Fichier();
        $file->name=$fileNameToStore;
        $file->title=$request->input('title');
        $file->description=$request->input('description');
        //$file->user_id=Auth::id();
        $file->user_id="1";
        $file->save();
        echo 'enregistrement okay';

    }

    public function getFilePerUser()
    {
        $fichiers= Fichier::all();
        return response()->json($fichiers);
    }

    public function deleteFile(Request $request)
    {
        $fichier=Fichier::find($request->id);
        $fichier->delete();
    }
}
