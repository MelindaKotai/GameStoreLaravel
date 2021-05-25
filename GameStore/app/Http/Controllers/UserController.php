<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{	//afiseaza toti users
    public function index(){

        if(Auth::user()->rol=='admin'){


        $users=User::all();
        return view('users')->with('users',$users);

    }else
return redirect('login');


}


    public function create(Request $request){
         
        if(Auth::user()->rol=='admin'){
         $this->validate($request, [
            'nume' => ['required', 'string', 'max:255'],
            
            'prenume'=>['required', 'string'],
            'telefon'=>['required', 'digits:10'],
            'judet'=>['required', 'string'],
            'localitate'=>['required', 'string'],
            'adresa'=>['required', 'string'],
           
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'], 
             'password_confirmation' => ['required','same:password'],
                     ]);

         User::create([
            'nume' => $request['nume'],
            'prenume'=>$request['prenume'],
            'telefon'=>$request['telefon'],
            'judet'=>$request['judet'],
            'localitate'=>$request['localitate'],
            'adresa'=>$request['adresa'],
            'email' => $request['email'],
            'rol'=>$request['rol'],
            'parola' => Hash::make($request['password']),
        ]);


         return redirect('/Users')->with('message','Utilizator creat cu succes!');
     }else
return redirect('login');

     
     
    }

   
    public function myaccount(){
        return view('myaccount');
    }
    //efectiv modificarea
    public function update(Request $request){




        $this->validate($request, [
            'nume' => ['required', 'string', 'max:255'],
            
            'prenume'=>['required', 'string'],
            'tel'=>['required', 'digits:10'],
            'judet'=>['required', 'string'],
            'localitate'=>['required', 'string'],
            'adresa'=>['required', 'string'],
           
            'email' => ['required', 'string', 'email', 'max:255'],
          
                     ]);
            
        $user=User::find($request->id);
            if($user->email != $request->email){
                $check=User::where('email',$request->email)->get();
        
                if(count($check))
                     return redirect('/MyAccount')->with('emailerror','Email-ul este deja folosit de alt utilizator!');
            }
        

        $user->nume=$request->nume;
        $user->prenume=$request->prenume;
        $user->telefon=$request->tel;
        $user->judet=$request->judet;
        $user->localitate=$request->localitate;
        $user->adresa=$request->adresa;
        $user->email=$request->email;
        $user->save();
        return redirect('/MyAccount')->with('message','Cont actualizat cu succes!');

    }

    //detalii despre un user 
    public function show($id){
         if(Auth::user()->rol=='admin'){
            $user=User::find($id);
            return view('userdetails')->with('user',$user);
        }else
return redirect('login');

    }

    //stergerea efectiva a unui user
    public function delete($id){



if(Auth::user()->rol=='admin'){
        $delete=User::find($id);
        $delete->delete();
        return redirect('/Users')->with('message','Utilizatorul a fost sters cu succes!');
    }else
return redirect('login');

    }

    //schimbarea parolei 
    public function changepassword(Request $request){


         $this->validate($request, [
            'password' => ['required', 'string', 'min:8', 'confirmed'], 
            'password_confirmation' => ['required','same:password'],
            'id' => ['required'],
            'parolaveche' => ['required'],
            ]);
            $user=User::find($request->id);


            if(Hash::check($request['parolaveche'],$user->parola))
                {
                    $user->parola=Hash::make($request['password']);
                    $user->save();
                    return redirect('/MyAccount')->with('message','Parola Schimbata cu succes');
                }
            else{


                return redirect('/SchimbaParola')->with('error','Parola incorecta!');

            }
        

}
}
