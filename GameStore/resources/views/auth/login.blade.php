@extends('layouts.app')
@section('title', 'Login')
@section('content')
<div class="container pt-5 pb-4 text-center d-flex justify-content-center" style="min-height: 80vh;">

    <div class="loginform">
        <div class="d-flex justify-content-center mt-4 mb-2">
            <p class="text-danger" style="font-size: 35px;">Login</p>
        </div>

        <div class="d-flex justify-content-center mt-4 mb-2">
      
        </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="input-group mb-3 mt-4">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-user" style="font-size:24px"></i></span>
                            </div>
                            <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="email" required>
                            @error('email')
                                    <div class="alert alert-danger" >
                                        <strong>{{ $message }}</strong>
                                    </div>
                            @enderror
                          
                        </div>

                                
                                        
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-lock" style="font-size:24px"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control" value="" placeholder="parola" required>
                           
            

                                @error('password')
                                    <div class="alert alert-danger" >
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        

                        <div class="input-group mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        


                      
                            
                                <div class="d-flex justify-content-center mt-3 login_container">
                                    <button type="submit" name="button" class="btn-danger login_btn ">Login</button>
                                </div>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            
                      
                    </form>
                    <div class="mt-4">
            <div class="d-flex justify-content-center links">
                Nu aveti un cont? <a href="{{Route('register')}}" class="ml-2">Register</a>
            </div>
                            
        </div>
                </div>
            </div>
     
@endsection
