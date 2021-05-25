<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Joc;

class CosController extends Controller
{
	
	

    //afisare cos
    public function index(){

        return view('Cos');
    }

	//la apasarea butonului de adaugare in cos
        public function add(Request $request){
                $product = Joc::find($request->id_produs);

                 if(!$product) {
                 abort(404);
                 }

                 $cart = session()->get('cart');
                 //dacă cart este gol se pune primul product
               
                 if(!$cart) {
                 $cart = [
                 $request->id_produs => [
                 "name" => $product->nume,
                 "quantity" => $request->cantitate,
                 "price" => $product->pret,
                 "photo" => $product->img
                 ]
                 ];


                 session()->put('cart', $cart);
                 return redirect()->back()->with('success', 'Product adaugat cu succes in cos!');
                 }

                 // daca cart nu este gol at verificam daca produsul exista pt a incrementa cantitate
                 if(isset($cart[$request->id_produs])) {
                 $cart[$request->id_produs]['quantity']=$cart[$request->id_produs]['quantity']+$request->cantitate;
                 session()->put('cart', $cart);
                 return redirect()->back()->with('success', 'Product adaugat cu succes in cos!');
                
                 }
                 // daca item nu exista in cos at addaugam la cos cu quantity = 1

                 $cart[$request->id_produs] = [
                 "name" => $product->nume,
                 "quantity" => $request->cantitate,
                 "price" => $product->pret,
                 "photo" => $product->img
                 ];
                 session()->put('cart', $cart);
                 return redirect()->back()->with('success', 'Product adaugat cu succes in cos!');
                    }



                //la actualizarea cantitatilor din cos
            public function update(Request $request){
                        if($request->id && $request->quantity)
                             {
                             $cart = session()->get('cart');
                             $cart[$request->id]['quantity'] = $request->quantity;
                             session()->put('cart', $cart);
                             
                             return redirect('Cos')->with('success', 'Cos modificat cu succes');
                             }
                             return redirect('Cos')->with('success', 'Cosul nu a fost modificat');


                }

                //la apasarea butonului de stergere a unui produs din cos 
                public function delete(Request $request){
                        

                        if($request->id) {
                         $cart = session()->get('cart');
                         if(isset($cart[$request->id])) {
                         unset($cart[$request->id]);
                         session()->put('cart', $cart);
                         }
                         return redirect('Cos')->with('success', 'Produs sters cu succes!');
                         }
                         return redirect('Cos')->with('success', 'Produsul nu a fost sters!');

                }

  
}
