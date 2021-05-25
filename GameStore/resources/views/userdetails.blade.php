
@extends('layouts.app')
@section('title', 'UserDetails')
@section('content')
<div class="container pt-5 pb-4  " style="min-height: 80vh;">
	<div class="pt-4 pr-4 pl-4 pb-4" style="background-color: white;font-size: 18px;border-radius: 20px;">
    <b><p>Date despre persoana</p></b>
    <p>Nume: {{$user->nume}}</p>
    <p>Prenume: {{$user->prenume}}</p>
    <p>Email: {{$user->email}}</p>
    <p>Telefon: {{$user->telefon}}</p>
    <p>Judet: {{$user->judet}}</p>
    <p>Localitate: {{$user->localitate}}</p>
    <p>Adresa: {{$user->adresa}}</p>
    <p>Rol: {{$user->rol}}</p>
    <b><p class="text-center" style="font-size: 30px">Sunteti sigur ca doriti a stergeti acest cont? </p></b>
   
   <form method="post" action="/DeleteUserConfirm/{!! $user->id !!}"> 
                @csrf
                @method('DELETE')
               <div class="text-center"> <button type="submit" class="btn btn-danger mb-2 ">Da</button></div>
              </form>
   

    
    <div class="text-center"><a href="/Users"><button class="btn btn-success mt-3 mb-3 ml-3 mr-3">NU</button></a></div>
 
  </div>

</div>

@endsection