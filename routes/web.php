<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Xamxam\XamxamController;
use App\Http\Controllers\Annonce\AnnonceController;
use App\Http\Controllers\Message\MessageController;
use App\Http\Controllers\Etudiant\EtudiantController;
use App\Http\Controllers\Feusseul\FeusseulController;
use App\Http\Controllers\Entreprise\EntrepriseController;
use App\Http\Controllers\Association\AssociationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/registerstudent', [RegisterController::class, 'registerStudent'])->name('registerStudent');
Route::get('/registercompany', [RegisterController::class, 'registerCompany'])->name('registerCompany');
Route::get('/registerassociation', [RegisterController::class, 'registerAssociation'])->name('registerAssociation');
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

//ROUTES FOR XAM XAM CRUD
Route::get('/xamxam', [XamxamController::class, 'index'])->middleware('auth')->name('xamxam.index');
Route::get('/xamxam/show/{id}', [XamxamController::class, 'show'])->middleware('auth')->name('xamxam.show');
Route::get('/xamxam/create', [XamxamController::class, 'create'])->middleware('auth')->name('xamxam.create');
Route::post('/xamxam', [XamxamController::class, 'store'])->middleware('auth')->name("xamxa.store");
Route::get('/xamxam/edit/{id}', [XamxamController::class, 'edit'])->middleware('auth')->name('xamxam.edit');
Route::post('/xamxam/update/{id}', [XamxamController::class, 'update'])->middleware('auth')->name('xamxam.update');
Route::get('/xamxam/destroy/{id}', [XamxamController::class, 'destroy'])->middleware('auth')->name('xamxam.destroy');


//ROUTE FOR ASSOCATION PROFILE
Route::get('/association/edit/{id}', [AssociationController::class, 'edit'])->middleware('auth')->name('association.edit');
Route::get('/association/update/{id}', [AssociationController::class, 'update'])->middleware('auth')->name('association.update');
Route::post('/association/update/{id}', [AssociationController::class, 'update'])->middleware('auth')->name('association.updated');
Route::get('/Association/editAvatar/{id}', [AssociationController::class, 'editAvatar'])->middleware('auth')->name('association.editAvatar');
Route::post('/Association/UpdateAvatar/{id}', [AssociationController::class, 'updateAvatar'])->middleware('auth')->name('association.updateAvatar');



//ROUTE FOR ENTREPRISE
Route::get('/Entreprise/editAvatar/{id}',[EntrepriseController::class, 'editAvatar'])->middleware('auth')->name('Entreprise.EditAvatar');
Route::post('/Entreprise/updateAvatar/{id}', [EntrepriseController::class, 'updateAvatar'])->middleware('auth')->name('Entreprise.updateAvatar');
Route::get('/entreprise/edit/{id}', [EntrepriseController::class, 'edit'])->middleware('auth')->name('Entreprise.edit');
Route::post('/entreprise/update/{id}', [EntrepriseController::class, 'update'])->middleware('auth')->name('Entreprise.update');
// pour profil entreprise et detail annonce
Route::get('/entreprise/profil/{id}', [EntrepriseController::class, 'profil'])->middleware('auth')->name('Entreprise.Profil');
Route::get('/entreprise/showannonce/{id}', [EntrepriseController::class, 'show'])->middleware('auth')->name('Entreprise.annonce.show');


//ROUTE FOR ALL USERS
//ROUTE FOR XAMXAM
Route::get('/xamxams', [XamxamController::class, 'xamxamAll'])->middleware('auth')->name('xamxam.All');

//ROUTE FOR CREATING ANNONCES
Route::get('/Annonce', [AnnonceController::class, 'index'])->middleware('auth')->name('Annonce.user');
Route::get('/Annonces', [AnnonceController::class, 'displayAll'])->middleware('auth')->name('Annonce.all');
Route::get('/Annonce/Create', [AnnonceController::class, 'create'])->middleware('auth')->name('Annonce.create');
Route::post('/Annonce/Store', [AnnonceController::class, 'store'])->middleware('auth')->name('Annonce.store');
Route::get('/Annonce/Edit/{id}', [AnnonceController::class, 'edit'])->middleware('auth')->name('Annonce.edit');
Route::post('/Annonce/Update/{id}', [AnnonceController::class, 'update'])->middleware('auth')->name('Annonce.update');
Route::get('/Annonces/Show/{id}', [AnnonceController::class, 'show'])->middleware('auth')->name('annonce.show');
Route::get('/Annonce/Delete/{id}', [AnnonceController::class, 'destroy'])->middleware('auth')->name('Annonce.destroy');
Route::delete('/Annonce/Delete/{id}', [AnnonceController::class, 'destroy'])->middleware('auth')->name('Annonce.destroy');
Route::get('/Annonce/{id}', [AnnonceController::class, 'showAnnonce'])->middleware('auth')->name('Annonce.showAnnonce');
Route::post('/Annonce/interesse/{id}', [AnnonceController::class, 'interesses'])->middleware('auth')->name('Annonce.interesse');
Route::get('/Annonce/user/show/{id}', [AnnonceController::class, 'displayAnnonce'])->middleware('auth')->name('Annonce.displayAnnonce');
Route::post('/AnnonceSearch', [AnnonceController::class, 'searchAnnonce'])->middleware('auth')->name('Entreprise.searchAnnonce');
Route::get('/AnnonceSearch', [AnnonceController::class, 'searchAnnonce'])->middleware('auth')->name('Entreprise.find');
Route::get('/interesseRedirect', [AnnonceController::class, 'redirectRouteAnnonce'])->middleware('auth')->name('annonce.interesse.redirect');

//ROUTE FOR ETUDIANT PROFILE
Route::get('/etudiant/edit/{id}', [EtudiantController::class, 'edit'])->middleware('auth')->name('etudiant.edit');
Route::get('/etudiant/update/{id}', [EtudiantController::class, 'update'])->middleware('auth')->name('etudiant.update');
Route::post('/etudiant/update/{id}', [EtudiantController::class, 'update'])->middleware('auth')->name('etudiant.updated');
Route::get('/Etudiant/editAvatar/{id}', [EtudiantController::class, 'editAvatar'])->middleware('auth')->name('Etudiant.editAvatar');
Route::post('/Etudiant/UpdateAvatar/{id}', [EtudiantController::class, 'updateAvatar'])->middleware('auth')->name('Etudiant.updateAvatar');
Route::post('/searchProfile', [EtudiantController::class, 'searchProfile'])->middleware('auth')->name('Manage.searchProfil');
Route::get('/searchProfile', [EtudiantController::class, 'searchProfile'])->middleware('auth')->name('Manage.findProfil');

//Route::get('/Etudiant/edit/{id}', [EtudiantController::class, 'edit'])->middleware('auth')->name('Etudiant.edit');
//Route::post('/Etudiant/update/{id}', [EtudiantController::class, 'update'])->middleware('auth')->name('Etudiant.update');

//ROUTE FRO FEUSSEUL
Route::get('/Feusseul', [FeusseulController::class, 'index'])->middleware('auth')->name('Feusseul.index');
Route::get('/Feusseul/create', [FeusseulController::class, 'create'])->middleware('auth')->name('Feusseul.create');
Route::post('/Feusseul/Store', [FeusseulController::class, 'store'])->middleware('auth')->name('Feusseul.store');
Route::get('/Feusseul/Show/{id}', [FeusseulController::class, 'show'])->middleware('auth')->name('Feusseul.show');
Route::get('/Feusseul/Edit/{id}', [FeusseulController::class, 'edit'])->middleware('auth')->name('Feusseul.edit');
Route::get('/Feusseuls', [FeusseulController::class, 'displayAll'])->middleware('auth')->name('Feusseul.displayAll');
Route::post('/Feusseul/Update/{id}', [FeusseulController::class, 'update'])->middleware('auth')->name('Feusseul.update');
Route::get('/Feusseul/Delete/{id}', [FeusseulController::class, 'destroy'])->middleware('auth')->name('Feusseul.delete');
Route::post('/Feusseul/Delete/{id}', [FeusseulController::class, 'destroy'])->middleware('auth')->name('Feusseul.deleted');
Route::post('/Feusseul/Search', [FeusseulController::class, 'search'])->middleware('auth')->name('feusseul.search');
Route::get('/Feusseul/Search', [FeusseulController::class, 'search'])->middleware('auth')->name('feusseul.find');



//ROUTE FOR FEUSSEUL LIKE/DISLIKE/COMMENTS
Route::get('/Feusseul/like/{id}', [FeusseulController::class, 'like'])->middleware('auth')->name('Feusseul.like');
Route::post('/Feusseul/like/{id}', [FeusseulController::class, 'like'])->middleware('auth')->name('Feusseul.liked');
Route::get('/Feusseul/comments', [FeusseulController::class, 'comments'])->middleware('auth')->name('Feusseul.comments');
Route::post('/Feusseul/comments', [FeusseulController::class, 'comments'])->middleware('auth')->name('Feusseul.comments');


Route::get('/User/Profile/{id}', [AnnonceController::class, 'Profile'])->middleware('auth')->name('User.Profile');
Route::get('/uploadingFile', [EtudiantController::class, 'create'])->middleware('auth')->name('Etudiant.createFile');
Route::post('/uploadingFile', [EtudiantController::class, 'store'])->middleware('auth')->name('Etudiant.storeFile');
Route::get('/updateFile/{id}', [EtudiantController::class, 'editFile'])->middleware('auth')->name('update.file');
Route::post('/updateFile/{id}', [EtudiantController::class, 'updateFile'])->middleware('auth')->name('updateFile');


// ROUTE FOR MESSAGERIE

Route::get('/Messages', [MessageController::class, 'index'])->middleware('auth')->name('Messages.index');
Route::get('/Message/{id}', [MessageController::class, 'read'])->middleware('auth')->name('Message.read');
Route::get('/Message/Show/{id}', [MessageController::class, 'show'])->middleware('auth')->name('Message.show');
Route::post('/Message/Send', [MessageController::class, 'store'])->middleware('auth')->name('Message.store');
Route::post('/Message/SendUser', [MessageController::class, 'contact'])->middleware('auth')->name('Message.contact');
Route::post('/Message/Update/{id}', [MessageController::class, 'updatestatut'])->middleware('auth')->name('Message.updatestatut');
Route::get('/Message/Update/{id}', [MessageController::class, 'updatestatut'])->middleware('auth')->name('Message.updatestatut');
// pour profil entreprise et detail annonce
Route::get('/entreprise/profil/{id}', [EntrepriseController::class, 'profil'])->middleware('auth')->name('Entreprise.Profil');
Route::get('/entreprise/showannonce/{id}', [EntrepriseController::class, 'show'])->middleware('auth')->name('Entreprise.annonce.show');
