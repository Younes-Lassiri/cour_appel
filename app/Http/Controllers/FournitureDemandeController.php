<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\FournitureDemande;

class FournitureDemandeController extends Controller
{
    public function fournitureShow(){
        return view('fourniture');
    }

    public function fournitureSend(Request $request){
        $request->validate([
            'typeF' => 'required',
            'why' => 'required',
            'input_values' => 'required'
        ]);
        $newDemande = [
            "employe_name" => auth()->user()->admin_name,
            "type_fourniture" =>$request->typeF ,
            "number_fourniture" =>implode(',', $request->input_values),
            "status" => "under review",
            "why" => $request->why
        ];
        $newAdd =FournitureDemande::create($newDemande);
    
    
        return redirect()->route('dashboard')->with('demandeAdded', 'تم إرسال الطلب بنجاح');
    }

    public function listFourniture(){

        $fournitureDemandes = FournitureDemande::get();
        
        $waitingEmploye = Admin::where('status', '=', 'not approved')->get();

        return view('fournitureList', compact('fournitureDemandes', 'waitingEmploye'));
    }
    public function pdfFourniture(Request $request){
        

        $fournitureType = explode(',', $request->typeF);
        $fournitureNumber = explode(',', $request->nF);
        return view('fourniturePdf', compact('request', 'fournitureType', 'fournitureNumber'));
    }

    
    public function listFournitureEmp(){

        $fournitureDemandes = FournitureDemande::where('employe_name', auth()->user()->admin_name)->get();
        
        $waitingEmploye = Admin::where('status', '=', 'not approved')->get();

        return view('fournitureListEmp', compact('fournitureDemandes', 'waitingEmploye'));
    }


    public function acceptFournitureDemande(Request $request)
    {
        $licence = FournitureDemande::findOrFail($request->id);
        $licence->status = 'approved';
        $licence->save();

        return redirect()->back()->with('successAccept', 'تم الموافقة على طلب الموضف');
    }
    public function rejectFournitureDemande(Request $request)
    {
        $licence = FournitureDemande::findOrFail($request->id);
        $licence->status = 'not approved';
        $licence->save();

        return redirect()->back()->with('successReject', 'تمت رفض طلب الموضف');
    }
}
