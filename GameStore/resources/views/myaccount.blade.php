@extends('layouts.app')
@section('title', 'MyAccount')
@section('content')



<div class="container pt-5 pb-4 text-center ">
   
  <div class="row pt-3 pb-3" style="background-color: white;border-radius: 10px;">
    <div class="col-md-5 mt-2 mb-2 ml-3" style="border:1px solid black;border-radius: 5px" ><img src="usericon.jpg" height="400px"></a></div>
    <div class="col-md-6 mt-2 mb-2 mr-3 justify-content-center">
      
      <form action="/UpdateUser" method="post">
      
      @csrf
       @method('PATCH')
      @if(session('message'))
      <div class='f-flex justify-content-center mt-2 mb-2 alert alert-danger'>{{session('message')}}</div>
       @endif
      <label for="nume" class="input-group">Nume:</label>
      <input type="text" name="nume" class="form-control input-group"   value="{{old('nume')==''?Auth::user()->nume:old('nume')}}" required>
        @error('nume')
            <div class="alert alert-danger mt-2" >
                <strong>{{ $message }}</strong>
             </div>
         @enderror
      

    
      
      <label for="prenume" class="input-group">Prenume:</label>
      <input type="text" name="prenume" class="form-control input-group"    value="{{old('prenume')==''?Auth::user()->prenume:old('prenume')}}" required>
       @error('prenume')
            <div class="alert alert-danger mt-2" >
                <strong>{{ $message }}</strong>
             </div>
         @enderror
    
    
      <label for="email" class="input-group">Email:</label>
      <input type="email" name="email" class="form-control input-group"  value="{{old('email')==''?Auth::user()->email:old('email')}}" required>
    @error('email')
            <div class="alert alert-danger mt-2" >
                <strong>{{ $message }}</strong>
             </div>
         @enderror

         @if(session('emailerror'))
          <div class="alert alert-danger mt-2" >
                <strong>{{ session('emailerror') }}</strong>
             </div>
         @endif
    
      
      <label for="tel" class="input-group">Telefon:</label>
      <input type="tel" name="tel" class="form-control input-group"  value="{{old('tel')==''?Auth::user()->telefon:old('tel')}}" required>
        @error('tel')
            <div class="alert alert-danger mt-2" >
                <strong>{{ $message }}</strong>
             </div>
         @enderror
     
    

      
      <label for="judet" class="input-group">Judet:</label>
      <input type="text" name="judet" class="form-control input-group"  value="{{old('judet')==''?Auth::user()->judet:old('judet')}}" required>
       @error('judet')
            <div class="alert alert-danger mt-2" >
                <strong>{{ $message }}</strong>
             </div>
         @enderror
     
   

     
      <label for="localitate" class="input-group">Localitate:</label>
      <input type="text" name="localitate" class="form-control input-group"  value="{{old('localitate')==''?Auth::user()->localitate:old('localitate')}}" required>
      @error('localitate')
            <div class="alert alert-danger mt-2" >
                <strong>{{ $message }}</strong>
             </div>
         @enderror
      


     
      <label for="adresa" class="input-group">Adresa:</label>
      <input type="text" name="adresa" class="form-control input-group"  placeholder="Adresa" value="{{old('adresa')==''?Auth::user()->adresa:old('adresa')}}" required="">
       @error('adresa')
            <div class="alert alert-danger mt-2" >
                <strong>{{ $message }}</strong>
             </div>
         @enderror
    <input type="hidden" name="id" value="{{ Auth::user()->id }}">
    
    
      <div class="d-flex justify-content-center mt-3 login_container">
          <button type="submit" name="register" class="btn-danger login_btn ">Update</button>
    </div>
  </form>
   <div class="mt-3 mb-3"><a href="/SchimbaParola"><button type="button" class="btn btn-danger">Schimba parola</button></a>
</div>
   </div>
</div>
 </div>

 @endsection