@extends('layout.dashboard')
@section('contenu')
<?php
    use function App\Providers\hasPermssion;
    use function App\Providers\get_base64;
?>
<!-- #########################################################" -->
{{ Html::style(asset('css/commandestyle.css')) }}
{{-- {{ Html::style(asset('css/pos80commandestyle2.css')) }} --}}

{{-- ################## --}}
<!-- Content Header (Page header) -->
<div class="content-header sty-one">
    <h1>Commande</h1>
    <ol class="breadcrumb">
        <li><a href="{{route('app.home')}}">Home</a></li>
        <li><i class="fa fa-angle-right"></i> Commande</li>
    </ol>
</div>
{{-- ################## --}}
<br>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="row" style="text-align : right">
                <div class="col-6 text-center">
                    <i class="fas fa-arrow-circle-left fa-3x" onclick="window.location.assign('{{route('commande.index')}}')"></i>
                </div>
                <br>
                <div class="col-6 text-center">
                    {{-- @if(in_array('print4',$permission) || Auth::user()->is_admin == 2) --}}
                    @if(hasPermssion('print4') == 'yes') 
                    <button onclick="onprint()" class="btn btn-outline-primary"><i class="fa fa-print"></i></button>
                    @endif
                </div>
            </div>
            <div id="content">
                <div class="align-center" style="display: flex;align-items: center;justify-content: center;">
                    <div class="card border border-white" style="margin-top:20px;">
                        <div class="card-body p-1">
                            <div id="contenu" class="text-black">
                                {{-- --------Begin Header----------- --}}
                                {{-- <div class="row"> --}}
                                    {{-- <div class="col"></div> --}}
                                    {{-- <div class="col-6 text-center"> --}}
                                        {{-- <div class="photo-gris text-center"> --}}
                                        <div class="text-center">
                                            <div id="divLogo1"  style="display: contents">
                                                @if($company && ($company->logo || $company->logo != null))
                                                <img src="{{Storage::url($company->logo ?? null)}}"  alt="logo" style="width:100px;height:100px" class="img-fluid">
                                                @else
                                                <img src="{{asset('images/image.png')}}" alt="Logo" style="width:120px">
                                                @endif
                                            </div>
                                            <div id="divLogo2"  style="display: none">
                                                <img id="imgLogo" src=""  alt="logo" style="width:80px;height:80px" class="img-fluid">
                                            </div>
                                        </div>
                                    {{-- </div> --}}
                                    {{-- <div class="col"></div> --}}
                                {{-- </div> --}}
                                {{-- <div class="row"> --}}
                                    {{-- <div class="col"></div> --}}
                                    {{-- <div class="col-6"> --}}
                                    <div style="font-size:8px">
                                        Code client: {{$commande->client->code}} <br>  
                                        Nom client : {{$commande->client->nom_client}} <br>
                                        Télèphone : {{$commande->client->telephone}} <br>  
                                        Adresse : {{$commande->client->adresse}} <br>  
                                        @php
                                            $time = strtotime($commande->date);
                                            $date = date('d/m/Y',$time);
                                        @endphp
                                        Date commande : {{$date}}<br> 
                                    </div>
                                    {{-- </div> --}}
                                    {{-- <div class="col "></div> --}}
                                {{-- </div> --}}
                                {{-- --------End Header----------- --}}
                                {{-- --------Begin table----------- --}}
                                {{-- <div class="row"> --}}
                                    {{-- <div class="col"></div> --}}
                                    {{-- <div class="col-6"> --}}
                                        <table cellspacing="0" cellpadding="0">
                                            <thead>
                                                <tr style="height:10px"></tr>
                                                <tr>
                                                    <th colspan="5" style="font-size:10px;text-align:center; background-color:rgb(235, 233, 233);">
                                                        @php
                                                        $list = explode("-",$commande->code);
                                                        $list1 = $list[1];
                                                        $list2 = $list[2];
                                                        $code = $list1.'-'.$list2;
                                                        @endphp
                                                        BON n° : {{$code}}
                                                    </th>
                                                </tr>
                                                <tr style="height:10px"></tr>
                                                {{-- <tr style="height:10px; font-size : 7px"> --}}
                                                <tr></tr>
                                                <tr style="height:10px; font-size:8px; display: none;">
                                                    <th colspan="5">
                                                        {{-- @if($commande->oeil_gauche)
                                                        Oeil gauche : {{$commande->oeil_gauche}} &nbsp;&nbsp;&nbsp; 
                                                        @endif
                                                        @if($commande->oeil_droite)
                                                        Oeil droite : {{$commande->oeil_droite}}
                                                        @endif --}}
                                                        <?php
                                                        $data_loin = $commande->vision_loin;
                                                        $data_pres = $commande->vision_pres;
                                                        ?>
                                                        <div class="vision_loin">
                                                            <table>
                                                                <thead class="headerVision">
                                                                    <tr>
                                                                        <th>Vision de Loin</th>
                                                                        <th>Gauche</th>
                                                                        <th>Droite</th>
                                                                    </tr>
                                                                </thead>
                                                                @if($data_loin)
                                                                <tbody class="headerVision">
                                                                    <tr>
                                                                        <th>Sphère</th>
                                                                        <th>
                                                                            @if(isset(json_decode($data_loin,false)->sphere_gauche_loin))
                                                                            {{json_decode($data_loin,false)->sphere_gauche_loin}}
                                                                            @endif
                                                                        </th>
                                                                        <th>
                                                                            @if(isset(json_decode($data_loin,false)->sphere_droite_loin))
                                                                            {{json_decode($data_loin,false)->sphere_droite_loin}}
                                                                            @endif
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Cylindre</th>
                                                                        <th>
                                                                            @if(isset(json_decode($data_loin,false)->cylindre_gauche_loin))
                                                                            {{json_decode($data_loin,false)->cylindre_gauche_loin}}
                                                                            @endif
                                                                        </th>
                                                                        <th>
                                                                            @if(isset(json_decode($data_loin,false)->cylindre_droite_loin))
                                                                            {{json_decode($data_loin,false)->cylindre_droite_loin}}
                                                                            @endif
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Axe</th>
                                                                        <th>
                                                                            @if(isset(json_decode($data_loin,false)->axe_gauche_loin))
                                                                            {{json_decode($data_loin,false)->axe_gauche_loin}}
                                                                            @endif
                                                                        </th>
                                                                        <th>
                                                                            @if(isset(json_decode($data_loin,false)->axe_droite_loin))
                                                                            {{json_decode($data_loin,false)->axe_droite_loin}}
                                                                            @endif
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Lentille</th>
                                                                        <th>
                                                                            @if(isset(json_decode($data_loin,false)->lentille_gauche_loin))
                                                                            {{json_decode($data_loin,false)->lentille_gauche_loin}}
                                                                            @endif
                                                                        </th>
                                                                        <th>
                                                                            @if(isset(json_decode($data_loin,false)->lentille_droite_loin))
                                                                            {{json_decode($data_loin,false)->lentille_droite_loin}}
                                                                            @endif
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Eip</th>
                                                                        <th>
                                                                            @if(isset(json_decode($data_loin,false)->eip_gauche_loin))
                                                                            {{json_decode($data_loin,false)->eip_gauche_loin}}
                                                                            @endif
                                                                        </th>
                                                                        <th>
                                                                            @if(isset(json_decode($data_loin,false)->eip_droite_loin))
                                                                            {{json_decode($data_loin,false)->eip_droite_loin}}
                                                                            @endif
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Hauteur</th>
                                                                        <th>
                                                                            @if(isset(json_decode($data_loin,false)->hauteur_gauche_loin))
                                                                            {{json_decode($data_loin,false)->hauteur_gauche_loin}}
                                                                            @endif
                                                                        </th>
                                                                        <th>
                                                                            @if(isset(json_decode($data_loin,false)->hauteur_droite_loin))
                                                                            {{json_decode($data_loin,false)->hauteur_droite_loin}}
                                                                            @endif
                                                                        </th>
                                                                    </tr>
                                                                </tbody>
                                                                @else
                                                                <tbody class="headerVision">
                                                                    <tr>
                                                                        <th>Sphère</th>
                                                                        <th></th>
                                                                        <th></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Cylindre</th>
                                                                        <th></th>
                                                                        <th></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Axe</th>
                                                                        <th></th>
                                                                        <th></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Lentille</th>
                                                                        <th></th>
                                                                        <th></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Eip</th>
                                                                        <th></th>
                                                                        <th></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Hauteur</th>
                                                                        <th></th>
                                                                        <th></th>
                                                                    </tr>
                                                                </tbody>
                                                                @endif
                                                            </table>
                                                        </div>
                                                        <br>
                                                        <div class="vision_pres">
                                                            <table>
                                                                <thead class="headerVision">
                                                                    <tr>
                                                                        <th>Vision de Près</th>
                                                                        <th>Gauche</th>
                                                                        <th>Droite</th>
                                                                    </tr>
                                                                </thead>
                                                                @if($data_pres)
                                                                <tbody class="headerVision">
                                                                    <tr>
                                                                        <th>Sphère</th>
                                                                        <th>
                                                                            @if(isset(json_decode($data_pres,false)->sphere_gauche_pres))
                                                                            {{json_decode($data_pres,false)->sphere_gauche_pres}}
                                                                            @endif
                                                                        </th>
                                                                        <th>
                                                                            @if(isset(json_decode($data_pres,false)->sphere_droite_pres))
                                                                            {{json_decode($data_pres,false)->sphere_droite_pres}}
                                                                            @endif
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Cylindre</th>
                                                                        <th>
                                                                            @if(isset(json_decode($data_pres,false)->cylindre_gauche_pres))
                                                                            {{json_decode($data_pres,false)->cylindre_gauche_pres}}
                                                                            @endif
                                                                        </th>
                                                                        <th>
                                                                            @if(isset(json_decode($data_pres,false)->cylindre_droite_pres))
                                                                            {{json_decode($data_pres,false)->cylindre_droite_pres}}
                                                                            @endif
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Axe</th>
                                                                        <th>
                                                                            @if(isset(json_decode($data_pres,false)->axe_gauche_pres))
                                                                            {{json_decode($data_pres,false)->axe_gauche_pres}}
                                                                            @endif
                                                                        </th>
                                                                        <th>
                                                                            @if(isset(json_decode($data_pres,false)->axe_droite_pres))
                                                                            {{json_decode($data_pres,false)->axe_droite_pres}}
                                                                            @endif
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Lentille</th>
                                                                        <th>
                                                                            @if(isset(json_decode($data_pres,false)->lentille_gauche_pres))
                                                                            {{json_decode($data_pres,false)->lentille_gauche_pres}}
                                                                            @endif
                                                                        </th>
                                                                        <th>
                                                                            @if(isset(json_decode($data_pres,false)->lentille_droite_pres))
                                                                            {{json_decode($data_pres,false)->lentille_droite_pres}}
                                                                            @endif
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Eip</th>
                                                                        <th>
                                                                            @if(isset(json_decode($data_pres,false)->eip_gauche_pres))
                                                                            {{json_decode($data_pres,false)->eip_gauche_pres}}
                                                                            @endif
                                                                        </th>
                                                                        <th>
                                                                            @if(isset(json_decode($data_pres,false)->eip_droite_pres))
                                                                            {{json_decode($data_pres,false)->eip_droite_pres}}
                                                                            @endif
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Hauteur</th>
                                                                        <th>
                                                                            @if(isset(json_decode($data_pres,false)->hauteur_gauche_pres))
                                                                            {{json_decode($data_pres,false)->hauteur_gauche_pres}}
                                                                            @endif
                                                                        </th>
                                                                        <th>
                                                                            @if(isset(json_decode($data_pres,false)->hauteur_droite_pres))
                                                                            {{json_decode($data_pres,false)->hauteur_droite_pres}}
                                                                            @endif
                                                                        </th>
                                                                    </tr>
                                                                </tbody>
                                                                @else
                                                                <tbody class="headerVision">
                                                                    <tr>
                                                                        <th>Sphère</th>
                                                                        <th></th>
                                                                        <th></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Cylindre</th>
                                                                        <th></th>
                                                                        <th></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Axe</th>
                                                                        <th></th>
                                                                        <th></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Lentille</th>
                                                                        <th></th>
                                                                        <th></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Eip</th>
                                                                        <th></th>
                                                                        <th></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Hauteur</th>
                                                                        <th></th>
                                                                        <th></th>
                                                                    </tr>
                                                                </tbody>
                                                                @endif
                                                            </table>
                                                        </div>
                                                    </th>
                                                </tr>
                                                {{-- <tr style="height:10px; font-size : 8px;"> --}}
                                                <tr style="height:10px; font-size:8px">
                                                    <th colspan="5" class="text-right">
                                                        Montants exprimés en Dirham
                                                    </th>
                                                </tr>
                                                <tr class="headerFacture">
                                                    {{-- <th style="width:10%" class="text-center">Réf.</th> --}}
                                                    {{-- <th style="width:50%" class="text-center">Désignation</th> --}}
                                                    <th style="width:60%" class="text-center">Désignation</th>
                                                    <th style="width:10%" class="text-center">Qté</th>
                                                    <th style="width:15%" class="text-center">PU</th>
                                                    <th style="width:15%" class="text-center">TOTAL</th>
                                                </tr>
                                            </thead>
                                            {{-- <tbody style="font-size : 8px"> --}}
                                            <tbody style="font-size:8px">
                                                @php 
                                                    $TTC = 0;
                                                @endphp
                                                @foreach($lignecommandes as $lignecommande)
                                                @php 
                                                    $prix_unit = $lignecommande->total_produit / $lignecommande->quantite;
                                                    $TTC += $lignecommande->total_produit;
                                                @endphp
                                                <tr class="bodyFacture">
                                                    {{-- <td style="width:10%" class="text-left">{{$lignecommande->produit->code_produit}}</td> --}}
                                                    {{-- <td style="width:50%" class="text-left">{{$lignecommande->produit->nom_produit}}</td> --}}
                                                    <td style="width:60%" class="text-left">{{$lignecommande->produit->nom_produit}}</td>
                                                    <td style="width:10%" class="text-center">{{$lignecommande->quantite}}</td>
                                                    <td style="width:15%" class="text-right">{{number_format($prix_unit,2, '.', '')}}</td>
                                                    <td style="width:15%" class="text-right">{{number_format($lignecommande->total_produit,2, '.', '')}}</td>
                                                </tr>
                                                @endforeach
                                                {{-- --------------------------- --}}
                                                {{-- <tr class="bodyFacture">
                                                    <td style="width:10%" class="text-left">code_produit</td>
                                                    <td style="width:50%" class="text-left">nom_produit</td>
                                                    <td style="width:10%" class="text-center">3</td>
                                                    <td style="width:15%" class="text-right">100</td>
                                                    <td style="width:15%" class="text-right">300</td>
                                                </tr> --}}
                                                {{-- <tr class="bodyFacture">
                                                    <td style="width:60%" class="text-left">nom_produit1</td>
                                                    <td style="width:10%" class="text-center">543</td>
                                                    <td style="width:15%" class="text-right">10098760</td>
                                                    <td style="width:15%" class="text-right">3000764</td>
                                                </tr> --}}
                                                <?php 
                                                    $msg = '';
                                                    for ($i=0; $i <5 ; $i++) {
                                                        $msg = $msg .'
                                                        <tr class="bodyFacture" style="display : none;">
                                                            <td style="width:60%" class="text-left">nom_produit</td>
                                                            <td style="width:10%" class="text-center">3</td>
                                                            <td style="width:15%" class="text-right">100</td>
                                                            <td style="width:15%" class="text-right">300</td>
                                                        </tr>';
                                                    }
                                                    echo $msg;
                                                ?>
                                                {{-- --------------------------- --}}
                                                <tr class="tbody_ligne" style="height:2px">
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr class="ttcFacture">
                                                    {{-- <td colspan="2" style="border-bottom: none !important"></td> --}}
                                                    <td colspan="1" style="border-bottom: none !important"></td>
                                                    <th colspan="2" class="text-right">NET A PAYER</th>
                                                    <th colspan="1" class="text-right">{{number_format($TTC,2, '.', '')}}</th>
                                                    {{-- <th colspan="1" class="text-right">156789.69</th> --}}
                                                </tr>
                                                <tr style="height:60px;"></tr>
                                                <tr>
                                                    {{-- <th></th> --}}
                                                    {{-- <th colspan="6"> --}}
                                                    <th colspan="4">
                                                        @php
                                                        // $TTC = 156789.69;
                                                        $numberToWords = new NumberToWords\NumberToWords();
                                                        $numberTransformer = $numberToWords->getNumberTransformer('fr');
                                                        // $numberWord1 = $numberTransformer->toWords(number_format($TTC,2, '.', '')); // outputs "five thousand one hundred twenty"
                                                        $currencyTransformer = $numberToWords->getCurrencyTransformer('fr');
                                                        // $numberWord2 = $currencyTransformer->toWords(number_format($TTC,2, '.', '')*100,'MAD'); // outputs "five thousand one hundred twenty"
                                                        // --------------------------------------------------------
                                                        $pow9 = pow(10,9);
                                                        $pow6 = pow(10,6);
                                                        $pow3 = pow(10,3);
                                                        // -----------------------------------------
                                                        $msg = '';
                                                        if($TTC>=$pow9){
                                                            $msg = $TTC;
                                                        }
                                                        else{
                                                            $million = intdiv($TTC , $pow6);
                                                            // $mille = intdiv(($TTC % $pow6) , $pow3);
                                                            $mille = intdiv(fmod($TTC , $pow6) , $pow3);
                                                            // $reste = ($TTC % $pow6) % $pow3;
                                                            $reste = fmod($TTC , $pow3);
                                                            if($million != 0){
                                                                $numberWord1 = $numberTransformer->toWords(number_format($million,2, '.', '')); // outputs "five thousand one hundred twenty"
                                                                $msg .= $numberWord1.' MILLION ';
                                                            }
                                                            if($mille != 0){
                                                                $numberWord1 = $numberTransformer->toWords(number_format($mille,2, '.', '')); // outputs "five thousand one hundred twenty"
                                                                $msg .= $numberWord1.' MILLE ';
                                                            }
                                                            $numberWord2 = $currencyTransformer->toWords(number_format($reste,2, '.', '')*100,'MAD'); // outputs "five thousand one hundred twenty"
                                                            $msg .= $numberWord2;
                                                        }
                                                        // --------------------------------------------------------
                                                        @endphp    
                                                        La somme de : {{strtoupper($msg)}} 
                                                    </th>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr style="height:60px"></tr>
                                                <tr style="height: 10px">
                                                    <td colspan="7" class="text-center" style="text-align:center; background-color:rgb(235, 233, 233)">
                                                        {!!$adresse!!}
                                                        {{-- Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ea qui similique, eum, adipisci dolorem quia assumenda rerum dicta nobis laudantium totam voluptate commodi quam aspernatur consequatur quo magni accusamus fugit ullam. Repudiandae sit doloribus, odit provident dolores tempore, culpa commodi a quisquam magnam maxime perspiciatis officia excepturi? Veritatis, reprehenderit labore? Magnam, ipsa minima reprehenderit, corporis repellat necessitatibus nam ea nesciunt harum dicta quas, nisi vitae quae placeat possimus pariatur accusamus? Officia earum, libero necessitatibus culpa ab temporibus iste. Consequatur eum saepe aliquid nisi quibusdam expedita vitae, adipisci quae maiores? Voluptatem natus officiis vel qui. Veniam repudiandae aspernatur nulla ab laborum! --}}
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    {{-- </div> --}}
                                    {{-- <div class="col"></div> --}}
                                {{-- </div> --}}
                                {{-- --------End table----------- --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #########################################################" -->
<div id="display" style="display : none">
    <div id="pdf" style="width: 700px"></div>
</div>
<!-- #########################################################" -->
<!-- #########################################################" -->
{{-- <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>  --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.1/html2canvas.min.js" integrity="sha512-Ki6BxhTDkeY2+bERO2RGKOGh6zvje2DxN3zPsNg4XhJGhkXiVXxIi1rkHUeZgZrf+5voBQJErceuCHtCCMuqTw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
<script src="{{ asset('js/jspdf.umd.min.js') }}"></script>
<script src="{{ asset('js/html2canvas.min.js') }}"></script>
<script type="application/javascript">
    function dimensionTBODY(){
        // var tbody = $('#display').find('#pdf').find('table').find('tbody');
        var tbody = $('#contenu').find('table').find('tbody');
        var height_tbody = tbody.outerHeight();
        // var lignes = tbody.find('tr');
        // tbody_ligne = lignes.eq(lignes.length - 6);
        // tbody_ligne.height(300-height_tbody);
        // $('#pdf').find('.tbody_ligne').height(300-height_tbody);
        $('#pdf').find('.tbody_ligne').height(500-height_tbody);
        // console.log('height_tbody : '+height_tbody);
        // var height_tbody = $('#display').find('table').find('tbody').outerHeight();
        // $('#display').find('.tbody_ligne').height(480-height_tbody);
        // var height_tbody = $('table').find('tbody').outerHeight();
        // $('.tbody_ligne').height(500-height_tbody);
        // console.log(document.getElementById('tr1').offsetHeight);
        // console.log(document.getElementById('tr2').offsetHeight);
    }
    function image(){
        //BEGIN CANVAS
        var canvas = document.createElement('canvas');
        var img = new Image();
        img.src = "<?php ($company && ($company->logo || $company->logo != null)) ? print ('\/storage\/'.$company->logo ?? null): print (asset('images\/image.png'));?>";
        canvas.width = img.width;
        canvas.height = img.height;
        var context = canvas.getContext('2d');
        context.drawImage(img, 0, 0);
        var dataURL = canvas.toDataURL('image/png'); //canvas.toDataURL('image/jpeg');
        var imgData = dataURL;
        var base64 = "{{get_base64()}}";
        if(imgData === 'data:,')
        imgData = base64;
        // doc.addImage(imgData, 'png',  10, 10, 20, 20); //doc.addImage(imgData, 'JPEG',  10, 10, 20, 20);
        $('#divLogo1').prop('style','display : none;');
        $('#divLogo2').prop('style','display : contents;');
        $('#imgLogo').prop('src',imgData);
    }
    function onprint(){
        // -------- declarartion des jsPDF and html2canvas ------------//
        window.html2canvas = html2canvas;
        window.jsPDF = window.jspdf.jsPDF;
        // -------- Change Style ------------//
        image();
        $('#pdf').html($('#content').html());
        // dimensionTBODY();
        // $('#pdf').prop('style','height: 700px;width: 500px;margin-left: auto;margin-right: auto;');
            // height: 800px;
            // width: 550px;
            // height: 780px;
            // width: 580px;
            //
            // font-size:23px;
            //
            // filter: grayscale(1);
            // -webkit-filter: grayscale(1);
        var style = `
            margin-left: auto;
            margin-right: auto;
            font-size:8px;
            font-family: Arial, Helvetica, sans-serif;
        `;
        $('#pdf').prop('style',style);
        // -------- Initialization de doc ------------//
        // var doc = new jsPDF("p", "pt", "a4",true);
        // var doc = new jsPDF("p", "pt", [80, contentHeight],true);
        var height_card_body = $('.card-body').outerHeight()+25;
        var doc = new jsPDF("p", "pt", [210, height_card_body],true);
        // -------- html to pdf ------------//
        // -------- Footer ------------//
        // -------------- //
        // var foot1 = `Siège social : --------------`;
        // var foot2 = `Téléphone : --------`;
        // var foot3 = `I.F. :--------`;
        // doc.setFontSize(10);//optional
        // var pageHeight = doc.internal.pageSize.height || doc.internal.pageSize.getHeight();
        // var pageWidth = doc.internal.pageSize.width || doc.internal.pageSize.getWidth();
        // -------------- //
        // doc.text(foot1, pageWidth / 2, pageHeight  - 50, {align: 'center'});
        // doc.text(foot2, pageWidth / 2, pageHeight  - 35, {align: 'center'});
        // doc.text(foot3, pageWidth / 2, pageHeight  - 20, {align: 'center'});
        // -------- Footer ------------//
        doc.html(document.querySelector("#pdf"), {
            callback: function (doc) {
                var code = "<?php echo $commande->code;?>";
                //--------------------------------------------//
                window.open(doc.output('bloburl'), '_blank');
                //--------------------------------------------//
                // window.open(doc.output('dataurlnewwindow'));
                //--------------------------------------------//
                // var blob = doc.output("blob");
                // window.open(URL.createObjectURL(blob));
                //--------------------------------------------//
                // var string = doc.output('datauristring');
                // var iframe = "<iframe width='100%' height='100%' src='" + string + "'></iframe>"
                // var x = window.open();
                // x.document.open();
                // x.document.write(iframe);
                // x.document.close();
                //--------------------------------------------//
                // window.open(doc.output('bloburl'),"_blank","top=100,left=200,width=1000,height=500");
                //--------------------------------------------//
                // doc.save(code+".pdf");
            },
            x: 0,
            y: 0,
        });
    }
</script>
@endsection