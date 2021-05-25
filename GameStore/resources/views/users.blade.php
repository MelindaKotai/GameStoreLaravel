 
@extends('layouts.app')
@section('title', 'Users')
@section('content')
 <div class="container pt-5 pb-4 text-center " style="min-height: 80vh;">
    
     @if(session('message'))
    <p class='alert alert-danger'>{!! session('message') !!}</p>
     @endif 
     <table  cellpadding='15' style='background-color:white;border-radius:20px;'>
    
    <tr><th>Nume</th><th>Prenume</th><th>Email</th><th>Telefon</th><th>Judet</th><th>Localitate</th><th>Adresa</th><th>Rol</th><th>Sterge User</th></tr>

     @foreach ($users as $user) 
     
        <tr style='border-top:1px solid black;border-radius:20px;'>
        <td> {{$user->nume}} </td>
        <td> {{$user->prenume}} </td>
        <td> {{$user->email}} </td>
        <td> {{$user->telefon}} </td>
        <td> {{$user->judet}} </td>
        <td> {{$user->localitate}} </td>
        <td> {{$user->adresa}} </td>
        <td> {{$user->rol}} </td>

        <td><a href='/DeleteUser/{{$user->id}}'><button class='btn btn-danger'>Sterge</button></a></td>
        </tr>
     
        @endforeach
    </table>
     


 <a href="/CreateUser"><button class='btn btn-danger mt-5 mb-5'>Adauga un nou utilizator</button></a>
 </div>

@endsection