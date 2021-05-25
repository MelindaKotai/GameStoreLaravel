@extends('layouts.app')

@section('title', 'DetaliiProdus')
@section('content')
@if(!isset($produs) && !isset($categorie))
<div class="container pt-5 pb-4 text-center " style="min-height: 55vh;">
<p class="alert alert-danger">Nu exista acest produs </p>
</div>
@endif
@if(isset($produs) && isset($categorie))
<div class="container pt-5 pb-4 text-center " style="min-height: 80vh;">
     @if(session('success'))
      <div class='alert alert-success'>{{ session('success') }}</div>
     @endif
      <div class="row" style="background-color: white;border-radius: 10px;">
          <div class="col-md-7" style="overflow:hidden;" >
            <img src="{{ URL::to('/') }}/{{$produs->img}}" height="500px" class="productpageimg">
          </div>

          <div class="col-md-5 pt-5 pl-3 pr-3 pb-3 text-center">
            <h2 style="border-bottom: 1px solid red;">{{$produs->denumire}}</h2>

            <b><h4 class="pt-3">Pret:{{$produs->pret}} lei</h4></b>

            <p class="pt-2 pl-2 pr-2"><b>Durata de livrare:</b> Livrare in 24 de ore pentru comenzile plasate pana in ora 16.00 in zilele lucratoare</p>

            <div class="mb-3" style="overflow: scroll;height:120px;border:1px solid black;border-radius: 3px">
               {{$produs->descriere}}            
           </div>

            <p class="mr-5" style="display: inline" >Numar jucatori: {{$produs->nr_min_jucatori}}-{{$produs->nr_max_jucatori}}</p>
           
            <p style="display: inline">Categorie: {{$categorie->nume}}</p>


    <!-- se afiseaza doar la clienti -->
      <div class="d-flex justify-content-center">
        
      		@auth
            @if(Auth::user()->rol=='client')
        <form action="/add-to-cart" method="GET">
          <label for="cantitate">Cantitate:</label>
          <input type="number" name="cantitate" class="form-control ml-5 mt-4 mr-2 mb-2" style="width:150px;display: inline;" min="1" value="1">

          <input type="hidden" name="id_produs" value="{{$produs->id}}" >
          

            
                 <button type='submit' class='btn btn-danger' style='display:block;width:400px'>Cumpara</button>
                 </form>
            @endif
            @else
            	 <form action="" method="GET">
          <label for="cantitate">Cantitate:</label>
          <input type="number" name="cantitate" class="form-control ml-5 mt-4 mr-2 mb-2" style="width:150px;display: inline;" min="1" value="1">

          <input type="hidden" name="id_produs" value="{{$produs->id}}" >
          <input type="hidden" name="action" value="add">

                 <a href='/login' class='btn btn-danger'>Cumpara</a>
                 </form>
            @endauth
            	
            @auth
            @if(Auth::user()->rol=='admin')
          <div class="d-flex flex-column">
            <p clas="p-2" style="font-size: 30px;width: 100%;"><b> Sunteti sigur ca doriti sa stergeti produsul selectat? </b></p>
            
            
          <div class="p-2">
            
            	<form method="post" action="/Delete/{!! $produs->id !!}"> 
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mb-2" style="display:block;width:400px">Da</button>
              </form>
            
           
          </div>
          <div class="p-2">
          <a href="/produse" class="btn btn-danger" style="display:block;width:400px">
          Nu
          </a>
          </div>
      </div>
        
       	   @endif
       	   @endauth
     



          </div>
      </div>

      @endif
 </div>



@endsection