@extends('layout.dashboard')
@section('contenu')
<?php
    use function App\Providers\hasPermssion;
?>
<!-- ##################################################################### -->
<!-- Content Header (Page header) -->
<div class="content-header sty-one">
  <h1>Panneau des achats</h1>
  <ol class="breadcrumb">
      <li><a href="{{route('app.home')}}">Home</a></li>
      <li><i class="fa fa-angle-right"></i> Achats</li>
  </ol>
</div>
{{-- ################## --}}
<div class="container">
  <br>
  <div class="row">
    <div class="col text-left">
      @if(hasPermssion('create5_2') == 'yes') 
      <a id="create" href="{{route('payement.create2')}}" class="btn btn-primary m-b-10 ">
        <i class="fa fa-plus"></i>&nbsp;Règlements
      </a>
      @endif
    </div>
    <div class="col text-right">
      @if(hasPermssion('create4_2') == 'yes') 
      <a href="{{route('demande.create')}}" class="btn btn-primary m-b-10 ">
        <i class="fa fa-plus"></i>&nbsp;Achat
      </a>
      @endif
    </div>
  </div>
  <br>
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-4">
      <label for="date1">Date de début :</label>
      <input type="date" class="form-control" name="date1" id="date1" placeholder="date1" value={{$dateFrom}}>
      </div> 
      <div class="col-sm-4">
      <label for="date2">Date de fin : </label>
      <input type="date" class="form-control" name="date2" id="date2" placeholder="date2" value={{$date}}>
      </div> 
      <div class="col-sm-2"></div>
    </div>
    <br>
    <div class="row">
      <div class="col-4">
        {{-- <select class="form-control" name="fournisseur" id="fournisseur">
        <option value="">--La liste des fournisseurs--</option>
          @foreach($fournisseurs as $fournisseur)
          <option value="{{$fournisseur->id }}">{{ $fournisseur->nom_fournisseur}}</option>
          @endforeach
        </select> --}}
        <select class="form-control selectpicker show-tick" 
          id="fournisseur" 
          data-style="text-black bg-white border border-dark" 
          name="fournisseur" 
          data-live-search="true" 
          data-size="5" 
          title="-- Fournisseurs --" 
          data-header="Choisir un fournisseur"> 
          <option value="">-- Fournisseurs --</option>
          {{-- ------------------------------ --}}
          <option data-divider="true"></option>
          {{-- ------------------------------ --}}
          @foreach($fournisseurs as $fournisseur)
              <option value="{{$fournisseur->id}}" data-subtext="{{$fournisseur->code}}" @if ($fournisseur->id == old('fournisseur')) selected="selected" @endif> {{ $fournisseur->nom_fournisseur}}</option>
          @endforeach
        </select>
      </div>
      <div class="col-4">
        <div class="row">
          <div class="col-6">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="f" id="f" value="f" checked>
              <label for="f">Facturée</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="nf" id="nf" value="nf" checked>
                <label for="nf">Non facturée</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="r" id="r" value="r" checked>
              <label for="r">Réglée</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="nr" id="nr" value="nr" checked>
              <label for="nr">Non réglée</label>
            </div>
          </div>
        </div>
      </div>
      <div class="col-4">
        <input type="text" class="form-control" name="search" id="search" placeholder="chercher ..">
      </div>
    </div>
</div>
<!-- ####################### -->
<!-- Main content -->
<div class="content">
  <!-- Main card -->
  <div class="card">
      <div class="card-body">
          <div id="demandes_data">
              @include('managements.demandes.index_data')
          </div>
      </div>
  </div>
</div>
<!-- ####################### -->
<!-- ---------  BEGIN SCRIPT --------- -->
@include('managements.demandes.script_demande')
{{-- {!! Html::script( asset('js/cmd.js')) !!}  --}}
{{-- <script src="{{asset('js/index_commande.js')}}"></script> --}}
<!-- ##################################################################### -->
@endsection