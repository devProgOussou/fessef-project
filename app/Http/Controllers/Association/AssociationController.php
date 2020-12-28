<?php

namespace App\Http\Controllers\Association;

use App\Http\Controllers\Controller;
use App\Models\Association;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Inertia\Response;

class AssociationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $association = Association::where('user_id', $id)->get();
        $user = User::where('id', $id)->get();
        return Inertia::render('Association/Edit', [
            'association' => $association,
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
//        dd($request->all());

            Association::where('user_id', $id)->update([
                'NomAssociation' => $request->input('NomAssociation'),
                'adresse' => $request->input('adresse'),
                'telephone' => $request->input('telephone'),
                'lien' => $request->input('lien'),
                'domaineActivites' => $request->input('domaineActivites'),
                'description' => $request->input('description'),
                'dateDeCreation' => $request->input('dateDeCreation')
            ]);

            return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function editAvatar($id)
    {
        $user = User::where('id', $id)->get();
        $association = Association::where('user_id', $id)->get();
        return Inertia::render('Association/EditAvatar', [
            'user' => $user,
            'association' => $association
        ]);
    }

    public function updateAvatar(Request $request, $id)
    {
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            User::where('id', $id)->update([
                'avatar' => $filename,
            ]);
            $file->move('uploads/avatar/', $filename);
            return back();
        }
        else {
            return back();
        }
    }
}
