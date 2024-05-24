<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\DemandeAbsence;

class DemandeAbsenceController extends Controller
{
    public function sendDemandeAbsence(){
        return view('sendDemande');
    }

    public function sendDemandeAbsenceStore(Request $request){
        $request->validate([
            "from_year" => 'required',
            "from_month" => 'required',
            "from_day" => 'required',
            "to_year" => 'required',
            "to_month" => 'required',
            "to_day" => 'required',
            "reason" => 'required',
        ]);
        $newDemande = [
            "employe_id" => Auth()->user()->id,
            "employe_name" => Auth()->user()->admin_name,
            "date_from" => $request->from_year."-".$request->from_month."-". $request->from_day,
            "date_to" => $request->to_year."-".$request->to_month."-". $request->to_day,
            "reason" => $request->reason,
            "status" => "under review", 
        ];
    
        $newAdd =DemandeAbsence::create($newDemande);
    
    
        return redirect()->route('dashboard')->with('demandeAdded', 'تم إرسال الطلب بنجاح');
    }

    public function index(){
        $demandes = DemandeAbsence::get();


        $waitingEmploye = Admin::where('status', '=', 'not approved')->get();
        $employes = Admin::get();

        return view('listAbsenceDemande', compact('demandes', 'waitingEmploye', 'employes'));
    }


    public function acceptDemande(Request $request){

        $id = $request->id;

        $demande = DemandeAbsence::where('id', $id);

        $demande->update(['status' => 'approved']);



        return redirect()->back()->with('successAccept', 'تم قبول طلب الغياب بنجاح');
    }
    

    public function refuseDemande(Request $request){

        $id = $request->id;

        $demande = DemandeAbsence::where('id', $id);
        $demande->update(['status' => 'not approved']);
        return redirect()->back()->with('successReject', 'تم رفض طلب الغياب بنجاح');
    }

    public function listDemande(){
        $id = Auth()->user()->id;
        $waitingEmploye = Admin::where('status', '=', 'not approved')->get();


        $listDemande = DemandeAbsence::where('employe_id', $id)->get();

        return view('listDemande', compact('listDemande', 'waitingEmploye'));
    }



    public function pdfPresence(Request $request){

        return view('presencePdf', compact('request'));
    }

    public function listDemandeEmp(){
        $waitingEmploye = Admin::where('status', '=', 'not approved')->get();

        $listDemande = DemandeAbsence::where('employe_name', auth()->user()->admin_name)->get();

        return view('listDemandeEmp', compact('listDemande', 'waitingEmploye'));
    }
}
