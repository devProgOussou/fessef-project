<?php

namespace App\Http\Controllers\Annonce;

use Inertia\Inertia;
use App\Models\Annonce;
use App\Models\Etudiant;
use App\Models\Interesse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AnnonceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $annonces = Annonce::where('user_id', Auth::user()->id)->get();
        return Inertia::render('Annonces/Index', [
            'annonces' => $annonces,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Annonces/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/', $filename);
        } else {
            return back();
        }
        Annonce::create([
            'titre' => $request->input('titre'),
            'description' => $request->input('description'),
            'contenu' => $request->input('contenu'),
            'user_id' => Auth::user()->id,
            'image' => $filename,
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Inertia\Response
     */
    public function show($id)
    {
        $annonce = Annonce::where('id', $id)->get();

        return Inertia::render('Annonces/Show', [
            'annonce' => $annonce,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Inertia\Response
     */
    public function showAnnonce($id)
    {
        $nbreDeVus = Annonce::where('id', $id)->first();
        $value = $nbreDeVus->nbreDeVus;
        $nbreDeVus->nbreDeVus = $value + 1;
        $nbreDeVus->save();

        $annonce = Annonce::where('id', $id)->get();

        return Inertia::render('Annonces/ShowAnnonce', [
            'annonce' => $annonce,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Inertia\Response
     */
    public function edit($id)
    {
        $annonce = Annonce::where('id', $id)->get();

        return Inertia::render('Annonces/Edit', [
            'annonce' => $annonce,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/', $filename);

            Annonce::where('id', $id)->update([
                'titre' => $request->titre,
                'description' => $request->description,
                'contenu' => $request->contenu,
                'image' => $filename,
            ]);
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $annonce = Annonce::find($id);
        $annonce->delete();
        return back();
    }

    public function displayAll()
    {
        $annonces = Annonce::with('user')->get();
        return Inertia::render('Annonces/ShowAll', [
            'annonces' => $annonces,
        ]);
    }

    public function interesses(Request $request, $id)
    {
        $user = Interesse::where('user_id', Auth::user()->id)->first();

        if ($user == null) {

            Interesse::create([
                'annonce_id' => $request->input('annonce_id'),
                'user_id' => Auth::user()->id,
                'user_email' => Auth::user()->email
            ]);
            return back();

        } else {
            return redirect()->route('Annonce.all');
        }

    }

    public function displayAnnonce($id)
    {
        $annonce = Annonce::where('id', $id)->get();
        $idUser = Interesse::where('annonce_id', $id)->get();
        dd($idUser);
        $user = Etudiant::with('user')->where('user_id', $idUser->user_id)->get();
        $nbreInteresses = Interesse::where('annonce_id', $id)->count();
        dd($idUser);
    }
}
