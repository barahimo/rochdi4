@extends('layout.dashboard')
@section('contenu')
<?php
    use function App\Providers\getTypeCategorie;
?>
{{-- ################## --}}
<!-- Content Header (Page header) -->
<div class="content-header sty-one">
    <h1>Modification de produit</h1>
    <ol class="breadcrumb">
        <li><a href="{{route('app.home')}}">Home</a></li>
        <li><i class="fa fa-angle-right"></i> Produit</li>
    </ol>
</div>
{{-- ################## --}}
<!-- Main content -->
<div class="content">
    {{-- ---------------- --}}
    <div class="row m-t-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-blue">
                    <h5 class="text-white m-b-0">Produit</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('produit.update',['produit'=> $produit])}}" method="POST">
                        @csrf 
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                <label class="control-label" for="code_produit"">Code produit</label>
                                <input class="form-control" placeholder="Code produit" type="text" id="code_produit" name="code_produit" value="{{ old('code_produit', $produit->code_produit?? null) }}">
                                <span class="fa fa-barcode form-control-feedback" aria-hidden="true"></span> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                <label class="control-label" for="nom_produit">Nom produit</label>
                                <input class="form-control" placeholder="Nom produit" type="text" id="nom_produit" name="nom_produit" value="{{ old('nom_produit', $produit->nom_produit?? null) }}">
                                <span class="fa fa-bookmark form-control-feedback" aria-hidden="true"></span> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label class="control-label" for="nom_categorie">Catégorie</label>
                                    <select class="form-control selectpicker show-tick" 
                                        id="nom_categorie" 
                                        name="nom_categorie" 
                                        data-style="text-black bg-white border border-dark" 
                                        data-live-search="true" 
                                        data-size="5" 
                                        title="-- Catégories --"
                                        data-header="Choisir une catégorie">
                                        <option value="0">-- Catégories --</option>
                                        {{-- ------------------------------ --}}
                                        <option data-divider="true"></option>
                                        {{-- ------------------------------ --}}
                                        @foreach($categories as $categorie)
                                            <option value="{{$categorie->id}}" data-subtext="| {{getTypeCategorie($categorie->type_categorie)}} ; {{count($categorie->produit)}} produit(s) |" @if ($categorie->id == old('nom_categorie',$produit->categorie_id ?? null)) selected="selected" @endif> {{ $categorie->nom_categorie}}</option>
                                        @endforeach
                                    </select>
                                    {{-- <span class="fa fa-tags form-control-feedback" aria-hidden="true"></span>  --}}
                                    <a href="#" class="btn btn-sm btn-outline-info mt-1" data-toggle="modal" data-target="#categorieModal" style="cursor: pointer !important;"><span class="fa fa-plus" aria-hidden="true"></span> catégorie </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                <label class="control-label" for="tva">TVA</label>
                                <select  class="form-control" id="tva" name="tva" class="form-control">
                                    <option value="">-- TVA --</option>
                                    <option value="20" @if ($produit->TVA == old('tva',20 ?? null)) selected="selected" @endif>20%</option>
                                    <option value="14" @if ($produit->TVA == old('tva',14 ?? null)) selected="selected" @endif>14%</option>
                                    <option value="10" @if ($produit->TVA == old('tva',10 ?? null)) selected="selected" @endif>10%</option>
                                    <option value="7" @if ($produit->TVA == old('tva',7 ?? null)) selected="selected" @endif>7%</option>
                                    <option value="0" @if ($produit->TVA == old('tva',0 ?? null)) selected="selected" @endif>0%</option>
                                </select>
                                <span class="fa fa-wrench form-control-feedback" aria-hidden="true"></span> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                <label class="control-label" for="prix_HT">Prix d'achat HT</label>
                                <input class="form-control" placeholder="" type="number" step="0.01" min="0" id="prix_HT" name="prix_HT" value="{{ old('prix_HT',number_format($produit->prix_HT,2, '.', '') ?? null) }}">
                                <span class="fa fa-money form-control-feedback" aria-hidden="true"></span> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                <label class="control-label" for="prix_TTC">Prix d'achat TTC</label>
                                <input class="form-control" placeholder="" type="number" step="0.01" min="0" id="prix_TTC" name="prix_TTC" value="{{ old('prix_TTC', number_format($produit->prix_TTC,2, '.', '') ?? null) }}">
                                <span class="fa fa-money form-control-feedback" aria-hidden="true"></span> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                <label class="control-label" for="prix_produit_HT">Prix de vente HT</label>
                                <input class="form-control" placeholder="" type="number" step="0.01" min="0" id="prix_produit_HT" name="prix_produit_HT" value="{{ old('prix_produit_HT', number_format($produit->prix_produit_HT,2, '.', '') ?? null) }}">
                                <span class="fa fa-money form-control-feedback" aria-hidden="true"></span> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                <label class="control-label" for="prix_produit_TTC">Prix de vente TTC</label>
                                <input class="form-control" placeholder="" type="number" step="0.01" min="0" id="prix_produit_TTC" name="prix_produit_TTC" value="{{ old('prix_produit_TTC', number_format($produit->prix_produit_TTC,2, '.', '') ?? null) }}">
                                <span class="fa fa-money form-control-feedback" aria-hidden="true"></span> </div>
                            </div>
                            <div class="col-md-6">
                                <fieldset class="form-group">
                                    <label class="control-label" for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $produit->description?? null) }}</textarea>
                                </fieldset>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-warning text-white" name="updateProduit">Modifier</button>
                                &nbsp;
                                <a href="{{action('ProduitController@index')}}" class="btn btn-info">Retour</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- ---------------- --}}
</div>
<!-- /.content --> 
<!-- BEGIN Modal -->
@include("managements.modals.categorie",['categorie' => "nom_categorie"])
<!-- END Modal -->
{{-- ################## --}}
<script type="text/javascript">
    $(document).on('keyup','#code_produit',function(){
        myFunction();
    })
    $(document).on('keyup','#nom_produit',function(){
        myFunction();
    })
    $(document).on('click','#tva',function(){
        myFunction();
        calculTTC();
        calculAchatTTC();
    })
    $(document).on('keyup','#prix_TTC',function(){
        myFunction();
        calculAchatHT();
    })
    $(document).on('click','#prix_TTC',function(){
        myFunction();
        calculAchatHT();
    })
    $(document).on('keyup','#prix_HT',function(){
        myFunction();
        calculAchatTTC();
    })
    $(document).on('click','#prix_HT',function(){
        myFunction();
        calculAchatTTC();
    })
    $(document).on('keyup','#prix_produit_TTC',function(){
        myFunction();
        calculHT();
    })
    $(document).on('click','#prix_produit_TTC',function(){
        myFunction();
        calculHT();
    })
    $(document).on('keyup','#prix_produit_HT',function(){
        myFunction();
        calculTTC();
    })
    $(document).on('click','#prix_produit_HT',function(){
        myFunction();
        calculTTC();
    })
    $(document).on('click','#nom_categorie',function(){
        myFunction();
    })
    function calculAchatHT() {
        var tva = $('#tva').val();
        var prix_HT = $('#prix_HT');
        var prix_TTC = $('#prix_TTC');
        var ttc = parseFloat(prix_TTC.val());
        prix_HT.val((ttc / (1 + tva/100)).toFixed(2));
    }
    function calculAchatTTC() {
        var tva = $('#tva').val();
        var prix_HT = $('#prix_HT');
        var prix_TTC = $('#prix_TTC');
        var ht = parseFloat(prix_HT.val());
        prix_TTC.val((ht + (ht * tva/100)).toFixed(2));
    }
    function calculHT() {
        var tva = $('#tva').val();
        var prix_produit_HT = $('#prix_produit_HT');
        var prix_produit_TTC = $('#prix_produit_TTC');
        var ttc = parseFloat(prix_produit_TTC.val());
        prix_produit_HT.val((ttc / (1 + tva/100)).toFixed(2));
    }
    function calculTTC() {
        var tva = $('#tva').val();
        var prix_produit_HT = $('#prix_produit_HT');
        var prix_produit_TTC = $('#prix_produit_TTC');
        var ht = parseFloat(prix_produit_HT.val());
        prix_produit_TTC.val((ht + (ht * tva/100)).toFixed(2));
    }
    function myFunction() {
        var code_produit = $('#code_produit').val();
        var nom_produit = $('#nom_produit').val();
        var tva = $('#tva').val();
        var prix_produit_HT = $('#prix_produit_HT').val();
        var prix_produit_TTC = $('#prix_produit_TTC').val();
        var nom_categorie = $('#nom_categorie').val();
        // -----    -----       ---- //
        var btn = $('button[name=updateProduit]');
        if(
            (!code_produit && code_produit=='') || 
            (!nom_produit && nom_produit=='') || 
            (!tva && tva=='') || 
            (!prix_produit_TTC && prix_produit_TTC===0) || 
            (!prix_produit_HT && prix_produit_HT===0) || 
            (!nom_categorie && nom_categorie=='')
        ) {
            btn.prop('disabled',true);
        }
        else{
            btn.prop('disabled',false);
        }
    }
</script>
{{-- ################## --}}
@endsection