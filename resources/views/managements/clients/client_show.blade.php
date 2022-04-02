<div class="table-responsive">
    {{$commandes->links()}}
    <table class="table" id="table_client">
        <thead class="bg-primary text-white">
            <tr>
                <th>Rèf</th>
                <th>Date</th>
                <th>Total</th>
                <th>Avance</th>
                <th>Reste</th>
                <th>Mesure</th>
            </tr>
        </thead>
        <tbody>
            @foreach($commandes as $key=>$commande)
                <tr>
                    <td>
                        <a href="#"
                        id="link{{$key}}" 
                        data-toggle="modal" 
                        data-target="#id{{$key}}commandeModal" 
                        style="cursor: pointer !important;">
                        {{$commande->code}}
                        </a>
                        <!-- BEGIN Modal -->
                        @include("managements.modals.commande",['commande_id' => 'id'.$key,'commande' => $commande,'key'=>$key])
                        <!-- END Modal -->
                    </td>
                    <td>{{$commande->date}}</td>
                    <td>{{number_format($commande->total,2, '.', '')}}</td>
                    <td>{{number_format($commande->avance,2, '.', '')}}</td>
                    <td>{{number_format($commande->reste,2, '.', '')}}</td>
                    <td>
                        <a href="#" 
                            data-toggle="modal" 
                            data-target="#id{{$key}}mesureModal" 
                            style="cursor: pointer !important;">
                            <i class="fas fa-eye fa-1x" style="cursor: pointer;"></i>
                        </a>
                        <!-- BEGIN Modal -->
                        @include("managements.modals.mesure",['mesure_id' => 'id'.$key,'commande' => $commande])
                        <!-- END Modal -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>