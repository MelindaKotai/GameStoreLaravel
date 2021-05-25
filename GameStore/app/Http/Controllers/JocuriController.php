<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use App\Joc;
use Illuminate\Support\Facades\DB;
use Auth;

class JocuriController extends Controller
{	
	//pagina de afisare a produselor se verifica ce filtre si search s-au trimis
    public function index(Request $request){
   
  $this->validate($request, ['search' => 'string|nullable','categorie' => 'numeric|nullable','min'=>'numeric|nullable','max'=>'numeric|nullable','nrjucatori'=>'numeric|nullable']);

   	if(!$request->search || !$request->categorie || !$request->min || !$request->max || !$request->nrjucatori)
   		$produse=DB::table('jocuri');

   	if($request->search){
   		$str=strtolower($request->search);
   		$produse=Joc::whereRaw("LOWER(denumire) LIKE '%".$str."%'");
   	}
   

   if($request->categorie){
   		$produse=Joc::where('categorieID',$request->categorie);
   }
   
    
    if($request->min && $request->max){
    		if($produse){
    		if($request->min<$request->max)
    			$produse=$produse->where('pret','>=',$request->min)->where('pret','<=',$request->max);

    		}
    		else{
    		if($request->min<$request->max)
    			$produse=Joc::where('pret','>=',$request->min)->where('pret','<=',$request->max);
    		}
    }

    if($request->max && !$request->min){
    	if($produse){
    			$produse=$produse->where('pret','<=',$request->max);
    	}else
    	{
    			$produse=Joc::where('pret','<=',$request->max);
    	}


    }


    if($request->min && !$request->max){
    	if($produse){
    			$produse=$produse->where('pret','>=',$request->min);
    	}else
    	{
    			$produse=Joc::where('pret','>=',$request->min);		
    	}

    }
    

    if($request->nrjucatori){
    	if($produse){
    			$produse=$produse->where('nr_min_jucatori','<=',$request->nrjucatori)->where('nr_max_jucatori','>=',$request->nrjucatori);
    	}else
    	{
    			$produse=Joc::where('nr_min_jucatori','<=',$request->nrjucatori)->where('nr_max_jucatori','>=',$request->nrjucatori);
    	}

    }
   
    	
   		 $produse=$produse->paginate(9);
		$categorii=Categorie::all();
        return view('produse')->with('categorii',$categorii)->with('produse',$produse);
   
}
    

    //formularul de create trb validari
    public function create(Request $request){

        if(Auth::user()->rol=='admin'){
    	$this->validate($request, ['denumire' => 'string|required','pret' => 'numeric|required','min'=>'numeric|required|lt:max','max'=>'numeric|required','descriere'=>'required','categorieID'=>'numeric|required','img'=>'nullable|mimes:jpeg,png']);

    	if ($request->hasFile('img')){
    			 $name= $request->img->getClientOriginalName();
    			 $unique= uniqid();
    			 $fullname= $unique.$name;
    			 $request->img->move(public_path('Images'), $fullname);
    			 $imgpath="Images/".$unique.$name;

    	}
    	else
    		 $imgpath='';
    		$joc = new Joc;
    		$joc->denumire=$request->denumire;
    		$joc->pret=$request->pret;
    		$joc->nr_min_jucatori=$request->min;
    		$joc->nr_max_jucatori=$request->max;
    		$joc->categorieID=$request->categorieID;
    		$joc->descriere=$request->descriere;
    		$joc->img=$imgpath;


    		$joc->save();
    		return redirect('/produse')->with('message','Produsul a fost creat cu succes!');
        }else
return redirect('login');

		


    }

    public function createform(){
         if(Auth::user()->rol=='admin'){
    	$categorii=Categorie::all();
    	return view('create')->with('categorii',$categorii);
    }else
return redirect('home');

    }


    //pagina de update
    public function edit($id){
        if(Auth::user()->rol=='admin'){
		$categorii=Categorie::all();
		$produs=Joc::find($id);
		if($produs)
		return view('update')->with('categorii',$categorii)->with('produs',$produs);
	else
		return view('update')->with('message','Nu exista produsul cerut!');
}else
return redirect('home');


    }



    //request-ul de update
    public function update(Request $request){
        if(Auth::user()->rol=='admin'){
    		$this->validate($request, ['denumire' => 'string|required','pret' => 'numeric|required','min'=>'numeric|required|lt:max','max'=>'numeric|required','descriere'=>'required','categorieID'=>'numeric|required','img'=>'nullable|mimes:jpeg,png']);



    	if ($request->hasFile('img')){
    			 $name= $request->img->getClientOriginalName();
    			 $unique= uniqid();
    			 $fullname= $unique.$name;
    			 $request->img->move(public_path('Images'), $fullname);
    			 $imgpath="Images/".$unique.$name;

    	}
    	
    		$joc = Joc::find($request->id);
    		$joc->denumire=$request->denumire;
    		$joc->pret=$request->pret;
    		$joc->nr_min_jucatori=$request->min;
    		$joc->nr_max_jucatori=$request->max;
    		$joc->categorieID=$request->categorieID;
    		$joc->descriere=$request->descriere;
    		if(isset($imgpath))
    		$joc->img=$imgpath;


    		$joc->save();
    		return redirect('/produse')->with('message','Produsul a fost editat cu succes!');
        }else
return redirect('login');


    }


    //stergerea produsului
    public function delete($id){
        if(Auth::user()->rol=='admin'){
    	$delete=Joc::find($id);
    	if($delete)
    		$delete->delete();
    	return redirect('/produse')->with('message','Produsul a fost sters cu succes!');
    }else
return redirect('login');

    }

    //pagina produsului
    public function show($id){
    		$produs=Joc::where('id',$id)->first();
    		if($produs)
    		$categorie=Categorie::where('id',$produs->categorieID)->first();
    		if(isset($categorie))
    			return view('detaliiprodus')->with('produs',$produs)->with('categorie',$categorie);
    		else
    			return view('detaliiprodus')->with('produs',$produs);

    }


}
