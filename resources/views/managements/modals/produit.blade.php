<!-- BEGIN Modal -->
<div class="modal fade" id="produitModal" tabindex="-1" role="dialog" aria-labelledby="produitModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="produitModalTitle">Création d'un produit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                        <label class="control-label" for="code_produit_ajax"">Code produit</label>
                        <input class="form-control" placeholder="Code produit" type="text" id="code_produit_ajax" name="code_produit_ajax">
                        <span class="fa fa-barcode form-control-feedback" aria-hidden="true"></span> </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                        <label class="control-label" for="nom_produit_ajax">Nom produit</label>
                        <input class="form-control" placeholder="Nom produit" type="text" id="nom_produit_ajax" name="nom_produit_ajax">
                        <span class="fa fa-bookmark form-control-feedback" aria-hidden="true"></span> </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            <label class="control-label" for="nom_categorie_prod_ajax">Catégorie</label>
                            <select class="form-control selectpicker show-tick" 
                                id="nom_categorie_prod_ajax" 
                                name="nom_categorie_prod_ajax" 
                                data-style="text-black bg-white border border-dark" 
                                data-live-search="true" data-size="5" 
                                title = "-- Catégories --"
                                data-header="Choisir une catégorie">
                                <option value="">-- Catégories --</option>
                                {{-- ------------------------------ --}}
                                <option data-divider="true"></option>
                                {{-- ------------------------------ --}}
                                @foreach($categories as $categorie)
                                {{-- <option value="{{$categorie->id}}" data-subtext="{{count($categorie->produit)}}" @if ($categorie->id == old('nom_categorie_prod_ajax',$categorie->id ?? null)) selected="selected" @endif>{{ $categorie->nom_categorie}}</option> --}}
                                <option value="{{$categorie->id}}" data-subtext="| {{count($categorie->produit)}} produit(s) |">{{ $categorie->nom_categorie}}</option>
                                @endforeach
                            </select>
                            <span class="fa fa-tags form-control-feedback" aria-hidden="true"></span> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                        <label class="control-label" for="tva_ajax">TVA</label>
                        <select  class="form-control" id="tva_ajax" name="tva_ajax" class="form-control">
                            <option value="">-- TVA --</option>
                            <option value="20">20%</option>
                            <option value="14">14%</option>
                            <option value="10">10%</option>
                            <option value="7">7%</option>
                            <option value="0">0%</option>
                        </select>
                        <span class="fa fa-wrench form-control-feedback" aria-hidden="true"></span> </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                        <label class="control-label" for="prix_HT_ajax">Prix d'achat HT</label>
                        <input class="form-control" placeholder="" type="number" step="0.01" min="0" value="0" id="prix_HT_ajax" name="prix_HT_ajax">
                        <span class="fa fa-money form-control-feedback" aria-hidden="true"></span> </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                        <label class="control-label" for="prix_TTC_ajax">Prix d'achat TTC</label>
                        <input class="form-control" placeholder="" type="number" step="0.01" min="0" value="0" id="prix_TTC_ajax" name="prix_TTC_ajax">
                        <span class="fa fa-money form-control-feedback" aria-hidden="true"></span> </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                        <label class="control-label" for="prix_produit_HT_ajax">Prix de vente HT</label>
                        <input class="form-control" placeholder="" type="number" step="0.01" min="0" value="0" id="prix_produit_HT_ajax" name="prix_produit_HT_ajax">
                        <span class="fa fa-money form-control-feedback" aria-hidden="true"></span> </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                        <label class="control-label" for="prix_produit_TTC_ajax">Prix de vente TTC</label>
                        <input class="form-control" placeholder="" type="number" step="0.01" min="0" value="0" id="prix_produit_TTC_ajax" name="prix_produit_TTC_ajax">
                        <span class="fa fa-money form-control-feedback" aria-hidden="true"></span> </div>
                    </div>
                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <label class="control-label" for="description_ajax">Description</label>
                            <textarea class="form-control" id="description_ajax" name="description_ajax" rows="3"></textarea>
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="sendProduit" id="sendProduit" disabled>Valider</button>
                <script type="text/javascript">
                    // -------------------------------------------------------------------- //
                    $(document).on('keyup','#code_produit_ajax',function(){
                        myFunction();
                    })
                    $(document).on('keyup','#nom_produit_ajax',function(){
                        myFunction();
                    })
                    $(document).on('click','#tva_ajax',function(){
                        myFunction();
                        calculTTC();
                        calculAchatTTC();
                    })
                    $(document).on('keyup click','#prix_TTC_ajax',function(){
                        myFunction();
                        calculAchatHT();
                    })
                    $(document).on('keyup click','#prix_HT_ajax',function(){
                        myFunction();
                        calculAchatTTC();
                    })
                    $(document).on('keyup click','#prix_produit_TTC_ajax',function(){
                        myFunction();
                        calculHT();
                    })
                    $(document).on('keyup click','#prix_produit_HT_ajax',function(){
                        myFunction();
                        calculTTC();
                    })
                    $(document).on('click','#nom_categorie_prod_ajax',function(){
                        myFunction();
                    })
                    function calculAchatHT() {
                        var tva = $('#tva_ajax').val();
                        var prix_HT = $('#prix_HT_ajax');
                        var prix_TTC = $('#prix_TTC_ajax');
                        var ttc = parseFloat(prix_TTC.val());
                        prix_HT.val((ttc / (1 + tva/100)).toFixed(2));
                    }
                    function calculAchatTTC() {
                        var tva = $('#tva_ajax').val();
                        var prix_HT = $('#prix_HT_ajax');
                        var prix_TTC = $('#prix_TTC_ajax');
                        var ht = parseFloat(prix_HT.val());
                        prix_TTC.val((ht + (ht * tva/100)).toFixed(2));
                    }
                    function calculHT() {
                        var tva = $('#tva_ajax').val();
                        var prix_produit_HT = $('#prix_produit_HT_ajax');
                        var prix_produit_TTC = $('#prix_produit_TTC_ajax');
                        var ttc = parseFloat(prix_produit_TTC.val());
                        prix_produit_HT.val((ttc / (1 + tva/100)).toFixed(2));
                    }
                    function calculTTC() {
                        var tva = $('#tva_ajax').val();
                        var prix_produit_HT = $('#prix_produit_HT_ajax');
                        var prix_produit_TTC = $('#prix_produit_TTC_ajax');
                        var ht = parseFloat(prix_produit_HT.val());
                        prix_produit_TTC.val((ht + (ht * tva/100)).toFixed(2));
                    }
                    function myFunction() {
                        var code_produit = $('#code_produit_ajax').val();
                        var nom_produit = $('#nom_produit_ajax').val();
                        var tva = $('#tva_ajax').val();
                        var prix_produit_HT = $('#prix_produit_HT_ajax').val();
                        var prix_produit_TTC = $('#prix_produit_TTC_ajax').val();
                        var nom_categorie = $('#nom_categorie_prod_ajax').val();
                        // -----    -----       ---- //
                        var btn = $('button[name=sendProduit]');
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
                    // -------------------------------------------------------------------- //
                    $(document).on('click','#sendProduit',function(e){
                        var data = {
                            _token : $('input[name=_token]').val(),
                            code_produit_ajax : $('#code_produit_ajax').val(),
                            nom_produit_ajax : $('#nom_produit_ajax').val(),
                            nom_categorie_prod_ajax : $('#nom_categorie_prod_ajax').val(),
                            tva_ajax : $('#tva_ajax').val(),
                            prix_HT_ajax : $('#prix_HT_ajax').val(),
                            prix_TTC_ajax : $('#prix_TTC_ajax').val(),
                            prix_produit_HT_ajax : $('#prix_produit_HT_ajax').val(),
                            prix_produit_TTC_ajax : $('#prix_produit_TTC_ajax').val(),
                            description_ajax : $('#description_ajax').val(),
                        }
                        var url = "{{Route('modal.store_produit_ajax')}}";
                        var modal = 'produitModal';
                        var erreur = "Erreur d'enregistrement du produit !";
                        var obj = {
                            url : "{{Route('modal.get_produit_ajax')}}",
                            name : 'product',
                            params : {
                                key0 : '-- Produits --',
                                key1 : 'id',
                                key2 : {
                                    key21 : 'code_produit',
                                    key22 : 'prix_TTC',
                                    key23 : 'quantite',
                                },
                                key3 : 'nom_produit',
                            }
                        }
                        store_produit_ajax(data,url,modal,erreur,obj);
                        $('#code_produit_ajax').val('');
                        $('#nom_produit_ajax').val('');
                        $('#nom_categorie_prod_ajax').val('');
                        $('#tva_ajax').val('');
                        $('#prix_HT_ajax').val('0');
                        $('#prix_TTC_ajax').val('0');
                        $('#prix_produit_HT_ajax').val('0');
                        $('#prix_produit_TTC_ajax').val('0');
                        $('#description_ajax').val('');
                        $('#category').selectpicker('refresh');
                    });
                </script>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Quitter</button>
            </div>
        </div>
    </div>
</div>
@include('managements.modals.data_produit',['categorie1' => "category",'categorie2'=>"nom_categorie_prod_ajax"])
<!-- END Modal -->