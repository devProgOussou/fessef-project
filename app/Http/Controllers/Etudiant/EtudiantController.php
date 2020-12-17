<?php

namespace App\Http\Controllers\Etudiant;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use App\Models\UploadingFile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class EtudiantController extends Controller
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
        $etudiant = Etudiant::where('user_id', Auth::user()->id)->get();
        $user = User::where('id', Auth::user()->id)->get();
        return Inertia::render('Etudiant/File/UploadFile', [
            'etudiant' => $etudiant,
            'user' => $user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cv' => 'required|mimes:docx,pdf|max:2048',
            'lm' => 'required|mimes:docx,pdf|max:2048',
        ]);

        $userExist = UploadingFile::where('user_id', Auth::user()->id)->first();
        // dd($userExist);
        if ($userExist === null) {
            if ($request->hasFile('cv')) {
                $fileCV = $request->file('cv');
                $extension = $fileCV->getClientOriginalExtension();
                $filenameCV = time() . '.' . $extension;
                $fileCV->move('uploads/files/CV', $filenameCV);
            } else {
                return back();
            }

            if ($request->hasFile('lm')) {
                $fileLM = $request->file('lm');
                $extension = $fileLM->getClientOriginalExtension();
                $filenameLM = time() . '.' . $extension;
                $fileLM->move('uploads/files/LM', $filenameLM);
            } else {
                return back();
            }
            UploadingFile::create([
                'CV' => $filenameCV,
                'LM' => $filenameLM,
                'user_id' => Auth::user()->id,
            ]);
            return back();

        }
        else {
            // return redirect()->route('update.file');
            return \Redirect::route('update.file', Auth::user()->id);
        }
    }

    public function editFile($id)
    {
        $etudiant = Etudiant::where('id', $id)->get();
        $userID = Etudiant::where('id', $id)->first();
        $user = User::where('id', $userID->user_id)->get();
        return Inertia::render('Etudiant/File/EditFile',[
            'etudiant' => $etudiant,
            'user' => $user,
        ]);
    }

    public function updateFile($id)
    {
        return "HELLO";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
        $etudiant = Etudiant::where('user_id', $id)->get();
        $user = User::where('id', $id)->get();
        return Inertia::render('Etudiant/Edit', [
            'etudiant' => $etudiant,
            'user' => $user,
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
//        dd($request->all());
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/avatar/', $filename);

            Etudiant::where('user_id', $id)->update([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'telephone' => $request->telephone,
                'adresse' => $request->adresse,
                'competences' => $request->competences,
                'description' => $request->description,
            ]);

            User::where('id', $id)->update([
                'name' => $request->prenom,
                'avatar' => $filename,
//                'email' => $request->email,
                //                'password' => Hash::make($request->password)
            ]);
            return back();
        } else {
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function editAvatar($id)
    {
        $user = User::where('id', $id)->get();
        $etudiant = Etudiant::where('user_id', $id)->get();
        return Inertia::render('Etudiant/EditAvatar', [
            'user' => $user,
            'etudiant' => $etudiant,
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
        } else {
            return back();
        }
    }
}
