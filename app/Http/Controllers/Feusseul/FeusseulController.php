<?php

namespace App\Http\Controllers\Feusseul;

use App\Models\Annonce;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Etudiant;
use App\Models\Feusseul;
use App\Models\Entreprise;
use App\Models\Association;
use App\Models\Commentaire;
use App\Models\LikeDislike;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class FeusseulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $feusseuls = Feusseul::where('user_id', Auth::user()->id)->get();
        return Inertia::render('Feusseul/Index', [
            'feusseuls' => $feusseuls,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return Inertia::render('Feusseul/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            if ($extension == 'jpg' || $extension == 'png' || $extension == 'jpeg') {
                $file->move('uploads/', $filename);
            } else {
                $file->move('uploads/videos/', $filename);
            }
        } else {
            return back();
        }
        Feusseul::create([
            'titre' => $request->input('titre'),
            'description' => $request->input('description'),
            'contenu' => $request->input('contenu'),
            'extension' => $extension,
            'user_id' => Auth::user()->id,
            'file' => $filename,
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $commentaires = Commentaire::with('user')->orderByDesc('created_at')->where('feusseul_id', $id)->get();
        $userID = Feusseul::where('id', $id)->first();
        $userFeusseul = User::where('id', $userID->user_id)->first();
        $feusseul = Feusseul::with('commentaires')->where('id', $id)->get();
        return Inertia::render('Feusseul/Show', [
            'feusseul' => $feusseul,
            'commentaires' => $commentaires,
            'userFeusseul' => $userFeusseul
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $feusseul = Feusseul::where('id', $id)->get();
        return Inertia::render('Feusseul/Edit', [
            'feusseul' => $feusseul,
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
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            if ($extension == 'jpg' || $extension == 'png' || $extension == 'jpeg') {
                $file->move('uploads/', $filename);
            } else {
                $file->move('uploads/videos/', $filename);
            }
        } else {
            return back();
        }
        Feusseul::where('id', $id)->update([
            'titre' => $request->titre,
            'contenu' => $request->contenu,
            'extension' => $extension,
            'file' => $filename,
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        LikeDislike::where('feusseul_id', $id)->delete();
        Feusseul::find($id)->delete();
        return back();
    }

    public function displayAll()
    {
        $feusseuls = Feusseul::with('user')->orderByDesc("created_at")->get();
        $annonces = Annonce::paginate(3)->sortByDesc("created_at");
        $etudiant = Etudiant::with('user')->where('user_id', Auth::user()->id)->get();
        $association = Association::with('user')->where('user_id', Auth::user()->id)->get();
        $entreprise = Entreprise::with('user')->where('user_id', Auth::user()->id)->get();
        return Inertia::render('Feusseul/ShowAll', [
            'feusseuls' => $feusseuls,
            'etudiant' => $etudiant,
            'entreprise' => $entreprise,
            'association' => $association,
            'annonces' => $annonces,
            'user' => Auth::user(),
        ]);
    }

    public function like($id)
    {
        $userID = LikeDislike::where('user_id', Auth::user()->id)->where('id', $id)->orderByDesc('created_at')->first();

        if ($userID === null) {
            $feusseul = Feusseul::find($id);
            $value = $feusseul->like;
            $feusseul->like = $value + 1;
            LikeDislike::create([
                'like' => $feusseul->like,
                'user_id' => Auth::user()->id,
                'feusseul_id' => $id,
            ]);
            $feusseul->save();
            return back();

        } elseif (Auth::user()->id != $userID->user_id) {
            $feusseul = Feusseul::find($id);
            $value = $feusseul->like;
            $feusseul->like = $value + 1;
            LikeDislike::create([
                'like' => $feusseul->like,
                'user_id' => Auth::user()->id,
                'feusseul_id' => $id,
            ]);
            $feusseul->save();
            return back();
        } elseif (Auth::user()->id === $userID->user_id) {
            $feusseul = Feusseul::find($id);
            $value = $feusseul->like;
            if ($value != 0) {
                $feusseul->like = $value - 1;
                LikeDislike::where('feusseul_id', $id)->delete();
            } else {
                LikeDislike::where('feusseul_id', $id)->delete();
            }
            $feusseul->save();

            return back();
        }
    }

    public function comments(Request $request)
    {
        Commentaire::create([
            'commentaires' => $request->input('commentaires'),
            'feusseul_id' => $request->input('feusseul_id'),
            'user_id' => Auth::user()->id,
        ]);
        return back();
    }

    public function search(Request $request)
    {
        $query = Feusseul::with('user')->where('titre', 'LIKE', "%$request->search%")->get();
        $countQuery = Feusseul::with('user')->where('titre', 'LIKE', "%$request->search%")->count();
        // dd($countQuery);
        return Inertia::render('Feusseul/QuerySearch',[
            'query' => $query,
            'countQuery' => $countQuery
        ]);

    }
}
