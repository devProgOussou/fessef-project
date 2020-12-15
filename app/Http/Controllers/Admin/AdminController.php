<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Association;
use App\Models\Entreprise;
use App\Models\Etudiant;
use App\Models\User;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $associations = Association::with('user')->get();
        $entreprise = Entreprise::with('user')->get();
        $etudiants = Etudiant::with('user')->get();

        return Inertia::render('Admin/Index', [
            'associations' => $associations,
            'entreprise' => $entreprise,
            'etudiants' => $etudiants
        ]);
    }

    public function showAssociation($id)
    {
        $association = Association::with('user')->where('id', $id)->get();
        return Inertia::render('Admin/ShowAssociation', [
            'association' => $association
        ]);
    }

    public function showEntreprise($id)
    {
        $entreprise = Entreprise::with('user')->where('id', $id)->get();
        return Inertia::render('Admin/Entreprise', [
            'entreprise' => $entreprise
        ]);
    }

    public function showEtudiant($id)
    {
        $etudiants = Etudiant::with('user')->where('id', $id)->get();
        return Inertia::render('Admin/Etudiant', [
            'entreprise' => $etudiants
        ]);
    }

    public function displayAllAssociations()
    {
        $associations = User::with('association')->where('isAssociation', true)->get();
        return Inertia::render('Admin/DisplayAssociations', [
            'associations' => $associations
        ]);
    }

    public function displayAllEntreprises()
    {
        $entreprises = User::with('entreprise')->where('isCompany', true)->get();
        return Inertia::render('Admin/displayAllEntreprises', [
            'entreprises' => $entreprises
        ]);
    }

    public function displayAllEtudiant()
    {
        $etudiants = User::with('etudiant')->where('isEtudiant', true)->get();
        return Inertia::render('Admin/displayAllEtudiant', [
            'etudiants' => $etudiants
        ]);
    }

    public function deactivate($id)
    {
        User::find($id)->update([
            'isActive' => false
        ]);
        return back();
    }
}
