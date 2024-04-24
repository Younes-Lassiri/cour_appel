<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Presence;
use Illuminate\Http\Request;
use App\Models\DemandeAbsence;

class PresenceController extends Controller
{
    public function register(){


        $newPresence = [
            'employe_name' => auth()->user()->admin_name,
            'time_in' => now()->format('Y-m-d H:i'),
        ];
    
        $presence = Presence::create($newPresence);


        return redirect()->route('dashboard')->with('presenceRegister', 'لقد تم تسجيل حظوركم لليوم بنجاح');
    }

    public function timeout(){
        $name = auth()->user()->admin_name;

        $employe = Presence::where('employe_name', $name)->latest()->firstOrFail();

        $employe->update(['time_out' => now()]);


        return redirect()->route('dashboard')->with('presenceTimeout', 'لقد تم تسجيل انتهائكم لليوم بنجاح');
    }

    public function presenceList(){
        $presence = Presence::get();
        $waitingEmploye = Admin::where('status', '=', 'not approved')->get();
        return view('presenceList', compact('presence','waitingEmploye'));
    }
}
