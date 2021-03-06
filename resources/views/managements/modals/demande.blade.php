<!-- BEGIN Modal -->
<div class="modal fade" id="{{$demande_id}}demandeModal" tabindex="-1" role="dialog" aria-labelledby="demandeModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
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
                                    @foreach($demande->lignedemande as $ligne)
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
                                          <th>{{number_format($demande->total,2, '.', '')}}</th>
                                        </tr>
                                      </tfoot>
                                </table>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- End LigneDemande  -->
                    <br>
                    <!-- Begin Payement  -->
                    <div class="card text-left">
                        <div class="card-body">
                            <div class="card-text">
                                <div class="form-row">
                                    <div class="col">
                                    <label>Date de paiement</label>
                                    </div>
                                    <div class="col">
                                    <label>Mode de paiement</label>
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
                                <div id="payements">
                                    @foreach($demande->payements as $payement)
                                        @php
                                        ($payement->avance>0) ? $style="" : $style = "display: none;"; 
                                        @endphp
                                        <div style="@php echo $style; @endphp">
                                        <div class="form-row">
                                            <div class="col">
                                            <input type="text" class="form-control" name="reg_date" placeholder="reg_date" value="{{$payement->date}}" disabled>
                                            </div>
                                            <div class="col">
                                            <input type="text" class="form-control" name="mode" placeholder="mode" value="{{$payement->mode_payement}}" disabled>
                                            </div>
                                            <div class="col">
                                            <input type="text" class="form-control" name="avance" placeholder="avance" value="{{$payement->avance}}" disabled>
                                            </div>
                                            <div class="col">
                                            <input type="text" class="form-control" name="reste"  placeholder="reste" value="{{$payement->reste}}" disabled>
                                            </div>
                                            <div class="col-1">
                                            <input type="text" class="form-control" name="status"  placeholder="status" value="{{$payement->status}}" disabled>
                                            </div>
                                        </div>
                                        <br>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>  
                    <!-- End Payement  -->
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