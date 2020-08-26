<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tache;
use Illuminate\Support\Facades\Auth;
class TacheController extends Controller
{


	public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

    	$user = Auth()->user();

    	$taches = Tache::OrderBy('created_at', 'DESC')
    					->where('user_id', $user->id)->get();

    	return view('taches.home', compact('taches'));
    }

    public function getTache()
    {
    	return view('taches.create');
    }

    public function postTache(Request $request)
    {
    	$this->validate($request, [
            'tache' => 'required|min:2',
            'description' => 'required|min:2',
        ]);

        $tache = new Tache();

        $tache->user_id = auth()->user()->id;
        $tache->nom = $request->tache;
        $tache->description = $request->description;

        $tache->save();

    	return redirect()->route('tache.index')->with('success', 'La tâche à bien été ajouté.');
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



    public function destroy(Request $request, $id)
	{
		$tache = Tache::find($id);
		$tache->delete();
		return back()->with('danger', "La tâche à bien été supprimé.");
	}
}
