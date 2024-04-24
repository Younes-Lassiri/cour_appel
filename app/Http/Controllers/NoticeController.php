<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Complain;
use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function sendMessage(Request $request){

        $request->validate([
            'content' => 'required',
        ]);
        
        $newMessage = [
            'content' => $request->content,
            'admin_id' => auth()->user()->id,
            
        ];
    
        $message = Notice::create($newMessage);
    }


    public function deleteMessage(Request $request){
        $message = Notice::findOrFail($request->id);
    
        if ($message->content === 'تم حذف الرسالة') {
            $deletedM = $message->delete();
        } else {
            $message->content = 'تم حذف الرسالة';
            $message->save();
        }
        
        return redirect()->route('dashboard');
    }
    public function visitEmp(Request $request){
        $emp = Admin::findOrFail($request->id);
        $waitingEmploye = Admin::where('status', '=', 'not approved')->get();


        return view('visitEmploye', compact('emp','waitingEmploye'));
    }
    

    
}
