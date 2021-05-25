@extends('layouts.appsearch')
@section('title', 'Produse')
@section('content')
<div class="container pt-5 pb-4 text-center " style="min-height: 60vh;">
   
    @if(session('message'))
    <p class='alert alert-danger'>{!! session('message') !!}</p>
     @endif 

      <!-- filtrele -->
      <div class="productbox">

         <form style="display: inline;" class="ml-4" action="{{Route('produse')}}" method="get">
              <select  name="categorie" class="form-control ml-4" style="width:200px;display:inline;">
                    @if($categorii)
                    @foreach($categorii as $categorie)
                      <option value='{{$categorie->id}}'>Jocuri de {{$categorie->nume}}</option>
                    @endforeach
                    @endif
                
              </select>

              <span class="ml-3">Filtreaza dupa pret</span>
              <label for="min" class="ml-2">Min:</label>
              <input type="number" name="min" class="form-control ml-2 mr-2" style="width:80px;display: inline;" min="1">

              <label for="max" class="ml-2">Max:</label>
              <input type="number" name="max" class="form-control ml-2 mr-2" style="width:80px;display: inline;" min="1">

              <label for="nrjucatori" class="ml-2">Numar de jucatori:</label>
              <input type="number" name="nrjucatori" class="form-control ml-2 mr-2" style="width:60px;display: inline;" min="1">

              <button type="submit" class="btn btn-danger">Filtreaza</button>
        </form>
    </div>
    


    <div class="row">
         
          @foreach($produse as $produs) 

                   <div class='col-md-4 column'>
                   <div class='productbox' style='overflow:hidden;'>
          
             @auth
             @if(Auth::user()->rol=='admin')
              <img src='{{$produs->img}}' class='imgp'>
             @else
              <a  href='/DetaliiProdus/{{$produs->id}}'><img class='imgp' src='{{$produs->img}}'></a>
             @endif
             @endauth
             @guest
              <a  href='/DetaliiProdus/{{$produs->id}}'><img class='imgp' src='{{$produs->img}}'></a>
            @endguest
          
                <div class='producttitle'>{{$produs->denumire}}</div>
                <div class='productprice'>
          
             @auth
             @if(Auth::user()->rol=='admin')
              <div class='pull-right'><a href='/DetaliiProdus/{{$produs->id}}' class='btn btn-danger btn-sm' role='button'>Sterge</a></div>
              <div class='pull-right'><a href='/Edit/{{$produs->id}}' class='btn btn-success btn-sm' role='button'>Editeaza</a></div>
             @else
             <div class='pull-right'><a href='/DetaliiProdus/{{$produs->id}}' class='btn btn-danger btn-sm' role='button'>Cumpara</a></div>
             @endif
             @endauth
             @guest
             <div class='pull-right'><a href='DetaliiProdus/{{$produs->id}}' class='btn btn-danger btn-sm' role='button'>Cumpara</a></div>
             @endguest
          <div class='pricetext'>{{$produs->pret}} Lei</div></div>
    </div>
</div>

      
    @endforeach
   
    
  </div>

  <div class="clear"></div>
 

 <!-- paginarea -->
  {{ $produse->appends(request()->except('page'))->links() }}


 </div>
 <div class="clear"></div>

@endsection