<?php

namespace App\Http\Controllers\Annonce;

use App\Http\Controllers\Controller;
use App\Models\Annonce;
use App\Models\Etudiant;
use App\Models\Interesse;
use App\Models\UploadingFile;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

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
        $annonces = Annonce::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
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
        if (Auth::user()->isEtudiant == 1) {
            $nbreDeVus = Annonce::where('id', $id)->first();
            $value = $nbreDeVus->nbreDeVus;
            $nbreDeVus->nbreDeVus = $value + 1;
            $nbreDeVus->save();

            $annonce = Annonce::where('id', $id)->get();

            return Inertia::render('Annonces/ShowAnnonce', [
                'annonce' => $annonce,
            ]);
        } elseif (Auth::user()->isCompany == 1) {
            return redirect()->route('home');
        } elseif (Auth::user()->isAssociation == 1) {
            return redirect()->route('Annonce.all');
        }
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
        $annonces = Annonce::with('user')->orderBy('created_at', 'desc')->get();
        return Inertia::render('Annonces/ShowAll', [
            'annonces' => $annonces,
        ]);
    }

    public function interesses(Request $request, $id)
    {
        $user = Interesse::where('user_id', Auth::user()->id)->where('annonce_id', $id)->first();
        $userID = Auth::user()->id;
        $etudiantID = Etudiant::where('user_id', $userID)->first();
        $etudiantInfo = Etudiant::find($etudiantID->user_id);

        if ($user === null && Auth::user()->isEtudiant === 1) {
            Interesse::create([
                'annonce_id' => $request->input('annonce_id'),
                'post_id' => $request->input('post_id'),
                'annonce_image' => $request->input('annonce_image'),
                'annonce_titre' => $request->input('annonce_titre'),
                'user_id' => Auth::user()->id,
                'user_name' => Auth::user()->name,
                'user_email' => Auth::user()->email,
                'avatar' => Auth::user()->avatar,
            ]);
            if ($etudiantID->CV === null) {
                Interesse::where('user_id', Auth::user()->id)->update([
                    'CV' => $etudiantID->CV,
                    'LM' => $etudiantID->LM,
                ]);
            }

            $annonce = Annonce::find($id);
            $value = $annonce->interet;
            $annonce->interet = $value + 1;
            $annonce->save();
            return redirect()->route('annonce.interesse.redirect');
        } else {
            return redirect()->route('Annonce.all');
        }

    }

    public function displayAnnonce($id)
    {
        $annonce = Annonce::where('id', $id)->get();
        $userInteresse = Interesse::where('annonce_id', $id)->get();
        $nbreInteresses = Interesse::where('annonce_id', $id)->count();

        return Inertia::render('Annonces/Interet', [
            'annonce' => $annonce,
            'userInteresse' => $userInteresse,
            'nbreInteresses' => $nbreInteresses,
        ]);
    }

    public function Profile($id)
    {
        $user = Etudiant::with('user')->where('user_id', $id)->get();
        $files = UploadingFile::where('user_id', $id)->get();

        return Inertia::render('Annonces/User/Profile', [
            'user' => $user,
            'files' => $files,
        ]);
    }

    public function redirectRouteAnnonce()
    {
        return Inertia::render('Annonce.InteresseRedirect');
    }

    public function searchAnnonce(Request $request)
    {
        // dd($request->search);
        $query = Annonce::with('user')->where("titre", "like", "%$request->search%")->get();
        $queryCount = Annonce::with('user')->where("titre", "like", "%$request->search%")->count();

        dd($query);
    }
}
