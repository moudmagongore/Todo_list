<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tache;
class TacheController extends Controller
{
    public function index()
    {
    	/*$tachesEncoures = Tache::orderBy('created_at', 'DESC')->where('statut', 'nonComplete')->orderBy('id', 'DESC')->get();

    	$tachesCompletes = Tache::where('statut', 'complete')->orderBy('id', 'DESC')->get();*/

    	$taches = Tache::all();

    	return view('taches.index', compact('taches'));
    }

    public function postTache(Request $request)
    {
    	$this->validate($request, [
            'tache' => 'required|min:2',
            'description' => 'required|min:2',
        ]);

        $tache = new Tache();

        $tache->user_id = 15/*auth()->user()->id*/;
        $tache->nom = $request->tache;
        $tache->description = $request->description;

        $tache->save();

    	return back()->with('success', 'La tâche à bien été ajouté.');
    }



    public function update(Request $request, $id)
    {
    	$this->validate($request, [
            'tache' => 'required|min:2',
            'description' => 'required|min:2',
        ]);

    	$taches = Tache::findOrFail($id);

    	$taches->update([
    		'nom' => $request->tache,
    		'description' => $request->description
    	]);

    	return back()->with('success', 'La tâche à bien été modifié.');
    }

    public function complete(Request $request, $id)
    {
    	$tache = Tache::find($id);
    	$tache->statut = 'complete';
    	$tache->save();

    	return back()->with('danger', 'La tâche à bien été terminé.');

    }


    public function terminer(Request $request, $id)
    {
    	$taches = Tache::find($id);

    	if ($taches->statut === 'complete') {
    		return back()->with('danger', 'Desolé la tâche est déjà terminé.');
    	}
    }


    public function destroy(Request $request, $id)
	{
		$tache = Tache::find($id);
		$tache->delete();
		return back()->with('danger', "La tâche à bien été supprimé.");
	}
}
