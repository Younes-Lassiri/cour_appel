<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\DevicesDemande;

class DevicesDemandeController extends Controller
{
    public function deviceShow(){
        return view('device');
    }

    public function deviceSend(Request $request){
        $newDemande = [
            "employe_name" => auth()->user()->admin_name,
            "type_device" =>$request->typeF ,
            "number_device" =>implode(',', $request->input_values),
            "why" => $request->whyD
        ];
    
        $newAdd =DevicesDemande::create($newDemande);
    
    
        return redirect()->route('dashboard')->with('demandeAdded', 'تم إرسال الطلب بنجاح');
    }




    public function listDevice(){

        $devicesDemandes = DevicesDemande::get();
        
        $waitingEmploye = Admin::where('status', '=', 'not approved')->get();

        return view('deviceList', compact('devicesDemandes', 'waitingEmploye'));
    }
    public function pdfDevice(Request $request){

        $deviceType = explode(',', $request->typeF);
        $deviceNumber = explode(',', $request->nF);
        return view('devicePdf', compact('request', 'deviceType', 'deviceNumber'));
    }


    public function listDeviceEmp(){

        $devicesDemandes = DevicesDemande::where('employe_name', auth()->user()->admin_name)->get();
        
        
        $waitingEmploye = Admin::where('status', '=', 'not approved')->get();

        return view('deviceListEmp', compact('devicesDemandes', 'waitingEmploye'));
    }
}
