<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use App\Models\Type;
use Illuminate\Http\Request;

class ChambreController extends Controller
{
    // Affiche la liste des chambres
    public function index()
    {
        $chambres = Chambre::with('type')->get();
        return view('chambre.index', compact('chambres'));
    }

    // Affiche le formulaire de création
    public function create()
    {
        $types = Type::all();
        return view('chambre.create', compact('types'));
    }

    // Enregistre une nouvelle chambre après validation
    public function store(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required|string|max:200',
            'superficie' => 'required|integer|between:15,60',
            'étage' => 'required|in:RDC,1,2,3',
            'type_id' => 'required|exists:types,id',
            'prix' => 'nullable|numeric',
        ]);

        Chambre::create($validated);
        return redirect()->route('chambres.index')->with('success', 'Chambre ajoutée avec succès');
    }

    // Affiche les détails d’une chambre + ses réservations
    public function show(Chambre $chambre)
    {
        $reservations = $chambre->reservations()->orderBy('date_arrivée')->get();
        return view('chambre.show', compact('chambre', 'reservations'));
    }

    // Affiche le formulaire d'édition
    public function edit(Chambre $chambre)
    {
        $types = Type::all();
        return view('chambre.edit', compact('chambre', 'types'));
    }

    // Met à jour une chambre
    public function update(Request $request, Chambre $chambre)
    {
        $validated = $request->validate([
            'description' => 'required|string|max:200',
            'superficie' => 'required|integer|between:15,60',
            'étage' => 'required|in:RDC,1,2,3',
            'type_id' => 'required|exists:types,id',
            'prix' => 'nullable|numeric',
        ]);

        $chambre->update($validated);
        return redirect()->route('chambres.index')->with('success', 'Chambre mise à jour avec succès');
    }

    // Supprime une chambre
    public function destroy(Chambre $chambre)
    {
        $chambre->delete();
        return redirect()->route('chambres.index')->with('success', 'Chambre supprimée');
    }
}
