<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\DemandeAbsence;
use Illuminate\Support\Facades\Hash;

class employeController extends Controller
{
    public function signupBladeEpmploye(){
        return view('addEmploye');
    }

    public function signUpEpmploye(Request $request){
        $request->validate([
            'employe_name' => 'required|regex:/^[\p{Arabic}a-zA-Z\s]+$/u',
            'employe_email' => 'required|email|unique:admins',
            'employe_password' => 'required|min:8|regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[A-Za-z\d\W_]+$/|confirmed',
            'employe_rental' => 'required',
            'employe_cadre' => 'required',
            'employe_address' => 'required'
        ]);
        
    
        $hashedPassword = Hash::make($request->employe_password);
    
        $newEmploye = [
            'admin_name' => $request->employe_name,
            'email' => $request->employe_email,
            'role' => 'employe',
            'status' => 'not approved',
            'password' => $hashedPassword,
            'rental_number' => $request->employe_rental,
            'cadre' => $request->employe_cadre,
            'address' => $request->employe_address
        ];
    
        $admin = Admin::create($newEmploye);
    
        return redirect()->route('adminBlade')->with('add','تم إظافة الحساب بنجاح');
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


    
}
