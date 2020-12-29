<?php

namespace App\Http\Controllers\Etudiant;

use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use App\Models\Interesse;
use App\Models\UploadingFile;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class EtudiantController extends Controller
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
     * @return \Inertia\Response
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
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
//        $request->validate([
//            'cv' => 'required|mimes:docx,pdf|max:2048',
//            'lm' => 'required|mimes:docx,pdf|max:2048',
//        ]);
//
//        $userExist = UploadingFile::where('user_id', Auth::user()->id)->first();
//        // dd($userExist);
//        if ($userExist === null) {
//            if ($request->hasFile('cv')) {
//                $fileCV = $request->file('cv');
//                $extension = $fileCV->getClientOriginalExtension();
//                $filenameCV = time() . '.' . $extension;
//                $fileCV->move('uploads/files/CV', $filenameCV);
//            } else {
//                return back();
//            }
//
//            if ($request->hasFile('lm')) {
//                $fileLM = $request->file('lm');
//                $extension = $fileLM->getClientOriginalExtension();
//                $filenameLM = time() . '.' . $extension;
//                $fileLM->move('uploads/files/LM', $filenameLM);
//            } else {
//                return back();
//            }
//            UploadingFile::create([
//                'CV' => $filenameCV,
//                'LM' => $filenameLM,
//                'user_id' => Auth::user()->id,
//            ]);
//            return back();
//
//        } else {
//            // return redirect()->route('update.file');
//            return \Redirect::route('update.file', Auth::user()->id);
//        }
    }

    public function editFile($id)
    {
        $etudiant = Etudiant::where('user_id', $id)->get();
        $userID = Etudiant::where('user_id', $id)->first();
        // dd($userID);
        $user = User::where('id', $userID->user_id)->get();

        return Inertia::render('Etudiant/File/EditFile', [
            'etudiant' => $etudiant,
            'user' => $user,
        ]);
    }

    public function updateFile(Request $request, $id)
    {
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
        UploadingFile::where('id', $id)->update([
            'CV' => $filenameCV,
            'LM' => $filenameLM,
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
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
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'CV' => 'required|mimes:docx,pdf|max:2048',
            'LM' => 'required|mimes:docx,pdf|max:2048',
        ]);

        $interesses = Interesse::where('user_id', Auth::user()->id)->first();


            $fileCV = $request->file('CV');
            $extension = $fileCV->getClientOriginalExtension();
            $filenameCV = time() . '.' . $extension;
            $fileCV->move('uploads/files/CV', $filenameCV);

            $fileLM = $request->file('LM');
            $extension = $fileLM->getClientOriginalExtension();
            $filenameLM = time() . '.' . $extension;
            $fileLM->move('uploads/files/LM', $filenameLM);

        Etudiant::where('user_id', $id)->update([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'telephone' => $request->input('telephone'),
            'adresse' => $request->input('adresse'),
            'dateDeNaissance' => $request->input('dateDeNaissance'),
            'genre' => $request->input('genre'),
            'competences' => $request->input('competences'),
            'description' => $request->input('description'),
            'CV' => $filenameCV,
            'LM' => $filenameLM,
        ]);

        $prenom = $request->input('prenom');
        $nom = $request->input('nom');
        $nomComplet = $prenom.' '.$nom;
        if ($interesses != null) {
            Interesse::where('user_id', Auth::user()->id)->update([
                'user_name' => $nomComplet,
                'CV' => $filenameCV,
                'LM' => $filenameLM
            ]);
        }

        User::where('id', $id)->update([
            'name' => $nomComplet,
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
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
            $interesses = Interesse::where('user_id', Auth::user()->id)->first();
            if ($interesses !== null) {
            Interesse::where('user_id', Auth::user()->id)->update([
                'avatar' => $filename
            ]);
        }
            $file->move('uploads/avatar/', $filename);
            return back();
        } else {
            return back();
        }
    }

    public function searchProfile(Request $request)
    {

        $searchingProfile = User::with('etudiant')->where("name", "like", "%$request->search%")->where('isEtudiant', 1)->get();
        $queryCount = User::with('etudiant')->where("name", "like", "%$request->search%")->where('isEtudiant', 1)->count();

        return Inertia::render('Etudiant/QueryFind', [
            'searchingProfile' => $searchingProfile,
            'queryCount' => $queryCount
        ]);
    }
}
