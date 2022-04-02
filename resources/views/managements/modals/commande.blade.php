<!-- BEGIN Modal -->
<div class="modal fade" id="{{$commande_id}}commandeModal" tabindex="-1" role="dialog" aria-labelledby="commandeModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>{{$commande->code}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"> 
                {{-- ##################################################################### --}}
                <div class="card-body">
                    <!-- Begin Lignecommande  -->
                    <div class="card text-left">
                        <div class="card-body">
                        <h5 class="card-title">Les Lignes des ventes : </h5>
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
                                    @foreach($commande->lignecommande as $ligne)
                                    <tbody>
                                        <tr>
                                            <td>
                                                <abbr title="{{$ligne->produit->code_produit}}">{{$ligne->produit->nom_produit}}</abbr>
                                                {{-- <details>
                                                    <summary>{{$ligne->produit->code_produit}}</summary>
                                                    <p>{{substr($ligne->produit->nom_produit,0,15)}}...</p>
                                                </details> --}}
                                            </td>
                                            {{-- {{$ligne->produit->code_produit}} --}}
                                            {{-- | {{substr($ligne->produit->nom_produit,0,15)}}... --}}
                                            <td>{{number_format($ligne->prix,2, '.', '')}}</td>
                                            <td>{{$ligne->quantite}}</td>
                                            <td>{{number_format($ligne->total_produit,2, '.', '')}}</td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                    <tfoot>
                                        <tr>
                                          <th class="text-right" colspan="3">Total à payer : </th>
                                          <th>{{number_format($commande->total,2, '.', '')}}</th>
                                        </tr>
                                      </tfoot>
                                </table>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- End Lignecommande  -->
                    <br>
                    <!-- Begin Reglement  -->
                    <div class="card text-left">
                        <div class="card-body">
                            <div class="card-text">
                            <div class="form-row">
                                <div class="col">
                                <label>Date de règlement</label>
                                </div>
                                <div class="col">
                                <label>Mode de règlement</label>
                                </div>
                                <div class="col">
                                <label>Montant payer</label>
                                </div>
                                <div class="col">
                                <label>Reste à payer</label>
                                </div>
                                <div class="col-1">
                                <label>Status</label>
                                </div>
                            </div>
                            <div id="reglements">
                            @foreach($commande->reglements as $reglement)
                                @php
                                ($reglement->avance>0) ? $style="" : $style = "display: none;"; 
                                @endphp
                                <div style="@php echo $style; @endphp">
                                <div class="form-row">
                                    <div class="col">
                                    <input type="text" class="form-control" name="reg_date" placeholder="reg_date" value="{{$reglement->date}}" disabled>
                                    </div>
                                    <div class="col">
                                    <input type="text" class="form-control" name="mode" placeholder="mode" value="{{$reglement->mode_reglement}}" disabled>
                                    </div>
                                    <div class="col">
                                    <input type="text" class="form-control" name="avance" placeholder="avance" value="{{$reglement->avance}}" disabled>
                                    </div>
                                    <div class="col">
                                    <input type="text" class="form-control" name="reste"  placeholder="reste" value="{{$reglement->reste}}" disabled>
                                    </div>
                                    <div class="col-1">
                                    <input type="text" class="form-control" name="status"  placeholder="status" value="{{$reglement->status}}" disabled>
                                    </div>
                                </div>
                                <br>
                                </div>
                            @endforeach
                            </div>
                            </div>
                        </div>
                    </div>  
                    <!-- End Reglement  -->
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
<!-- END Modal -->