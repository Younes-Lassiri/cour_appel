<?php

namespace App\Http\Controllers;


use App\Models\Admin;
use App\Models\Message;
use App\Models\Response;
use Illuminate\Http\Request;
use App\Models\DemandeAbsence;


class messagesController extends Controller
{
    public function store(Request $request){
        
        $request->validate([
            'message_year' => 'required',
            'message_month' => 'required',
            'message_day' => 'required',
            'message_number' => 'required',
            'received_year' => 'required',
            'received_month' => 'required',
            'received_day' => 'required',
            'sender_name' => 'required',
            'sender_city' => 'required',
            'message_object' => 'required',
        ]);

        
        $newMessage = [
            'message_date' => $request->input('message_year') . '-' . $request->input('message_month') . '-' . $request->input('message_day'),
            'message_number' => $request->input('message_number'),
            'received_date' => $request->input('received_year') . '-' . $request->input('received_month') . '-' . $request->input('received_day'),
            'sender_name' => $request->input('sender_name'),
            'sender_city' => $request->input('sender_city'),
            'message_object' => $request->input('message_object'),
            
        ];
    
        $message = Message::create($newMessage);
        

        return redirect()->route('dashboard')->with('status', 'تم إظافة الواردة بنجاح');
    }

    public function index(){
        $messages = Message::get();

        $waitingEmploye = Admin::where('status', '=', 'not approved')->get();

        return view('listMessage', compact('messages','waitingEmploye'));
    }

    
    public function downloadPdf(Request $request)
{
    $senderName = $request->input('sender_name');
    $senderCity = $request->input('sender_city');
    $messageNumber = $request->input('message_number');
    $messageDate = $request->input('message_date');
    $messageObject = $request->input('message_object');

    return view('pdf', compact('senderName', 'messageObject','senderCity','messageDate','messageNumber'));
}


public function gestion(){
    $messages = Message::get();

    $waitingEmploye = Admin::where('status', '=', 'not approved')->get();
    

    return view('gestionMessages', compact('messages','waitingEmploye'));
}
}
