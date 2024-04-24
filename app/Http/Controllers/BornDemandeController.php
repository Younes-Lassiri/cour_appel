<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\BornDemande;
use Illuminate\Http\Request;

class BornDemandeController extends Controller
{
    public function bornShow(){
        return view('born');
    }

    public function bornSend(Request $request){
        $request->validate([
            "born_on_day" => 'required',
            "born_on_month" => 'required',
            "born_on_year" => 'required',
            "born_duree" => 'required',
            "born_start_day" => 'required',
            "born_start_month" => 'required',
            "born_start_year" => 'required',
            "born_back_day" => 'required',
            "born_back_month" => 'required',
            "born_back_year" => 'required',
        ]);
        $newDemande = [
            "employe_name" => $request->born_name,
            "work_type" => $request->born_cadre,
            "rental_number" => $request->born_rental,
            "born_date" => $request->born_on_year. "-". $request->born_on_month. "-". $request->born_on_day,
            "born_duree" => $request->born_duree,
            "born_start" => $request->born_start_year. "-". $request->born_start_month. "-". $request->born_start_day,
            "born_back" => $request->born_back_year. "-". $request->born_back_month. "-". $request->born_back_day,
        ];
    
        $newAdd =BornDemande::create($newDemande);
    
    
        return redirect()->route('dashboard')->with('demandeAdded', 'تم إرسال الطلب بنجاح');
    }


    public function listBorn(){

        $bornDemandes = BornDemande::get();
        
        $waitingEmploye = Admin::where('status', '=', 'not approved')->get();

        return view('bornList', compact('bornDemandes', 'waitingEmploye'));
    }
    public function pdfBorn(Request $request){
        
        return view('bornPdf', compact('request'));
    }

    public function listBornEmp(){

        $bornDemandes = BornDemande::where('employe_name', auth()->user()->admin_name)->get();
        
        $waitingEmploye = Admin::where('status', '=', 'not approved')->get();

        return view('bornListEmp', compact('bornDemandes', 'waitingEmploye'));
    }
}
