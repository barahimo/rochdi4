<!-- BEGIN Modal -->
<div class="modal fade" id="{{$mesure_id}}mesureModal" tabindex="-1" role="dialog" aria-labelledby="mesureModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>{{$commande->code}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"> 
                {{-- ##################################################################### --}}
                <!-- Begin Mesure_Client  -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                        <div class="card text-black">
                            <div class="card-header bg-primary text-white text-center" style="height: 40px;">
                            <div class="card-title">
                                <h6 class="font-weight-bold"  onclick="eventLoin('{{$mesure_id}}')" style="cursor: pointer !important;">Vision de loin <i class="fas fa-arrow-down" id="{{$mesure_id}}icon_loin"></i></h6>
                            </div>
                            </div>
                            <div class="card-body" id="{{$mesure_id}}div_loin" style="display: none;">
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset style="border: 1px groove #ddd !important;padding: 0 1.4em 1.4em 1.4em !important;margin: 0 0 1.5em 0 !important;-webkit-box-shadow:  0px 0px 0px 0px #000;box-shadow:  0px 0px 0px 0px #000;">
                                    <legend style="font-size: 1em !important; color : #007BFF !important;text-align: left !important;">
                                        <span><i class="fas fa-eye fa-1x">&nbsp;Gauche</i></span>
                                    </legend>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                        <label for="sphere_gauche_loin">Sphère : </label>
                                        <input type="text" class="form-control" name="sphere_gauche_loin" id="{{$mesure_id}}sphere_gauche_loin" placeholder="Sphère" value="{{old('sphere_gauche_loin',json_decode($commande->vision_loin,false)->sphere_gauche_loin ?? null)}}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                        <label for="cylindre_gauche_loin">Cylindre : </label>
                                        <input type="text" class="form-control" name="cylindre_gauche_loin" id="{{$mesure_id}}cylindre_gauche_loin" placeholder="Cylindre" value="{{old('cylindre_gauche_loin',json_decode($commande->vision_loin,false)->cylindre_gauche_loin ?? null)}}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                        <label for="axe_gauche_loin">Axe : </label>
                                        <input type="text" class="form-control" name="axe_gauche_loin" id="{{$mesure_id}}axe_gauche_loin" placeholder="Axe" value="{{old('axe_gauche_loin',json_decode($commande->vision_loin,false)->axe_gauche_loin ?? null)}}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                        <label for="lentille_gauche_loin">Lentille : </label>
                                        <input type="text" class="form-control" name="lentille_gauche_loin" id="{{$mesure_id}}lentille_gauche_loin" placeholder="Lentille" value="{{old('lentille_gauche_loin',json_decode($commande->vision_loin,false)->lentille_gauche_loin ?? null)}}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                        <label for="eip_gauche_loin">Eip : </label>
                                        <input type="text" class="form-control" name="eip_gauche_loin" id="{{$mesure_id}}eip_gauche_loin" placeholder="Eip" value="{{old('eip_gauche_loin',json_decode($commande->vision_loin,false)->eip_gauche_loin ?? null)}}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                        <label for="hauteur_gauche_loin">Hauteur : </label>
                                        <input type="text" class="form-control" name="hauteur_gauche_loin" id="{{$mesure_id}}hauteur_gauche_loin" placeholder="Hauteur" value="{{old('hauteur_gauche_loin',json_decode($commande->vision_loin,false)->hauteur_gauche_loin ?? null)}}" disabled>
                                        </div>
                                    </div>
                                    </fieldset>
                                </div>
                                <div class="col-md-12">
                                    <fieldset style="border: 1px groove #ddd !important;padding: 0 1.4em 1.4em 1.4em !important;margin: 0 0 1.5em 0 !important;-webkit-box-shadow:  0px 0px 0px 0px #000;box-shadow:  0px 0px 0px 0px #000;">
                                    <legend style="font-size: 1em !important; color : #007BFF !important;text-align: left !important;">
                                        <span><i class="fas fa-eye fa-1x">&nbsp;Droite</i></span>
                                    </legend>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                        <label for="sphere_droite_loin">Sphère : </label>
                                        <input type="text" class="form-control" name="sphere_droite_loin" id="{{$mesure_id}}sphere_droite_loin" placeholder="Sphère" value="{{old('sphere_droite_loin',json_decode($commande->vision_loin,false)->sphere_droite_loin ?? null)}}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                        <label for="cylindre_droite_loin">Cylindre : </label>
                                        <input type="text" class="form-control" name="cylindre_droite_loin" id="{{$mesure_id}}cylindre_droite_loin" placeholder="Cylindre" value="{{old('cylindre_droite_loin',json_decode($commande->vision_loin,false)->cylindre_droite_loin ?? null)}}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                        <label for="axe_droite_loin">Axe : </label>
                                        <input type="text" class="form-control" name="axe_droite_loin" id="{{$mesure_id}}axe_droite_loin" placeholder="Axe" value="{{old('axe_droite_loin',json_decode($commande->vision_loin,false)->axe_droite_loin ?? null)}}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                        <label for="lentille_droite_loin">Lentille : </label>
                                        <input type="text" class="form-control" name="lentille_droite_loin" id="{{$mesure_id}}lentille_droite_loin" placeholder="Lentille" value="{{old('lentille_droite_loin',json_decode($commande->vision_loin,false)->lentille_droite_loin ?? null)}}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                        <label for="eip_droite_loin">Eip : </label>
                                        <input type="text" class="form-control" name="eip_droite_loin" id="{{$mesure_id}}eip_droite_loin" placeholder="Eip" value="{{old('eip_droite_loin',json_decode($commande->vision_loin,false)->eip_droite_loin ?? null)}}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                        <label for="hauteur_droite_loin">Hauteur : </label>
                                        <input type="text" class="form-control" name="hauteur_droite_loin" id="{{$mesure_id}}hauteur_droite_loin" placeholder="Hauteur" value="{{old('hauteur_droite_loin',json_decode($commande->vision_loin,false)->hauteur_droite_loin ?? null)}}" disabled>
                                        </div>
                                    </div>
                                    </fieldset>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white text-center" style="height: 40px;">
                            <h6 class="font-weight-bold"  onclick="eventPres('{{$mesure_id}}')" style="cursor: pointer !important;">Vision de près <i class="fas fa-arrow-down" id="{{$mesure_id}}icon_pres"></i></h6>
                            </div>
                            <div class="card-body" id="{{$mesure_id}}div_pres" style="display: none;">
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset style="border: 1px groove #ddd !important;padding: 0 1.4em 1.4em 1.4em !important;margin: 0 0 1.5em 0 !important;-webkit-box-shadow:  0px 0px 0px 0px #000;box-shadow:  0px 0px 0px 0px #000;">
                                    <legend style="font-size: 1em !important; color : #007BFF !important;text-align: left !important;">
                                        <span><i class="fas fa-eye fa-1x">&nbsp;Gauche</i></span>
                                    </legend>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                        <label for="sphere_gauche_pres">Sphère : </label>
                                        <input type="text" class="form-control" name="sphere_gauche_pres" id="{{$mesure_id}}sphere_gauche_pres" placeholder="Sphère" value="{{old('sphere_gauche_pres',json_decode($commande->vision_pres,false)->sphere_gauche_pres ?? null)}}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                        <label for="cylindre_gauche_pres">Cylindre : </label>
                                        <input type="text" class="form-control" name="cylindre_gauche_pres" id="{{$mesure_id}}cylindre_gauche_pres" placeholder="Cylindre" value="{{old('cylindre_gauche_pres',json_decode($commande->vision_pres,false)->cylindre_gauche_pres ?? null)}}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                        <label for="axe_gauche_pres">Axe : </label>
                                        <input type="text" class="form-control" name="axe_gauche_pres" id="{{$mesure_id}}axe_gauche_pres" placeholder="Axe" value="{{old('axe_gauche_pres',json_decode($commande->vision_pres,false)->axe_gauche_pres ?? null)}}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                        <label for="lentille_gauche_pres">Lentille : </label>
                                        <input type="text" class="form-control" name="lentille_gauche_pres" id="{{$mesure_id}}lentille_gauche_pres" placeholder="Lentille" value="{{old('lentille_gauche_pres',json_decode($commande->vision_pres,false)->lentille_gauche_pres ?? null)}}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                        <label for="dreip_gauche_pres">Eip : </label>
                                        <input type="text" class="form-control" name="eip_gauche_pres" id="{{$mesure_id}}eip_gauche_pres" placeholder="Eip" value="{{old('eip_gauche_pres',json_decode($commande->vision_pres,false)->eip_gauche_pres ?? null)}}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                        <label for="hauteur_gauche_pres">Hauteur : </label>
                                        <input type="text" class="form-control" name="hauteur_gauche_pres" id="{{$mesure_id}}hauteur_gauche_pres" placeholder="Hauteur" value="{{old('hauteur_gauche_pres',json_decode($commande->vision_pres,false)->hauteur_gauche_pres ?? null)}}" disabled>
                                        </div>
                                    </div>
                                    </fieldset>
                                </div>
                                <div class="col-md-12">
                                    <fieldset style="border: 1px groove #ddd !important;padding: 0 1.4em 1.4em 1.4em !important;margin: 0 0 1.5em 0 !important;-webkit-box-shadow:  0px 0px 0px 0px #000;box-shadow:  0px 0px 0px 0px #000;">
                                    <legend style="font-size: 1em !important; color : #007BFF !important;text-align: left !important;">
                                        <span><i class="fas fa-eye fa-1x">&nbsp;Droite</i></span>
                                    </legend>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                        <label for="sphere_droite_pres">Sphère : </label>
                                        <input type="text" class="form-control" name="sphere_droite_pres" id="{{$mesure_id}}sphere_droite_pres" placeholder="Sphère" value="{{old('sphere_droite_pres',json_decode($commande->vision_pres,false)->sphere_droite_pres ?? null)}}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                        <label for="cylindre_droite_pres">Cylindre : </label>
                                        <input type="text" class="form-control" name="cylindre_droite_pres" id="{{$mesure_id}}cylindre_droite_pres" placeholder="Cylindre" value="{{old('cylindre_droite_pres',json_decode($commande->vision_pres,false)->cylindre_droite_pres ?? null)}}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                        <label for="axe_droite_pres">Axe : </label>
                                        <input type="text" class="form-control" name="axe_droite_pres" id="{{$mesure_id}}axe_droite_pres" placeholder="Axe" value="{{old('axe_droite_pres',json_decode($commande->vision_pres,false)->axe_droite_pres ?? null)}}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                        <label for="lentille_droite_pres">Lentille : </label>
                                        <input type="text" class="form-control" name="lentille_droite_pres" id="{{$mesure_id}}lentille_droite_pres" placeholder="Lentille" value="{{old('lentille_droite_pres',json_decode($commande->vision_pres,false)->lentille_droite_pres ?? null)}}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                        <label for="eip_droite_pres">Eip : </label>
                                        <input type="text" class="form-control" name="eip_droite_pres" id="{{$mesure_id}}eip_droite_pres" placeholder="Eip" value="{{old('eip_droite_pres',json_decode($commande->vision_pres,false)->eip_droite_pres ?? null)}}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                        <label for="hauteur_droite_pres">Hauteur : </label>
                                        <input type="text" class="form-control" name="hauteur_droite_pres" id="{{$mesure_id}}hauteur_droite_pres" placeholder="Hauteur" value="{{old('hauteur_droite_pres',json_decode($commande->vision_pres,false)->hauteur_droite_pres ?? null)}}" disabled>
                                        </div>
                                    </div>
                                    </fieldset>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- End Mesure_Client  -->
                {{-- ##################################################################### --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Quitter</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    // -------------------------------------------------------------------- //
    var loin = true;
    var pres = true;
    function eventLoin(id){
        (loin) ? styleDiv = 'display : block' : styleDiv = 'display : none';  
        $('#'+id+'div_loin').attr('style',styleDiv);  
        (loin) ? iconClass = 'fas fa-arrow-up' : iconClass = 'fas fa-arrow-down';  
        $('#'+id+'icon_loin').attr('class',iconClass);  
        loin = !loin; 
    }
    function eventPres(id){
        (pres) ? styleDiv = 'display : block' : styleDiv = 'display : none';  
        $('#'+id+'div_pres').attr('style',styleDiv);  
        (pres) ? iconClass = 'fas fa-arrow-up' : iconClass = 'fas fa-arrow-down';  
        $('#'+id+'icon_pres').attr('class',iconClass);  
        pres = !pres; 
    }
</script>
<!-- END Modal -->