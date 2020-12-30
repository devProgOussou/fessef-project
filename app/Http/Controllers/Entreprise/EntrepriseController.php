<?php

namespace App\Http\Controllers\Entreprise;

use App\Http\Controllers\Controller;
use App\Models\Association;
use App\Models\Entreprise;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Inertia\Inertia;

class EntrepriseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Inertia\Response
     */
    public function edit($id)
    {
        $entreprise = Entreprise::where('user_id', $id)->get();
        $user = User::where('id', $id)->get();
        return Inertia::render('Entreprise/Edit', [
            'entreprise' => $entreprise,
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/avatar/', $filename);

            Entreprise::where('user_id', $id)->update([
                'NomEntreprise' => $request->input('NomEntreprise'),
                'adresse' => $request->input('adresse'),
                'telephone' => $request->input('telephone'),
                'lien' => $request->input('lien'),
                'domaineActivites' => $request->input('domaineActivites'),
                'description' => $request->input('description')
            ]);

            User::where('id', $id)->update([
                'name' => $request->input('NomEntreprise'),
                'avatar' => $filename
            ]);
            return back();
        }
        else {
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Inertia\Response
     */
    public function editAvatar($id)
    {
        $user = User::where('id', $id)->get();
        $entreprise = Entreprise::where('user_id', $id)->get();
        return Inertia::render('Entreprise/EditAvatar', [
            'user' => $user,
            'entreprise' => $entreprise
        ]);
    }

    public function updateAvatar(Request $request, $id)
    {
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/avatar/', $filename);

            User::where('id', $id)->update([
                'avatar' => $filename,
            ]);
            return back();
        }
        else {
            return back();
        }
    }

    public function profil($id)
    {
        $entreprise = Entreprise::where('user_id', $id)->get();
        $user = User::where('id', $id)->get();
        return Inertia::render('Entreprise/Profil', [
            'entreprise' => $entreprise,
            'user' => $user
        ]);
    }
}
