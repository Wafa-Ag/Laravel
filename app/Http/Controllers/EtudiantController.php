<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Ville;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
               

        $etudiants = Etudiant::all(); // Récupère tous les étudiants

        return view('etudiants.index', ['etudiants' => $etudiants]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = Ville::all(); // Récupère tous les villes
        return view('etudiants.create',[
            "villes" => $villes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $etudiant = new Etudiant;

        $etudiant->nom_etudiant = $request->input('nom_etudiant');
        $etudiant->adress = $request->input('adress');
        $etudiant->phone = $request->input('phone');
        $etudiant->email = $request->input('email');
        $etudiant->date_de_naissance = $request->input('date_de_naissance');
        $etudiant->ville_id = $request->input('ville_id');

        $etudiant->save();

        return redirect()->route('etudiants.index')->with('success', 'Étudiant ajouté avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {
        return view('etudiants.show',[
            'etudiant' => $etudiant,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant)
    {
        $villes = Ville::all();
        return view('etudiants.edit',[
            'etudiant' => $etudiant,
            'villes' => $villes
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $etudiantModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudiant $etudiant)
    {
       // $etudiant = new Etudiant;

        $etudiant->nom_etudiant = $request->input('nom_etudiant');
        $etudiant->adress = $request->input('adress');
        $etudiant->phone = $request->input('phone');
        $etudiant->email = $request->input('email');
        $etudiant->date_de_naissance = $request->input('date_de_naissance');
        $etudiant->ville_id = $request->input('ville');

        $etudiant->update();

        return redirect()->route('etudiants.index')->with('success', 'Étudiant ajouté avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiantModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        return redirect(route('etudiants.index'))->withSuccess('Donnée saisit'); 
    }
}
