<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Client;
use App\Fournisseur;
use App\Produit;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModalController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('statususer');
    }

    /** 
    *--------------------------------------------------------------------------
    * Les fonctions categorie
    *--------------------------------------------------------------------------
    **/
    public function get_categorie_ajax(){ 
        $user_id = Auth::user()->id;
        if(Auth::user()->is_admin == 0)
            $user_id = Auth::user()->user_id; 
        $data=Categorie::where('user_id',$user_id)->with('produit')->get();
        return response()->json($data);
    }

    public function store_categorie_ajax(Request $request){  
        $nom_categorie_ajax = $request->input('nom_categorie_ajax');
        $type_categorie_ajax = $request->input('type_categorie_ajax');
        $description_ajax = $request->input('description_ajax');
        if(!empty($nom_categorie_ajax)){
            $user_id = Auth::user()->id;
            if(Auth::user()->is_admin == 0)
                $user_id = Auth::user()->user_id;
            $categorie = new Categorie();
            $categorie ->nom_categorie = $nom_categorie_ajax;
            $categorie ->type_categorie = $type_categorie_ajax;
            $categorie ->description = $description_ajax;
            $categorie->user_id = $user_id;
    
            $categorie->save();
        }
        else {
            return ['status'=>"error",'message'=>"Veuillez d'ajouter les champs importants !"];
        }
        return ['status'=>"success",'message'=>"La catégorie a été bien enregistrée !!","id"=>$categorie->id];
    }
    /** 
    *--------------------------------------------------------------------------
    * Les fonctions produit
    *--------------------------------------------------------------------------
    **/
    public function get_produit_ajax(Request $request){ 
        $user_id = Auth::user()->id;
        if(Auth::user()->is_admin == 0)
            $user_id = Auth::user()->user_id; 
        $data=Produit::where('categorie_id',$request->id)->where('user_id',$user_id)->get();
        return response()->json($data);
    }

    public function store_produit_ajax(Request $request){  
        $code_produit_ajax = $request->input('code_produit_ajax');
        $nom_produit_ajax = $request->input('nom_produit_ajax');
        $nom_categorie_prod_ajax =  $request->input('nom_categorie_prod_ajax');
        $tva_ajax = $request->input('tva_ajax');
        $prix_TTC_ajax = $request->input('prix_TTC_ajax');
        $prix_produit_TTC_ajax = $request->input('prix_produit_TTC_ajax');
        $description_ajax = $request->input('description_ajax');

        if(!empty($nom_produit_ajax)){
            $user_id = Auth::user()->id;
            if(Auth::user()->is_admin == 0)
                $user_id = Auth::user()->user_id;
            $tva = $tva_ajax;

            $ttc = $prix_produit_TTC_ajax;
            $ttcAchat = $prix_TTC_ajax;
    
            $produit = new Produit();
            $produit->nom_produit = $nom_produit_ajax;
            $produit->code_produit = $code_produit_ajax;
            $produit->TVA = $tva;
    
            $produit->prix_HT = $ttcAchat / (1 + $tva/100); 
            $produit->prix_TTC = $ttcAchat ;
    
            $produit->prix_produit_HT = $ttc / (1 + $tva/100); 
            $produit->prix_produit_TTC = $ttc ;
    
            $produit->description = $description_ajax;
    
            $produit->categorie_id =  $nom_categorie_prod_ajax;
            $produit->user_id = $user_id;
    
            $produit->save();
        }
        else {
            return ['status'=>"error",'message'=>"Veuillez d'ajouter les champs importants !"];
        }
        $prod=Produit::with('categorie')->where('user_id',$produit->user_id)->find($produit->id);
        return ['status'=>"success",'message'=>"Le produit a été bien enregistré !!","produit"=>$prod];
    }
    /** 
    *--------------------------------------------------------------------------
    * Les fonctions client
    *--------------------------------------------------------------------------
    **/
    public function get_client_ajax(){ 
        $user_id = Auth::user()->id;
        if(Auth::user()->is_admin == 0)
            $user_id = Auth::user()->user_id; 
        $data=Client::where('user_id',$user_id)->get();
        return response()->json($data);
    }

    public function store_client_ajax(Request $request){  
        $nom_client_ajax = $request->input('nom_client_ajax');
        $adresse_ajax = $request->input('adresse_ajax');
        $telephone_ajax = $request->input('telephone_ajax');
        $solde_ajax = $request->input('solde_ajax');

        if(!empty($nom_client_ajax)){
            $user_id = Auth::user()->id;
            if(Auth::user()->is_admin == 0)
                $user_id = Auth::user()->user_id;
            $clients = Client::select('code')->where('user_id',$user_id)->get();
            $max = 0;
            if(count($clients) > 0){
                $list = [];
                foreach ($clients as $key => $client) {
                    $tab = explode("-",$client->code);
                    $n = $tab[1];
                    array_push($list,floatval($n));
                }
                $max =  max($list);
            }
            $str = $max + 1;
            $pad = str_pad($str,4,"0",STR_PAD_LEFT);
            $code = 'C-'.$pad;
            // --------------------------------------------------
            $client = new Client();
            $client->nom_client = $nom_client_ajax;
            $client->adresse = $adresse_ajax;
            $client->telephone = $telephone_ajax;
            $client->solde = $solde_ajax;
            $client->code = $code;
            $client->ICE = Str::slug($client->nom_client, '-');
            $client->user_id = $user_id;
            $client->save();
        }
        else {
            return ['status'=>"error",'message'=>"Veuillez d'ajouter les champs importants !"];
        }
        return ['status'=>"success",'message'=>"Le client a été bien enregistré !!","id"=>$client->id];
    }
    /** 
    *--------------------------------------------------------------------------
    * Les fonctions fournisseur
    *--------------------------------------------------------------------------
    **/
    public function get_fournisseur_ajax(){ 
        $user_id = Auth::user()->id;
        if(Auth::user()->is_admin == 0)
            $user_id = Auth::user()->user_id; 
        $data=Fournisseur::where('user_id',$user_id)->get();
        return response()->json($data);
    }
    public function formFournisseur(Request $request,$fournisseur,$user_id){
        $nom_fournisseur_ajax = $request->input('nom_fournisseur_ajax');
        $adresse_ajax = $request->input('adresse_ajax');
        $code_postal_ajax = $request->input('code_postal_ajax');
        $ville_ajax = $request->input('ville_ajax');
        $pays_ajax = $request->input('pays_ajax');
        $tel_ajax = $request->input('tel_ajax');
        $site_ajax = $request->input('site_ajax');
        $email_ajax = $request->input('email_ajax');
        $iff_ajax = $request->input('iff_ajax');
        $ice_ajax = $request->input('ice_ajax');
        $capital_ajax = $request->input('capital_ajax');
        $rc_ajax = $request->input('rc_ajax');
        $patente_ajax = $request->input('patente_ajax');
        $cnss_ajax = $request->input('cnss_ajax');
        $banque_ajax = $request->input('banque_ajax');
        $rib_ajax = $request->input('rib_ajax');
        $note_ajax = $request->input('note_ajax');

        $fournisseur->nom_fournisseur = $nom_fournisseur_ajax;
        $fournisseur->adresse = $adresse_ajax;
        $fournisseur->code_postal = $code_postal_ajax;
        $fournisseur->ville = $ville_ajax;
        $fournisseur->pays = $pays_ajax;
        $fournisseur->tel = $tel_ajax;
        $fournisseur->site = $site_ajax;
        $fournisseur->email = $email_ajax;
        $fournisseur->note = $note_ajax;
        $fournisseur->iff = $iff_ajax;
        $fournisseur->ice = $ice_ajax;
        $fournisseur->capital = $capital_ajax;
        $fournisseur->rc = $rc_ajax;
        $fournisseur->patente = $patente_ajax;
        $fournisseur->cnss = $cnss_ajax;
        $fournisseur->banque = $banque_ajax;
        $fournisseur->rib = $rib_ajax;

        $fournisseur->user_id = $user_id;
    }
    public function store_fournisseur_ajax(Request $request){  
        $nom_fournisseur_ajax = $request->input('nom_fournisseur_ajax');
        if(!empty($nom_fournisseur_ajax)){
            $user_id = Auth::user()->id;
            if(Auth::user()->is_admin == 0)
                $user_id = Auth::user()->user_id;
                $fournisseurs = Fournisseur::select('code')->where('user_id',$user_id)->get();
                $max = 0;
                if(count($fournisseurs) > 0){
                    $list = [];
                    foreach ($fournisseurs as $key => $fournisseur) {
                        $tab = explode("-",$fournisseur->code);
                        $n = $tab[1];
                        array_push($list,floatval($n));
                    }
                    $max =  max($list);
                }
                $str = $max + 1;
                $pad = str_pad($str,4,"0",STR_PAD_LEFT);
                $code = 'F-'.$pad;
                // --------------------------------------------------
                $fournisseur = new Fournisseur();
                $this->formFournisseur($request,$fournisseur,$user_id);
                $fournisseur->code = $code;
                $fournisseur->save();
        }
        else {
            return ['status'=>"error",'message'=>"Veuillez d'ajouter les champs importants !"];
        }
        return ['status'=>"success",'message'=>"Le fournisseur a été bien enregistré !!","id"=>$fournisseur->id];
    }
    /** 
    *--------------------------------------------------------------------------
    * Les fonctions ajax
    *--------------------------------------------------------------------------
    **/
    /** 
    *--------------------------------------------------------------------------
    * Autres fonctions
    *--------------------------------------------------------------------------
    **/
}
