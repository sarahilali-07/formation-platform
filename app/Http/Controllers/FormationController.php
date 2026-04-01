<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    public function index()
    {
        $formations = Formation::all();
        return view('formations.index', compact('formations'));
    }

    public function create()
    {
        return view('formations.create');
    }


     public function store(Request $request)
    {
        $request->validate([
            'titre_fr' => 'required|min:3',
            'titre_ar' => 'required|min:3',
            'description_fr' => 'required',
            'description_ar' => 'required',
        ]);

        Formation::create([
            'titre_fr' => $request->titre_fr,
            'titre_ar' => $request->titre_ar,
            'description_fr' => $request->description_fr,
            'description_ar' => $request->description_ar,
        ]);

        return redirect()->route('formations.index');
    }


    public function edit($id)
    {
        $formation = Formation::findOrFail($id);
        return view('formations.edit', compact('formation'));
    }

    

     public function update(Request $request, $id)
    {
        $request->validate([
            'titre_fr' => 'required|min:3',
            'titre_ar' => 'required|min:3',
            'description_fr' => 'required',
            'description_ar' => 'required',
        ]);

        $formation = Formation::findOrFail($id);

        $formation->update([
            'titre_fr' => $request->titre_fr,
            'titre_ar' => $request->titre_ar,
            'description_fr' => $request->description_fr,
            'description_ar' => $request->description_ar,
        ]);

        return redirect()->route('formations.index');
    }

    public function destroy($id)
    {
        Formation::destroy($id);
        return redirect()->route('formations.index');
    }
}