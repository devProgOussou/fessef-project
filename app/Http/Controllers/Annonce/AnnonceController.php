<?php

namespace App\Http\Controllers\Annonce;

use App\Http\Controllers\Controller;
use App\Models\Annonce;
use App\Models\Interesse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use function PHPUnit\Framework\isEmpty;

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
            'annonces' =>$annonces
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
            'titre' =>$request->input('titre'),
            'description' =>$request->input('description'),
            'contenu' =>$request->input('contenu'),
            'user_id'=>Auth::user()->id,
            'image'=> $filename
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
        $annonce= Annonce::where('id',$id)->get();

        return Inertia::render('Annonces/Show',[
            'annonce'=>$annonce
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
        $annonce= Annonce::where('id',$id)->get();

        return Inertia::render('Annonces/ShowAnnonce',[
            'annonce'=>$annonce
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
        $annonce= Annonce::where('id',$id)->get();

        return Inertia::render('Annonces/Edit',[
            'annonce' => $annonce
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
                'image' => $filename
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
        $annonce= Annonce::find($id);
        $annonce->delete();
        return back();
    }

    public function displayAll()
    {
        $annonces = Annonce::with('user')->get();
        return Inertia::render('Annonces/ShowAll', [
            'annonces' => $annonces
        ]);
    }

    public function interesses(Request $request,$id)
    {
//        $nbreDeVus = Annonce::where('id', $id)->first()->only('nbreDeVus');
//        $nbreDeVus = (int)$nbreDeVus;
//        $nbreDeVus += 1;
//        Annonce::where('id', $id)->update([
//            'nbreDeVus' => $nbreDeVus
//        ]);

        $user = Interesse::where('user_id', Auth::user()->id)->get();
        if($user == [])
        {
            Interesse::create([
                'user_id' => Auth::user()->id,
                'annonce_id' => $id
            ]);
        }
        else {
            Interesse::where('user_id', Auth::user()->id)->delete();
            return back();
        }
        return back();
    }
}
