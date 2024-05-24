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
        $request->validate([
            'classP' => 'required',
            'obsP' => 'required',
            'prototype' => 'required',
            'typeF' => 'required'
        ]);
        
        $newDemande = [
            "employe_name" => auth()->user()->admin_name,
            "prototype" =>$request->typeF ,
            "number_prototype" =>implode(',', $request->input_values),
            "class" => $request->classP,
            "status" => "under review",
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

    public function acceptPlastiqueDemande(Request $request)
    {
        $licence = PlastiqueDemande::findOrFail($request->id);
        $licence->status = 'approved';
        $licence->save();

        return redirect()->back()->with('successAccept', 'تم الموافقة على طلب الموضف');
    }
    public function rejectPlastiqueDemande(Request $request)
    {
        $licence = PlastiqueDemande::findOrFail($request->id);
        $licence->status = 'not approved';
        $licence->save();

        return redirect()->back()->with('successReject', 'تمت رفض طلب الموضف');
    }
}
