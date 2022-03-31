<!-- BEGIN Modal -->
<div class="modal fade" id="fournisseurModal" tabindex="-1" role="dialog" aria-labelledby="fournisseurModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fournisseurModalTitle">Création d'un fournisseur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"> 
                <div id="form">
                    <div id="form1" data-view="on" style="display : content">
                        <!-- BEGIN Nom/Raison && Adresse -->
                        <div class="form-row">
                            <!-- BEGIN Nom/Raison -->
                            <div class="form-group col-md-6">
                                <label for="nom_fournisseur_ajax">Nom/Raison sociale :</label>
                                <div class="input-group">
                                    <input type="text" value="{{old('nom_fournisseur_ajax')}}" id="nom_fournisseur_ajax" name="nom_fournisseur_ajax" class="form-control" placeholder="Nom/Raison sociale" />
                                </div>
                            </div>
                            <!-- END Nom/Raison -->
                            <!-- BEGIN Adresse -->
                            <div class="form-group col-md-6">
                                <label for="adresse_ajax">Adresse</label>
                                <div class="input-group">
                                    <input type="text" value="{{old('adresse_ajax')}}" id="adresse_ajax" name="adresse_ajax" class="form-control" placeholder="Adresse"/>
                                </div>
                            </div>
                            <!-- END Adresse -->
                        </div>
                        <!-- END Nom/Raison && Adresse -->
                        <!-- BEGIN code_postal &&  ville -->
                        <div class="form-row">
                            <!-- BEGIN code_postal -->
                            <div class="form-group col-md-6">
                                <label for="code_postal_ajax">Code postal :</label>
                                <div class="input-group">
                                    <input type="text" value="{{old('code_postal_ajax')}}"  id="code_postal_ajax" name="code_postal_ajax"  class="form-control" placeholder="Code postal"/>
                                </div>
                            </div>
                            <!-- END code_postal -->
                            <!-- BEGIN ville -->
                            <div class="form-group col-md-6">
                                <label for="ville_ajax">Ville :</label>
                                <div class="input-group">
                                    <input type="text" value="{{old('ville_ajax')}}"  id="ville_ajax" name="ville_ajax"  class="form-control" placeholder="Ville"/>
                                </div>
                            </div>
                            <!-- END ville -->
                        </div>
                        <!-- END code_postal &&  ville -->
                        <!-- BEGIN pays &&  tel -->
                        <div class="form-row">
                            <!-- BEGIN pays -->
                            <div class="form-group col-md-6">
                                <label for="pays_ajax">Pays :</label>
                                <div class="input-group">
                                    <input type="text" value="{{old('pays_ajax')}}"  id="pays_ajax" name="pays_ajax"  class="form-control" placeholder="Pays"/>
                                </div>
                            </div>
                            <!-- END pays -->
                            <!-- BEGIN tel -->
                            <div class="form-group col-md-6">
                                <label for="tel_ajax">Téléphone :</label>
                                <div class="input-group">
                                    <input type="text" value="{{old('tel_ajax')}}"  id="tel_ajax" name="tel_ajax"  class="form-control" placeholder="Téléphone"/>
                                </div>
                            </div>
                            <!-- END tel -->
                        </div>
                        <!-- END pays &&  tel -->
                        <!-- BEGIN site && email -->
                        <div class="form-row">
                            <!-- BEGIN site -->
                            <div class="form-group col-md-6">
                                <label for="site_ajax">Site web :</label>
                                <div class="input-group">
                                    <input type="text" value="{{old('site_ajax')}}"  id="site_ajax" name="site_ajax"  class="form-control" placeholder="Site web"/>
                                </div>
                            </div>
                            <!-- END site -->
                            <!-- BEGIN email -->
                            <div class="form-group col-md-6">
                                <label for="email_ajax">Email :</label>
                                <div class="input-group">
                                    <input type="text" value="{{old('email_ajax')}}" id="email_ajax" name="email_ajax"  class="form-control" placeholder="Email"/>
                                </div>
                            </div>
                            <!-- END email -->
                        </div>
                        <!-- END site && email -->
                    </div>
                    <div id="form2" data-view="off" style="display : none">
                        <!-- BEGIN IF &&  ice -->
                        <div class="form-row">
                            <!-- BEGIN IF -->
                            <div class="form-group col-md-6">
                                <label for="iff_ajax">Identifiant fiscal :</label>
                                <div class="input-group">
                                    <input type="text" value="{{old('iff_ajax')}}"  id="iff_ajax" name="iff_ajax"  class="form-control" placeholder="Identifiant fiscal"/>
                                </div>
                            </div>
                            <!-- END IF -->
                            <!-- BEGIN ice -->
                            <div class="form-group col-md-6">
                                <label for="ice_ajax">Identifiant Commun (ICE) :</label>
                                <div class="input-group">
                                    <input type="text" value="{{old('ice_ajax')}}"  id="ice_ajax" name="ice_ajax"  class="form-control" placeholder="ICE"/>
                                </div>
                            </div>
                            <!-- END ice -->
                        </div>
                        <!-- END IF &&  ice -->
                        <!-- BEGIN capital &&  rc -->
                        <div class="form-row">
                            <!-- BEGIN capital -->
                            <div class="form-group col-md-6">
                                <label for="capital_ajax">Capital :</label>
                                <div class="input-group">
                                    <input type="text" value="{{old('capital_ajax')}}"  id="capital_ajax" name="capital_ajax"  class="form-control" placeholder="Capital"/>
                                </div>
                            </div>
                            <!-- END capital -->
                            <!-- BEGIN rc -->
                            <div class="form-group col-md-6">
                                <label for="rc_ajax">Registre du commerce :</label>
                                <div class="input-group">
                                    <input type="text" value="{{old('rc_ajax')}}"  id="rc_ajax" name="rc_ajax"  class="form-control" placeholder="Registre du commerce"/>
                                </div>
                            </div>
                            <!-- END rc -->
                        </div>
                        <!-- END capital &&  rc -->
                        <!-- BEGIN patente &&  cnss -->
                        <div class="form-row">
                            <!-- BEGIN patente -->
                            <div class="form-group col-md-6">
                                <label for="patente_ajax">Patente :</label>
                                <div class="input-group">
                                    <input type="text" value="{{old('patente_ajax')}}"  id="patente_ajax" name="patente_ajax"  class="form-control" placeholder="Patente"/>
                                </div>
                            </div>
                            <!-- END patente -->
                            <!-- BEGIN cnss -->
                            <div class="form-group col-md-6">
                                <label for="cnss_ajax">CNSS :</label>
                                <div class="input-group">
                                    <input type="text" value="{{old('cnss_ajax')}}"  id="cnss_ajax" name="cnss_ajax"  class="form-control" placeholder="CNSS"/>
                                </div>
                            </div>
                            <!-- END cnss -->
                        </div>
                        <!-- END patente &&  cnss -->
                        <!-- BEGIN banque &&  rib -->
                        <div class="form-row">
                            <!-- BEGIN banque -->
                            <div class="form-group col-md-6">
                                <label for="banque_ajax">Banque :</label>
                                <div class="input-group">
                                    <input type="text" value="{{old('banque_ajax')}}"  id="banque_ajax" name="banque_ajax"  class="form-control" placeholder="Banque"/>
                                </div>
                            </div>
                            <!-- END banque -->
                            <!-- BEGIN rib -->
                            <div class="form-group col-md-6">
                                <label for="rib_ajax">Relevé d'Identité Bancaire (RIB) :</label>
                                <div class="input-group">
                                    <input type="text" value="{{old('rib_ajax')}}"  id="rib_ajax" name="rib_ajax"  class="form-control" placeholder="RIB"/>
                                </div>
                            </div>
                            <!-- END rib -->
                        </div>
                        <!-- END banque &&  rib -->
                        <!-- BEGIN note -->
                        <div class="form-group">
                            <label for="note_ajax">Note :</label>
                            <textarea id="note_ajax" name="note_ajax" class="form-control" rows="3" cols="3" >{{old('note_ajax')}}</textarea>
                        </div>
                        <!-- END note -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="btnView" class="btn btn-success" onclick="myform(event)">Suivant</button>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-primary" name="sendFournisseur" id="sendFournisseur" disabled>Valider</button>
                <script type="text/javascript">
                    // -------------------------------------------------------------------- //
                    $(document).on('keyup','input[name=nom_fournisseur_ajax]',function(){
                        var nom_fournisseur_ajax = $('input[name=nom_fournisseur_ajax]').val();
                        var btn = $('button[name=sendFournisseur]');
                        (!nom_fournisseur_ajax && nom_fournisseur_ajax=='') ? btn.prop('disabled',true):btn.prop('disabled',false) ;
                    })
                    function myform(e){
                        e.preventDefault();
                        view1 = $('#form1').data('view');
                        view2 = $('#form2').data('view');
                        if(view1 == 'on' && view2 == 'off'){
                            $('#btnView').html('Retour');
                            $('#form1').prop('style','display : none');
                            $('#form2').prop('style','display : content');
                            $('#form1').data('view','off');
                            $('#form2').data('view','on');
                        }
                        else if(view2 == 'on' && view1 == 'off'){
                            $('#btnView').html('Suivant');
                            $('#form2').prop('style','display : none');
                            $('#form1').prop('style','display : content');
                            $('#form1').data('view','on');
                            $('#form2').data('view','off');
                        }
                    }
                    // -------------------------------------------------------------------- //
                    $(document).on('click','#sendFournisseur',function(e){ 
                        var data = {
                            _token : $('input[name=_token]').val(),
                            nom_fournisseur_ajax : $('#nom_fournisseur_ajax').val(),
                            adresse_ajax : $('#adresse_ajax').val(),
                            code_postal_ajax : $('#code_postal_ajax').val(),
                            ville_ajax : $('#ville_ajax').val(),
                            pays_ajax : $('#pays_ajax').val(),
                            tel_ajax : $('#tel_ajax').val(),
                            site_ajax : $('#site_ajax').val(),
                            email_ajax : $('#email_ajax').val(),
                            iff_ajax : $('#iff_ajax').val(),
                            ice_ajax : $('#ice_ajax').val(),
                            capital_ajax : $('#capital_ajax').val(),
                            rc_ajax : $('#rc_ajax').val(),
                            patente_ajax : $('#patente_ajax').val(),
                            cnss_ajax : $('#cnss_ajax').val(),
                            banque_ajax : $('#banque_ajax').val(),
                            rib_ajax : $('#rib_ajax').val(),
                            note_ajax : $('#note_ajax').val(),
                        }
                        var url = "{{Route('modal.store_fournisseur_ajax')}}";
                        var modal = 'fournisseurModal';
                        var erreur = "Erreur d'enregistrement du fournisseur !";
                        var obj = {
                            url : "{{Route('modal.get_fournisseur_ajax')}}",
                            name : 'fournisseur',
                            params : {
                                key0 : '-- Fournisseurs --',
                                key1 : 'id',
                                key2 : 'code',
                                key3 : 'nom_fournisseur',
                            }
                        }
                        store_ajax(data,url,modal,erreur,obj);
                        $('#nom_fournisseur_ajax').val('');
                        $('#adresse_ajax').val('');
                        $('#code_postal_ajax').val('');
                        $('#ville_ajax').val('');
                        $('#pays_ajax').val('');
                        $('#tel_ajax').val('');
                        $('#site_ajax').val('');
                        $('#email_ajax').val('');
                        $('#iff_ajax').val('');
                        $('#ice_ajax').val('');
                        $('#capital_ajax').val('');
                        $('#rc_ajax').val('');
                        $('#patente_ajax').val('');
                        $('#cnss_ajax').val('');
                        $('#banque_ajax').val('');
                        $('#rib_ajax').val('');
                        $('#note_ajax').val('');
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