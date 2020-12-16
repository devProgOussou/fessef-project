<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Association;
use App\Models\Entreprise;
use App\Models\Etudiant;
use App\Models\Message;
use App\Models\User;
use App\Models\Xamxam;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

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
            $xamxams = Xamxam::paginate(2)->where('user_id', Auth::user()->id);
            $annonces = Annonce::with('interesses')->paginate(2)->where('user_id', Auth::user()->id);
            $messages = Message::where('user_id', Auth::user()->id)->get();
            $user = User::where('id', Auth::user()->id)->get();
//            dd($user);
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
            $xamxams = Xamxam::paginate(2)->where('user_id', Auth::user()->id);
            $annonces = Annonce::with('interesses')->paginate(2)->where('user_id', Auth::user()->id);
            $messages = Message::where('user_id', Auth::user()->id)->get();
            return Inertia::render('Association/Dashboard', [
                'xamxams' => $xamxams,
                'annonces' => $annonces,
                'messages' => $messages,
                'association' => $association,
                'user' => $user
            ]);
        }
        elseif(Auth::user()->isEtudiant == 1 && Auth::user()->isActive == 1)
        {
            $etudiant = Etudiant::where('user_id', Auth::user()->id)->get();
            $user = User::where('id', Auth::user()->id)->get();
            return Inertia::render('Etudiant/Dashboard', [
                'etudiant' => $etudiant,
                'user' => $user
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
