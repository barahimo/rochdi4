<!-- BEGIN Modal -->
<div class="modal fade" id="clientModal" tabindex="-1" role="dialog" aria-labelledby="clientModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="clientModalTitle">Création d'un client</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"> 
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                        <label class="control-label" for="nom_client_ajax">Nom complet</label>
                        <input class="form-control" placeholder="Nom complet" type="text" name="nom_client_ajax" id="nom_client_ajax">
                        <span class="fa fa-user form-control-feedback" aria-hidden="true"></span> </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                        <label class="control-label" for="adresse_ajax">Adresse</label>
                        <input class="form-control" placeholder="Adresse" type="text" name="adresse_ajax" id="adresse_ajax">
                        <span class="fa fa-map-marker form-control-feedback" aria-hidden="true"></span> </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                        <label class="control-label" for="telephone_ajax">Téléphone</label>
                        <input class="form-control" placeholder="Téléphone" type="text" name="telephone_ajax" id="telephone_ajax">
                        <span class="fa fa-phone form-control-feedback" aria-hidden="true"></span> </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                        <label class="control-label" for="solde_ajax">Solde</label>
                        <input class="form-control" placeholder="Solde" type="number" step="0.01" min="0" value="0" name="solde_ajax" id="solde_ajax">
                        <span class="fa fa-money form-control-feedback" aria-hidden="true"></span> </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="sendClient" id="sendClient" disabled>Valider</button>
                <script type="text/javascript">
                    // -------------------------------------------------------------------- //
                    $(document).on('keyup','input[name=nom_client_ajax]',function(){
                        var nom_client_ajax = $('input[name=nom_client_ajax]').val();
                        var btn = $('button[name=sendClient]');
                        (!nom_client_ajax && nom_client_ajax=='') ? btn.prop('disabled',true):btn.prop('disabled',false) ;
                    })
                    // -------------------------------------------------------------------- //
                    $(document).on('click','#sendClient',function(e){ 
                        var data = {
                            _token : $('input[name=_token]').val(),
                            nom_client_ajax : $('#nom_client_ajax').val(),
                            adresse_ajax : $('#adresse_ajax').val(),
                            telephone_ajax : $('#telephone_ajax').val(),
                            solde_ajax : $('#solde_ajax').val(),
                        }
                        var url = "{{Route('modal.store_client_ajax')}}";
                        var modal = 'clientModal';
                        var erreur = "Erreur d'enregistrement du client !";
                        var obj = {
                            url : "{{Route('modal.get_client_ajax')}}",
                            name : 'client',
                            params : {
                                key0 : '-- Clients --',
                                key1 : 'id',
                                key2 : 'code',
                                key3 : 'nom_client',
                            }
                        }
                        store_ajax(data,url,modal,erreur,obj);
                        $('#nom_client_ajax').val('');
                        $('#adresse_ajax').val('');
                        $('#telephone_ajax').val('');
                        $('#solde_ajax').val('0');
                    });
                </script>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Quitter</button>
            </div>
        </div>
    </div>
</div>
@include('managements.modals.data')
<!-- END Modal -->