<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\PlastiqueDemande;

class PlastiqueDemandeController extends Controller
{
    public function plastiqueShow(){
        return view('plastique');
    }

    public function plastiqueSend(Request $request){
        
        $newDemande = [
            "employe_name" => auth()->user()->admin_name,
            "prototype" =>$request->typeF ,
            "number_prototype" =>implode(',', $request->input_values),
            "class" => $request->classP,
            "observations" => $request->obsP
        ];
    
        $newAdd =PlastiqueDemande::create($newDemande);
    
    
        return redirect()->route('dashboard')->with('demandeAdded', 'تم إرسال الطلب بنجاح');
    }





    public function listPlastique(){

        $plastiqueDemandes = PlastiqueDemande::get();
        
        $waitingEmploye = Admin::where('status', '=', 'not approved')->get();

        return view('plastiqueList', compact('plastiqueDemandes', 'waitingEmploye'));
    }
    public function pdfPlastique(Request $request){

        $plastiqueType = explode(',', $request->typeP);
        $plastiqueNumber = explode(',', $request->nP);
        return view('plastiquePdf', compact('request', 'plastiqueType', 'plastiqueNumber'));
    }


    public function listPlastiqueEmp(){

        $plastiqueDemandes = PlastiqueDemande::where('employe_name', auth()->user()->admin_name)->get();
        
        $waitingEmploye = Admin::where('status', '=', 'not approved')->get();

        return view('plastiqueListEmp', compact('plastiqueDemandes', 'waitingEmploye'));
    }
}
