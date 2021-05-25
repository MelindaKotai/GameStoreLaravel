@extends('layouts.app')
@section('title', 'CreateUser')
@section('content')
<div class="container pt-5 pb-4 text-center d-flex justify-content-center" style="min-height: 80vh;">
    <div class="loginform">
        <div class="d-flex justify-content-center mt-4 mb-2">
            <p class="text-danger" style="font-size: 35px;">Creaza utilizator</p>
        </div>

       
                    <form method="POST" action="/CreateUserConfirm">
                        @csrf

                       <div class="input-group mb-3 mt-4">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-user" style="font-size:24px"></i></span>
                    </div>
                    <input id="nume" type="text" name="nume" class="form-control"  placeholder="Nume" value="{{old('nume')}}" required>
                    
                                @error('nume')
                                     <div class="alert alert-danger mt-2">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        

                       <div class="input-group mb-3 mt-4">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-user" style="font-size:24px"></i></span>
                    </div>
                    <input id="prenume" type="text" name="prenume" class="form-control"  placeholder="Prenume"  value="{{old('prenume')}}" required>
                    

                                @error('prenume')
                                     <div class="alert alert-danger mt-2">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        

                        <div class="input-group mb-3 mt-4">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-envelope" style="font-size:19px"></i></span>
                    </div>

                    <input id="email"  type="email" name="email" class="form-control"  placeholder="Email"  value="{{old('email')}}" required>

                    @error('email')
                      <div style="clear: both;width: 100%;" class="alert alert-danger mt-2">
                                        <strong>{{ $message }}</strong>
                                    </div>
                     @enderror

                </div>
                   

                    <div class="input-group mb-3 mt-4">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-phone" style="font-size:22px"></i></span>
                    </div>
                    <input id="telefon" type="tel" name="telefon" class="form-control"  placeholder="Numar de telefon" value="{{old('telefon')}}" required>
                    @error('telefon')
                                    <div class="alert alert-danger mt-2">
                                        <strong>{{ $message }}</strong>
                                    </div>
                     @enderror
                    </div>


                    <div class="input-group mb-3 mt-4">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-map-marker" style="font-size:24px"></i></span>
                    </div>
                    <input id="judet" type="text" name="judet" class="form-control"  placeholder="Judet" value="{{old('judet')}}" required>
                    @error('judet')
                                    <div class="alert alert-danger mt-2">
                                        <strong>{{ $message }}</strong>
                                    </div>
                     @enderror

                </div>

                <div class="input-group mb-3 mt-4">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-map-marker" style="font-size:24px"></i></span>
                    </div>
                    <input id="localitate" type="text" name="localitate" class="form-control"  placeholder="Localitate" value="{{old('localitate')}}" required>
                    
                     @error('localitate')
                                    <div class="alert alert-danger mt-2">
                                        <strong>{{ $message }}</strong>
                                    </div>
                     @enderror
                 </div>

                 <div class="input-group mb-3 mt-4">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-map-marker" style="font-size:24px"></i></span>
                    </div>
                    <input id="adresa" type="text" name="adresa" class="form-control"  placeholder="Adresa" value="{{old('adresa')}}" required>
                     @error('adresa')
                                    <div class="alert alert-danger mt-2">
                                        <strong>{{ $message }}</strong>
                                    </div>
                     @enderror
                 </div>



               




                        <div class="input-group mb-3 mt-4">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-lock" style="font-size:24px"></i></span>
                    </div>
                                <input id="password" type="password" name="password" class="form-control"  placeholder="Parola" required>
                    
                                @error('password')
                                     <div class="alert alert-danger mt-2">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                       

                        
                <div class="input-group mb-3 mt-4">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-lock" style="font-size:24px"></i></span>
                    </div>
                    <input  id="password-confirm" type="password" name="password_confirmation" class="form-control"  placeholder="Repetati parola" required>
                </div>

                
                <div class="input-group mb-3 mt-4">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-address-card" style="font-size:24px"></i></span>
                    </div>
                    <select  name="rol" class="form-control"  placeholder="rol" value="{{old('rol')}}" required>
                        <option value="client">Client</option>
                        <option value="admin">Administrator</option>
                    </select>
                   
                </div>
                

                       <div class="d-flex justify-content-center mt-3 login_container">
                             <button type="submit" name="register" class="btn-danger login_btn ">Create</button>
                        </div>
                    </form>
                
      </div>
</div>
@endsection