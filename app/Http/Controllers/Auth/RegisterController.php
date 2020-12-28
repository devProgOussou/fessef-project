<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Association;
use App\Models\Entreprise;
use App\Models\Etudiant;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function registerStudent(){
        return view('auth.registerStudent');
    }

    public function registerCompany(){
        return view('auth.registerCompany');
    }

    public function registerAssociation(){
        return view('auth.registerAssociation');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    /**
     *
     * @param array $data
     * @return RedirectResponse|void
     */
    protected function create(array $data)
    {
        if($data['type'] == 1)
        {
            $isCompany = 1;
            $user = User::create([
                'name' => $data['NomEntreprise'],
                'email' => $data['email'],
                'isCompany' => $isCompany,
                'password' => Hash::make($data['password']),
            ]);
            Entreprise::create([
                'NomEntreprise' => $data['NomEntreprise'],
//                'adresse' => $data['adresse'],
//                'telephone' => $data['adresse'],
//                'lien' => $data['lien'],
//                'description' => $data['description'],
//                'domaineActivites' => $data['domaineActivites'],
                'user_id' =>$user->id,
            ]);
            return $user;
        }
        elseif($data['type'] == 2)
        {
            $isAssociation = 1;
            $user = User::create([
                'name' => $data['NomAssociation'],
                'email' => $data['email'],
                'isAssociation' => $isAssociation,
                'password' => Hash::make($data['password']),
            ]);

            Association::create([
                'NomAssociation' => $data['NomAssociation'],
//                'adresse' => $data['adresse'],
//                'telephone' => $data['telephone'],
//                'lien' => $data['lien'],
//                'domaineActivites' => $data['domaineActivites'],
//                'description' => $data['description'],
                'user_id' =>$user->id,
            ]);
            return $user;
        }
        elseif($data['type'] == 3)
        {
            $isEtudiant = 1;
            $nomEtudiant = $data['nom'];
            $prenomEtudiant = $data['prenom'];

            $user = User::create([
                'name' => "$prenomEtudiant"." "."$nomEtudiant",
                'email' => $data['email'],
                'isEtudiant' => $isEtudiant,
                'password' => Hash::make($data['password']),
            ]);

            Etudiant::create([
                'nom' => $data['nom'],
                'prenom' => $data['prenom'],
//                'telephone' => $data['telephone'],
//                'adresse' => $data['adresse'],
//                'genre' => $data['genre'],
//                'dateDeNaissance' => $data['dateDeNaissance'],
//                'competences' => $data['competences'],
//                'description' => $data['description'],
                'user_id' =>$user->id,
            ]);
            return $user;
        }
        elseif($data['type'] == 3)
        {
            $user = User::create([
//                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
            return $user;
        }
        else{
            return back();
        }
    }
}
