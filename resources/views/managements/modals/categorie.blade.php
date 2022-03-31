<!-- BEGIN Modal -->
<div class="modal fade" id="categorieModal" tabindex="-1" role="dialog" aria-labelledby="categorieModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="categorieModalTitle">Création d'une catégorie</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"> 
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                        <label class="control-label" for="nom_categorie_ajax">Nom catégorie</label>
                        <input class="form-control" placeholder="Nom catégorie" type="text" id="nom_categorie_ajax" name="nom_categorie_ajax">
                        <span class="fa fa-user form-control-feedback" aria-hidden="true"></span> </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                        <label class="control-label" for="type_categorie_ajax">Type catégorie</label>
                        <select  class="form-control" id="type_categorie_ajax" name="type_categorie_ajax" class="form-control">
                            <option value="">-- Type --</option>
                            <option value="stock">Stockable</option>
                            <option value="nstock">Non stockable</option>
                            <option value="service">Service</option>
                            <option value="consommable">Consommable</option>
                        </select>
                        <span class="fa fa-wrench form-control-feedback" aria-hidden="true"></span> </div>
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
                <button type="submit" class="btn btn-primary" name="sendCategorie" id="sendCategorie" disabled>Valider</button>
                <script type="text/javascript">
                    // -------------------------------------------------------------------- //
                    $(document).on('keyup','input[name=nom_categorie_ajax]',function(){
                        var nom_categorie_ajax = $('input[name=nom_categorie_ajax]').val();
                        var btn = $('button[name=sendCategorie]');
                        (!nom_categorie_ajax && nom_categorie_ajax=='') ? btn.prop('disabled',true):btn.prop('disabled',false) ;
                    })
                    $(document).on('click','#sendCategorie',function(e){
                        var data = {
                            _token : $('input[name=_token]').val(),
                            nom_categorie_ajax : $('#nom_categorie_ajax').val(),
                            type_categorie_ajax : $('#type_categorie_ajax').val(),
                            description_ajax : $('#description_ajax').val(),
                        }
                        var url = "{{Route('modal.store_categorie_ajax')}}";
                        var modal = 'categorieModal';
                        var erreur = "Erreur d'enregistrement de la catégorie !";
                        var obj = {
                            url : "{{Route('modal.get_categorie_ajax')}}",
                            name : '{{$categorie}}',
                            params : {
                                key0 : '-- Catégories --',
                                key1 : 'id',
                                key2 : 'produit',
                                key3 : 'nom_categorie',
                            }
                        }
                        store_categorie_ajax(data,url,modal,erreur,obj);
                        $('#nom_categorie_ajax').val('');
                        $('#type_categorie_ajax').val('');
                        $('#description_ajax').val('');
                    });
                </script>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Quitter</button>
            </div>
        </div>
    </div>
</div>
@include('managements.modals.data_categorie',['categorie2'=>"nom_categorie_prod_ajax"])
<!-- END Modal -->