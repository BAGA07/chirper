<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EtudiantController extends Controller
{
    //
    public function index() {
        $etudiants = Etudiant::orderBy("nom", "asc")->paginate(5);

        return view("etudiant",compact('etudiants'));
    }
    public function create() {
        $classes = Classe::all();
        return view("etudiantCreate",compact('classes'));
    }

    public function store(Request $request) {
        $etudiant = $request->validate([
            "nom"=>"required",
            "prenom"=>"required",
            "classe_id"=>"required",
        ]);

        Etudiant::create($request->all());

        return back()->with("success", "Etudiant ajouter avec succè !");
    }
}
