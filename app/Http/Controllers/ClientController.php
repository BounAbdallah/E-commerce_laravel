<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function ajoutClient(Request $request)
    {
        if ($request->session()->get('client')) {
            return redirect('/profil')->with('status', 'Vous devez vous déconnecter avant de vous ré-inscrire.');
        }
        return view('clients/inscription');
    }

    public function sauvegardeClient(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:clients,email',
            'mot_de_passe' => 'required|min:8',
        ], [
            'nom.required' => 'Veuillez entrer votre nom.',
            'prenom.required' => 'Veuillez entrer votre prénom.',
            'email.required' => 'Veuillez entrer votre adresse email.',
            'email.email' => 'Veuillez entrer une adresse email valide.',
            'email.unique' => 'Cette adresse email est déjà utilisée.',
            'mot_de_passe.required' => 'Veuillez entrer votre mot de passe.',
            'mot_de_passe.min' => 'Le mot de passe doit comporter au moins 8 caractères.',
        ]);

        $data = $request->all();
        $data['mot_de_passe'] = bcrypt($request->input('mot_de_passe'));
        Client::create($data);
        return view('clients/connexion');
    }

    public function connexion(Request $request)
    {
        if ($request->session()->get('client')) {
            return redirect('/profil')->with('status', 'Vous devez vous déconnecter avant de vous reconnecter.');
        }
        return view('clients/connexion');
    }

    public function traitementConnexion(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'mot_de_passe' => 'required',
        ], [
            'email.required' => 'Veuillez entrer votre adresse email.',
            'email.email' => 'Veuillez entrer une adresse email valide.',
            'mot_de_passe.required' => 'Veuillez entrer votre mot de passe.',
        ]);

        $client = Client::where('email', $request->input('email'))->first();

        if ($client) {
            if (Hash::check($request->input('mot_de_passe'), $client->mot_de_passe)) {
                $request->session()->put('client', $client);
                return redirect('/profil')->with('status', 'Connexion réussie.');
            } else {
                return back()->withInput()->withErrors(['mot_de_passe' => 'Mot de passe incorrect.']);
            }
        } else {
            return back()->withInput()->withErrors(['email' => 'Désolé, vous n\'avez pas de compte avec cet email.']);
        }
    }

    public function deconnexion(Request $request)
    {
        $request->session()->forget('client');
        return redirect('/')->with('status', 'Vous venez de vous déconnecter.');
    }

    public function mesCommandes(Request $request)
    {
        $client = $request->session()->get('client');
        if (!$client) {
            return redirect('/connexionClient')->with('status', 'Vous devez être connecté pour voir vos commandes.');
        }

        $commandes = Commande::where('client_id', $client->id)->get();
        return view('commandes.mescommandes', compact('commandes'));
    }

    public function detailCommande($id, Request $request)
    {
        $client = $request->session()->get('client');
        if (!$client) {
            return redirect('/connexionClient')->with('status', 'Vous devez être connecté pour voir les détails de vos commandes.');
        }

        $commande = Commande::with('produits')->where('id', $id)->where('client_id', $client->id)->first();

        if (!$commande) {
            return redirect('mescommandes')->with('status', 'Commande non trouvée.');
        }

        return view('commandes.detailCommande', compact('commande'));
    }
}
