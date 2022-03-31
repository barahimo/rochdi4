<!-- BEGIN Modal -->
<div class="modal fade" id="{{$demande_id}}demandeModal" tabindex="-1" role="dialog" aria-labelledby="demandeModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>{{$demande->code}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"> 
                {{-- ##################################################################### --}}
                <div class="card-body">
                    <button onclick="getLigne({{getLignes('{{$demande_id}}')}})">test</button>
                    <!-- Begin LigneDemande  -->
                    <div class="card text-left">
                        <div class="card-body">
                        <h5 class="card-title">Les Lignes des achats : </h5>
                        <div class="card-text">
                            <div class="table-responsive">
                            <table class="table" id="lignes">
                                <thead class="bg-primary text-white">
                                <tr>
                                    <th>Libelle</th>
                                    <th>Prix</th>
                                    <th>Qté</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- End LigneDemande  -->
                    <br>
                </div>
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
    $(document).ready(function(){
        // getLignes('{{$demande_id}}');
    });
    function getLignes(id){
    var cmd_id = id;
    console.log('id : '+id);
    return;
    $.ajax({
        type:'get',
        url:"{!!Route('demande.editDemande')!!}",
        data:{'id' : cmd_id},
        success: function(data){
          var lignedemandes = data.lignedemandes;
          // -----------BEGIN lignes--------------//
          var table = $('#lignes');
          table.find('tbody').html("");
          var lignes = '';
          lignedemandes.forEach(ligne => {
            lignes+=`<tr>
                    <td>${ligne.produit.code_produit} | ${ligne.produit.nom_produit.substring(0,15)}...</td>
                    <td>${parseFloat(ligne.prix).toFixed(2)}</td>
                    <td>${ligne.quantite}</td>
                    <td>${parseFloat(ligne.total_produit).toFixed(2)}</td>
                  </tr>`;
          });
          table.find('tbody').append(lignes);
          // -----------END lignes--------------//
          // -----------BEGIN payement--------------//
        } ,
        error:function(err){
            message('error','',err);
        },
      });
      
      function message(icon,title,text){
            Swal.fire({
            title: title,
            text: text,
            icon: icon,
            showCancelButton: false,
            showConfirmButton : true,
            confirmButtonColor: '#007BFF',
            });
        }
  }
</script>
<!-- END Modal -->