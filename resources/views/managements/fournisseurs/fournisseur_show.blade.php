<div class="table-responsive">
    {{$demandes->links()}}
    <table class="table" id="table_fournisseur">
        <thead class="bg-primary text-white">
            <tr>
                <th>Rèf</th>
                <th>Date</th>
                <th>Facture</th>
                <th>Total</th>
                <th>Avance</th>
                <th>Reste</th>
            </tr>
        </thead>
        <tbody>
            @foreach($demandes as $key=>$demande)
                @php
                $facture = '';
                if($demande->facture) $facture = $demande->facture;
                @endphp
                <tr>
                    <td>
                        <a href="#"
                        id="link{{$key}}" 
                        data-toggle="modal" 
                        data-target="#id{{$key}}demandeModal" 
                        style="cursor: pointer !important;">
                        {{$demande->code}}
                        </a>
                        <!-- BEGIN Modal -->
                        @include("managements.modals.demande",['demande_id' => 'id'.$key,'demande' => $demande,'key'=>$key])
                        <!-- END Modal -->
                    </td>
                    <td>{{$demande->date}}</td>
                    <td>{{$facture}}</td>
                    <td>{{number_format($demande->total,2, '.', '')}}</td>
                    <td>{{number_format($demande->avance,2, '.', '')}}</td>
                    <td>{{number_format($demande->reste,2, '.', '')}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>