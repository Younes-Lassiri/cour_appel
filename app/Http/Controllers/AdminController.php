<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Notice;
use App\Models\Message;
use App\Models\Presence;
use App\Models\Response;
use Illuminate\Http\Request;
use App\Models\DemandeAbsence;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function signupBlade(){
        return view('addAdmin');
    }
    


    public function signUp(Request $request){
        $request->validate([
            'admin_name' => 'required|regex:/^[\p{Arabic}a-zA-Z\s]+$/u',
            'admin_email' => 'required|email|unique:admins',
            'admin_password' => 'required|min:8|regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[A-Za-z\d\W_]+$/|confirmed',
            'admin_rental' => 'required',
            'admin_cadre' => 'required',
            'admin_address' => 'required'
        ]);
        
    
        $hashedPassword = Hash::make($request->admin_password);
    
        $newAdmin = [
            'admin_name' => $request->admin_name,
            'email' => $request->admin_email,
            'role' => 'admin',
            'status' => 'approved',
            'password' => $hashedPassword,
            'rental_number' => $request->admin_rental,
            'cadre' => $request->admin_cadre,
            'address' => $request->admin_address
        ];
    
        $admin = Admin::create($newAdmin);
    
        return redirect()->route('adminBlade')->with('add','تم إظافة الحساب بنجاح');
    }
    




    public function loginBlade(){
        return view('loginPage');
    }


    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:8|regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[A-Za-z\d\W_]+$/',
    ]);

    $user = Admin::where('email', $request->email)->first();

    

    if ($user && Hash::check($request->password, $user->password)) {
        if ($user->status === 'approved') {
            Auth::login($user);

            return redirect()->route('dashboard')->with('success', 'تم تسجيل الدخول بنجاح');
        } else {
            return redirect()->route('adminBlade')->with('login', 'لم يتم الموافقة على حسابك بعد');
        }
    } else {
        return redirect()->route('adminBlade')->with('login', 'البريد الإلكتروني أو كلمة المرور خاطئة');
    }
}





    public function logout(){
        session()->flush();

        Auth::logout();

        return redirect()->route('home')->with('success', 'تم تسجيل الخروج بنجاح');

}

    public function dashboard(){
        $messages = Message::get();
        
        $responses = Response::get();
        $waitingEmploye = Admin::where('status', '=', 'not approved')->get();

        $notices = Notice::get();

        $employe = auth()->user();
        $presences = Presence::where('employe_name', $employe->admin_name)->latest()->get();

        $employees = Admin::get();

        return view('dashboard', compact('waitingEmploye', 'messages', 'responses', 'presences','employees','notices'));
    }


    public function listWaitingEmployees(){
        $waitingEmploye = Admin::where('status', '=', 'not approved')->get();


        return view('listWaitingEmployees', compact('waitingEmploye'));
    }

    public function acceptEmploye(Request $request){
        $theEmploye = Admin::findOrFail($request->id);
    
        $theEmploye->update(['status' => 'approved']);
    
        return redirect()->route('listWaitingEmployees')->with('accept', 'تم قبول طلب الموظف بنجاح');
    }

    public function settingsShow(){
        $waitingEmploye = Admin::where('status', '=', 'not approved')->get();


        
        return view('settings', compact('waitingEmploye'));
    }

    public function settingsUpdate(Request $request)
{
    $id = auth()->user()->id;
    $admin = Admin::findOrFail($id);

    $request->validate([
        "new_name" => 'required|regex:/^[\p{Arabic}a-zA-Z\s]+$/u',
        "new_email" => 'required|email|unique:admins,email,' . $id,
        "new_password" => 'nullable|min:8|regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[A-Za-z\d\W_]+$/|confirmed',
    ]);

    $newAdmin = [
        "admin_name" => $request->new_name,
        "email" => $request->new_email,
    ];

    if ($request->filled('new_password')) {
        $newAdmin["password"] = Hash::make($request->new_password);
    }

    $admin->update($newAdmin);

    return redirect()->route('dashboard')->with('settings', 'تم حفظ الإعدادات بنجاح');
}


    public function newEmploye(){
        $waitingEmploye = Admin::where('status', '=', 'not approved')->get();
        return view('new-employe', compact('waitingEmploye'));
    }

    public function submitEmploye(Request $request){
        $request->validate([
            'admin_name' => 'required|regex:/^[\p{Arabic}a-zA-Z\s]+$/u',
            'admin_email' => 'required|email',
            'admin_password' => 'required|min:8|regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[A-Za-z\d\W_]+$/|confirmed',
            'admin_rental' => 'required',
            'admin_cadre' => 'required',
            'admin_address' => 'required'
        ]);
        
    
        $hashedPassword = Hash::make($request->admin_password);
    
        $newAdmin = [
            'admin_name' => $request->admin_name,
            'email' => $request->admin_email,
            'role' => 'employe',
            'status' => 'not approved',
            'password' => $hashedPassword,
            'rental_number' => $request->admin_rental,
            'cadre' => $request->admin_cadre,
            'address' => $request->admin_address
        ];
    
        $admin = Admin::create($newAdmin);
    
        return redirect()->route('new-amploye')->with('addNewEmp','تم إظافة الحساب بنجاح');
    }
}
