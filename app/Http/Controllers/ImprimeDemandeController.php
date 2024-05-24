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
        $request->validate([
            'whyI' => 'required',
            'typeF' => 'required'
        ]);
        $newDemande = [
            "employe_name" => auth()->user()->admin_name,
            "type_imprime" =>$request->typeF ,
            "status" => "under review",
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


    public function acceptImprimeDemande(Request $request)
    {
        $licence = ImprimeDemande::findOrFail($request->id);
        $licence->status = 'approved';
        $licence->save();

        return redirect()->back()->with('successAccept', 'تم الموافقة على طلب الموضف');
    }
    public function rejectImprimeDemande(Request $request)
    {
        $licence = ImprimeDemande::findOrFail($request->id);
        $licence->status = 'not approved';
        $licence->save();

        return redirect()->back()->with('successReject', 'تمت رفض طلب الموضف');
    }
}
