<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function saveProject(Request $request)
    {
        $test=$request->validate([
            'label' => 'required:max:255',
        ]);
        if($test){
            //echo($request->label);die;
            $projet=new Project();
            $projet->label=$request->label;
            $projet->user_id=1;
            $projet->save();
        }
    }

    public function updatePoject(Request $request)
    {
        $project=Project::find($request->id);
        $project->label=$request->label;
        $project->categorie_client=$request->categorie_client;
        $project->proposition_de_valeur=$request->proposition_de_valeur;
        $project->reseau_de_distribition=$request->reseau_de_distribition;
        $project->relation_client=$request->relation_client;
        $project->Sources_de_revenu=$request->Sources_de_revenu;
        $project->activite_cle=$request->activite_cle;
        $project->partenaire=$request->partenaire;
        $project->liste_de_depense=$request->liste_de_depense;
        //$project->user_id=$request->user_id;
        $project->save();
        return response()->json($project);
    }

    public function deleteProject(Request $request)
    {
        $project=Project::find($request->id);
        $project->delete();
    }

   /* public function getProject($id)
    {
        //echo $id;die;
        $projects=Project::where("user_id",$id)->get();
        //$projects=Project::all();
        return response()->json($projects);
    }*/
    public function getProject1(Request  $request)
    {
        //echo $request->id;die;
        $projects=Project::where("user_id",$request->id)->get();
        return response()->json($projects);
    }
}
