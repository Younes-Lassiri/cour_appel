<?php

namespace App\Http\Controllers\Mail;

use App\Mail\courMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function mail(Request $request)
    {
        $request->validate([
            'email' => 'required'
        ]);
        $email = $request->email;
        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' =>$email,
            'token' =>$token
        ]);
        Mail::to($email)->send(new courMail($token));
        return redirect()->route('reset.get')->with('resetSent','تم إرسال رابط إعادة تعيين كلمة المرور إلى بريدك الإلكتروني. يرجى التحقق من بريدك الإلكتروني واتباع التعليمات لإعادة تعيين كلمة المرور الخاصة بك');
    }

    public function emailReset($token)
    {
        return view('test',compact('token'));
    }
}
