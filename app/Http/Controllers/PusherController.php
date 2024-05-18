<?php

namespace App\Http\Controllers;

use App\Events\PusherBroadcast;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Notice;


class PusherController extends Controller
{
    public function index()
    {
        $notices = Notice::get();
        return view('index', compact('notices'));
    }

    public function broadcast(Request $request)
    {
        $senderNameAuth = auth()->user()->admin_name;
        broadcast(new PusherBroadcast($request->get('message'),$senderNameAuth))->toOthers();

        return view('broadcast', [
            'message' => $request->get('message'),
            'senderNameAuth' => $senderNameAuth
        ]);
    }

    public function receive(Request $request)
    {
        return view('receive', [
            'message' => $request->get('message')]);
    }
    
}
