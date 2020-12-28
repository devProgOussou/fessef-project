<?php

namespace App\Http\Controllers;

use App\Models\Interesse;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Xamxam;
use App\Models\Annonce;
use App\Models\Message;
use App\Models\Etudiant;
use App\Models\Feusseul;
use App\Models\Entreprise;
use App\Models\Association;
use Illuminate\Http\Request;
use App\Models\UploadingFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return RedirectResponse|Response
     */
    public function index()
    {
        if(Auth::user()->isCompany == 1 && Auth::user()->isActive == 1)
        {
            $entreprise = Entreprise::where('user_id', Auth::user()->id)->get();
            $xamxams = Xamxam::paginate(5)->where('user_id', Auth::user()->id);
            $annonces = Annonce::with('interesses')->paginate(5)->where('user_id', Auth::user()->id)->sortByDesc('created_at');
            $messages = Message::where('user_id', Auth::user()->id)->get();
            $user = User::where('id', Auth::user()->id)->get();

            return Inertia::render('Entreprise/Dashboard', [
                'xamxams' => $xamxams,
                'annonces' => $annonces,
                'messages' => $messages,
                'entreprise' => $entreprise,
                'user' => $user
            ]);
        }
        elseif(Auth::user()->isAssociation == 1 && Auth::user()->isActive == 1)
        {
            $association = Association::where('user_id', Auth::user()->id)->get();
            $user = User::where('id', Auth::user()->id)->get();
            $xamxams = Xamxam::paginate(5)->where('user_id', Auth::user()->id);
            $annonces = Annonce::with('user')->with('interesses')->paginate(15)->where('user_id', Auth::user()->id)->sortByDesc('created_at');
            $interesses = Interesse::paginate(15)->where('post_id', Auth::user()->id);
            $annonceAll = Annonce::with('user')->where('user_id','!=', Auth::user()->id)->get();
            $messages = Message::where('user_id', Auth::user()->id)->get();

            return Inertia::render('Association/Dashboard', [
                'xamxams' => $xamxams,
                'annonceAll' => $annonceAll,
                'annonces' => $annonces,
                'messages' => $messages,
                'association' => $association,
                'user' => $user,
                'interesses' => $interesses
            ]);
        }
        elseif(Auth::user()->isEtudiant == 1 && Auth::user()->isActive == 1)
        {
            $files = UploadingFile::where('user_id', Auth::user()->id)->get();
            $etudiant = Etudiant::where('user_id', Auth::user()->id)->get();
            $user = User::where('id', Auth::user()->id)->get();
            $feusseuls = Feusseul::where('user_id', Auth::user()->id)->get();

            $annonces = Annonce::paginate(3)->sortByDesc('created_at');
            return Inertia::render('Etudiant/Dashboard', [
                'etudiant' => $etudiant,
                'user' => $user,
                'files' => $files,
                'feusseuls' => $feusseuls,
                'annonces' => $annonces,
            ]);
        }
        elseif(Auth::user()->isState == 1)
        {
            return Inertia::render('State/Dashboard');
        }
        elseif(Auth::user()->isAdmin == 1)
        {
            $associations = User::with('association')->get();
            $entreprises = User::with('entreprise')->get();
            $etudiants = User::with('etudiant')->get();
            return Inertia::render('Admin/Dashboard',[
                'associations' => $associations,
                'entreprises' => $entreprises,
                'etudiants' => $etudiants
            ]);
        }
        else
        {
            return back();
        }
    }
}
