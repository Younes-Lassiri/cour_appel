<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\ImprimeDemande;

class ImprimeDemandeController extends Controller
{
    public function imprimeShow(){
        return view('imprime');
    }

    public function imprimeSend(Request $request){
        $newDemande = [
            "employe_name" => auth()->user()->admin_name,
            "type_imprime" =>$request->typeF ,
            "number_imprime" =>implode(',', $request->input_values),
            "why" => $request->whyI
        ];
    
        $newAdd =ImprimeDemande::create($newDemande);
    
    
        return redirect()->route('dashboard')->with('demandeAdded', 'تم إرسال الطلب بنجاح');
    }








    public function listImprime(){

        $imprimeDemandes = ImprimeDemande::get();
        
        $waitingEmploye = Admin::where('status', '=', 'not approved')->get();

        return view('imprimeList', compact('imprimeDemandes', 'waitingEmploye'));
    }
    public function pdfImprime(Request $request){

        $imprimeType = explode(',', $request->typeF);
        $imprimeNumber = explode(',', $request->nF);
        return view('imprimePdf', compact('request', 'imprimeType', 'imprimeNumber'));
    }


    public function listImprimeEmp(){

        $imprimeDemandes = ImprimeDemande::where('employe_name', auth()->user()->admin_name)->get();
        
        $waitingEmploye = Admin::where('status', '=', 'not approved')->get();

        return view('imprimeListEmp', compact('imprimeDemandes', 'waitingEmploye'));
    }
}
