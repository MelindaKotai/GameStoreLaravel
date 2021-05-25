
@extends('layouts.app')
@section('title', 'Update')
@section('content')



<div class="container pt-5 pb-4 d-flex justify-content-center " style="min-height: 55vh;">

  @if(!isset($produs))

    <div class="alert alert-danger">{{$message}}</div>

  @else
   <div class="row pt-3 pb-3" style="background-color: white;border-radius: 10px;">
    <div class=" mt-5 mb-5 mr-5 ml-5 ">
      <div class="d-flex justify-content-center">
   
      </div>
      
      <form action="/Update" method="post" enctype="multipart/form-data">
         @csrf
       @method('PATCH')
       
      <label for="denumire" class="input-group">Denumire:</label>
      <input type="text" name="denumire" class="form-control input-group"   value="{{old('denumire')==''?$produs->denumire:old('denumire')}}" required>
      
       @error('denumire')
            <div class="alert alert-danger mt-2" >
                <strong>{{ $message }}</strong>
             </div>
         @enderror

    
      
      <label for="pret" class="input-group">Pret:</label>
      <input type="text" name="pret" class="form-control input-group"    value="{{old('pret')==''?$produs->pret:old('pret')}}" required>
      @error('pret')
            <div class="alert alert-danger mt-2" >
                <strong>{{ $message }}</strong>
             </div>
         @enderror
    
    
      <label for="min" class="input-group">Numar minim de jucatori:</label>
      <input type="number" name="min" class="form-control input-group"  value="{{old('min')==''?$produs->nr_min_jucatori:old('min')}}" required>
       @error('min')
            <div class="alert alert-danger mt-2" >
                <strong>{{ $message }}</strong>
             </div>
         @enderror
   
   
    
      
      <label for="max" class="input-group">Numar maxim de jucatori:</label>
      <input type="number" name="max" class="form-control input-group"  value="{{old('max')==''?$produs->nr_max_jucatori:old('max')}}" required>
     @error('max')
            <div class="alert alert-danger mt-2" >
                <strong>{{ $message }}</strong>
             </div>
         @enderror
     
    

      
      <label for="descriere" class="input-group">Descriere:</label>
      <textarea  name="descriere" class="form-control input-group"  value="{{old('descriere')==''?$produs->descriere:old('descriere')}}" required>{{old('descriere')==''?$produs->descriere:old('descriere')}}</textarea>
       @error('descriere')
            <div class="alert alert-danger mt-2" >
                <strong>{{ $message }}</strong>
             </div>
         @enderror
     
   

     
      <label for="categorieID" class="input-group">Categorie:</label>
      <select  name="categorieID" class="form-control input-group"  required>
         @if($categorii)
                    @foreach($categorii as $categorie)
                      <option value='{{$categorie->id}}' {{ (old("categorieID")==$produs->categorieID||$categorie->id ? "selected":"") }} >Jocuri de {{$categorie->nume}}</option>
                    @endforeach
         @endif
      </select>
      @error('categorieID')
            <div class="alert alert-danger mt-2" >
                <strong>{{ $message }}</strong>
             </div>
         @enderror


     
      <label for="poza" class="input-group">Poza:</label>
      <input type="file" name="img" class="form-control input-group" >
      @error('img')
            <div class="alert alert-danger mt-2" >
                <strong>{{ $message }}</strong>
             </div>
         @enderror
   
    <input type="hidden" name="id" value="{{$produs->id}}">
    
      <div class="d-flex justify-content-center mt-3 login_container">
          <button type="submit" class="btn-danger login_btn ">Editeaza</button>
    </div>
  </form>
   </div>

 </div>
 @endif
</div>

@endsection