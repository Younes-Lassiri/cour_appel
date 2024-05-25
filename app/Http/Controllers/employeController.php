<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Mail\empSignup;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\DemandeAbsence;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class employeController extends Controller
{
    public function signupBladeEpmploye(){
        return view('addEmploye');
    }

    public function signUpEpmploye(Request $request){
        $email = $request->email;
        $request->validate([
            'employe_name' => 'required|regex:/^[\p{Arabic}a-zA-Z\s]+$/u',
            'email' => 'required|email|unique:admins',
            'employe_password' => 'required|min:8|regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[A-Za-z\d\W_]+$/|confirmed',
            'employe_rental' => 'required',
            'employe_cadre' => 'required',
            'employe_address' => 'required'
        ]);
        
    
        $hashedPassword = Hash::make($request->employe_password);
    
        $newEmploye = [
            'admin_name' => $request->employe_name,
            'email' => $request->email,
            'role' => 'employe',
            'status' => 'not approved',
            'password' => $hashedPassword,
            'rental_number' => $request->employe_rental,
            'cadre' => $request->employe_cadre,
            'address' => $request->employe_address,
            'email_verified' => false
        ];
        $admin = Admin::create($newEmploye);
        $id = $admin->id;
        DB::table('waitters')->insert([
            'employe_id' =>$id
        ]);
        Mail::to($email)->send(new empSignup($id));
        return redirect()->route('employeLoginBlade')->with('add','تم إظافة الحساب بنجاح');
    }


    public function employeesShow(){
        $waitingEmploye = Admin::where('status', '=', 'not approved')->get();


        $employees = Admin::get();
        return view('listEmployees', compact('waitingEmploye', 'employees'));
    }


    public function employeDelete(Request $request){

        $employe = Admin::findOrFail($request->id);
        $deleted = $employe->delete();

        return redirect()->route('employees.show')->with('delete', 'تم حذف الموظف بنجاح');
    }
    public function validateAccount(Request $request)
    {
        $employe = Admin::findOrFail($request->id);
        $employe->update([
            'email_verified' => true
        ]);
        DB::table('waitters')->where(['employe_id' => $request->id,])->delete();
        return redirect()->route('employeLoginBlade')->with('validateSucess','تم تأكيد الحساب بنجاح');

    }


    
}
