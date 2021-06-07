<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classs;
use App\Filiere;

class ClasseController extends Controller
{

    public function affiche(){
        $resultat = array();
        foreach(Classs::all() as $classe){

            $temp = array(
                "id" => $classe->id,
                "code" => $classe->nom,
                "filiere" => $classe->filiere
                
            );

            array_push($resultat, $temp);
        }
        return json_encode($resultat);
    }
	
    public function search(Request $request){
        $resultat = array();
        if($request->ajax()){
            $classes = Classs::all()->where('filiere', '=', $request->input('filiere'));
            foreach($classes as $classe){
                $temp = array(
                    "id" => $classe->id,
                    "code" => $classe->nom,
                    "filiere" => $classe->filiere
                );
                array_push($resultat, $temp);
            }

            return json_encode($resultat);
        }
    }
}
