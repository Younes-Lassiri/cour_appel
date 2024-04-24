<?php

namespace App\Http\Controllers;

use App\Models\Response;
use App\Models\Message;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    public function show(Request $request){
        $id = $request->id;
        $message = Message::findOrFail($id);
        return view('addResponse', compact('message', 'id'));
    }

    public function create(Request $request){
        $request->validate([
            "response_source" => 'required',
            "response_result" => 'required',
        ]);
        $newResponse = [
            'response' => $request->input('response_source'),
            'result' => $request->input('response_result'),
            'message_id' => $request->input('message_id'),
            
        ];
    
        $response = Response::create($newResponse);
        

        return redirect()->route('message.gestion')->with('response', 'تم إظافة الصادرة بنجاح');
    }
}
