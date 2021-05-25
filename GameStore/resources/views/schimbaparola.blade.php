@extends('layouts.app')
@section('title', 'SchimbaParola')
@section('content')

 <div class="container pt-5 pb-4 text-center ">
<div class="row pt-3 pb-3" style="background-color: white;border-radius: 10px;">
    <div class="col-md-5 mt-2 mb-2 ml-3" style="border:1px solid black;border-radius: 5px" ><img src="usericon.jpg" height="400px"></a></div>
    <div class="col-md-6 mt-2 mb-2 mr-3 justify-content-center">
      @if(session('message'))
      <div class='d-flex justify-content-center mt-2 mb-2'>{{session('message')}}</div>
      @endif
      <form action="/SchimbaParolaConfirm" method="post">
      
      @csrf
       
      <label for="parolaveche" class="input-group">Parola veche:</label>
      <input type="password" name="parolaveche" class="form-control input-group" required>
      @if(session('error'))
      <div class="alert alert-danger mt-2" >
                <strong>{{ session('error') }}</strong>
             </div>
       @endif
      

    
      
      <label for="prenume" class="input-group">Parola noua:</label>
      <input type="password" name="password" class="form-control input-group"     required>
      
        @error('password')
            <div class="alert alert-danger mt-2" >
                <strong>{{ $message }}</strong>
             </div>
         @enderror

        <label for="prenume" class="input-group">Repeta parola noua:</label>
      <input type="password" name="password_confirmation" class="form-control input-group"  required>
        @error('password_confirmation')
            <div class="alert alert-danger mt-2" >
                <strong>{{ $message }}</strong>
             </div>
         @enderror

      <input type="hidden" name="id" value="{{ Auth::user()->id }}">
    
    
      <div class="d-flex justify-content-center mt-3 login_container">
          <button type="submit" name="register" class="btn-danger login_btn ">Update</button>
      </div>
  </form>

   </div>
</div>
 </div>


@endsection