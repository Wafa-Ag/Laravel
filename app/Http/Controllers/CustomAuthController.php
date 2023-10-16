<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;  //pour la securité du MDP
use Illuminate\Support\Facades\Session; //
use Illuminate\Support\Facades\Auth;
use App\Models\Etudiant;

class CustomAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = Ville::all(); // Récupère tous les villes
        return view('auth.create',[
            "villes" => $villes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required', 
            'address' => 'required', 
            'phone' => 'required|regex:/^\d{3}\s\d{3}-\d{4}$/',
            'email' => 'required|email|unique:users', 
            'date' => 'required|date',
            'password' => 'required|min:6',
        ]);
        
        $etudiant = new Etudiant;
        $etudiant->nom_etudiant = $request->input('name');
        $etudiant->adress = $request->input('address');
        $etudiant->phone = $request->input('phone');
        $etudiant->email = $request->input('email');
        $etudiant->date_de_naissance = $request->input('date');
        $etudiant->ville_id = $request->input('ville');
        $etudiant->save();

        $user = new User; 
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->password = Hash::make($request->password); 
        $user->etudiant_id = $etudiant->id;
        $user->save();

        

        return redirect(route('login'))->withSuccess(__("lang.success_user_register"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function authentication(Request $request){ 
        $request->validate([
             'email' => 'required|email',
              'password' => 'required|min:6|max:20'
        ]);
        $credentials = $request->only('email', 'password');
        if(!Auth::validate($credentials)):
            return redirect('login')->withErrors(__('auth.failed'));
        endif; 
        $user = Auth::getProvider()->retrieveByCredentials($credentials); 
        Auth::login($user, $request->get('remember')); 
        //return redirect()->intended('dashboard')->withSuccess('Signed in');
        return redirect('forum')->withSuccess(__("lang.signed_in"));    
    }
    
    public function logout(){ 
        Session::flush(); 
        Auth::logout();
        return redirect(route('login')); 
    }
}
