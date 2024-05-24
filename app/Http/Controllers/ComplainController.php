<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use Illuminate\Http\Request;

class ComplainController extends Controller
{
    public function try(Request $request){
        $request->validate([
            'selectedType' => 'required',
            'selectedNacio' => 'required',
            'selectedDocument' => 'required',
            'chikayaGender' => 'required',
            'lastName' => 'required',
            'firstName' => 'required',
            'documentNum' => 'required',
            'email' => 'required|email',
            'telephone' => 'required',
            'dateNaissance' => 'required|date',
        ]);
        
        $requestData = $request->all();
        return view('complain-stepTwo', compact('requestData'));
    }

    public function tryy(Request $request)
    {
        $requestData = $request->all();
        return view('complain-stepThree', compact('requestData'));
    }

    public function step4(Request $request)
    {
        $request->validate([
            'carteNacional' => 'required|image',
            'additionalImages' => 'required|image',
        ]);
    
        $carteNacionalFilename = 'carteNacional_' . time() . '.' . $request->file('carteNacional')->getClientOriginalExtension();
        $additionalImagesFilename = 'additionalImages_' . time() . '.' . $request->file('additionalImages')->getClientOriginalExtension();
    
        $imagePath = $request->file('carteNacional')->move(public_path('images'), $carteNacionalFilename);
        $imagePatha = $request->file('additionalImages')->move(public_path('images'), $additionalImagesFilename);
    
        $requestData = $request->all();
    
        return view('complain-stepFour', compact('requestData', 'carteNacionalFilename', 'additionalImagesFilename'));
    }
    
    public function step5(Request $request){
        $numericPart = preg_replace('/[^0-9]/', '', $request->documentNum);
        $randomNumber = rand(1000, 9999);
        $suiviNum = $numericPart . $randomNumber;
        
        $theComplain = [
            "senderName" =>$request->firstName. " ". $request->lastName,
            "senderEmail" =>$request->email,
            "complainType" =>$request->selectedType,
            "senderPhone" =>$request->telephone,
            "senderGender" =>$request->chikayaGender,
            "senderNaissance" =>$request->dateNaissance,
            "senderDocumentType" =>$request->selectedDocument,
            "senderCin" =>$request->documentNum,
            "senderNationality" =>$request->selectedNacio,
            "crimenalName" =>$request->firstNamec. " ". $request->lastNamec,
            "crimenalGender" =>$request->crimenalGender,
            "date" =>$request->date,
            "time" =>$request->time,
            "cinImage" =>$request->cartNational,
            "cinImageBack" =>$request->additionalImages,
            "suiviNum" =>$suiviNum,
            "sujet" => $request->sujet,
            'status' => 'under review'
        ];
        $newComplain = Complain::create($theComplain);

        return view('complainLast', compact('suiviNum'));
    }

    public function chikayaPdf(Request $request){
        $suiviNum = $request->suiviNum;

        return view('chikayaPdf', compact('suiviNum'));

    }
    public function complainSuivi(){
        return view('complainSuivi');
    }
    public function complainSuivip(Request $request)
{
    $suiviNum = $request->sn;
    $theComplain = Complain::where('suiviNum', $suiviNum)->first();
    
    if ($theComplain) {
        if ($theComplain->status === 'under review') {
            return redirect()->route('complainSuivi')->with(['status' => 'الشكوى قيد المراجعة', 'sn' => $request->sn]);
        } else {
            return redirect()->route('complainSuivi')->with(['status' => 'تمت مراجعة الشكوى من طرف محكمة الإستئناف بالعيون، يرجى الحضور قريبا', 'sn' => $request->sn]);
        }
    } else {
        return redirect()->route('complainSuivi')->with(['status' => 'لا توجد شكوى تحت هذا الرقم، يرجى مراجعة رقم الطلب', 'sn' => $request->sn]);
    }
}

public function listChikaya()
{
    $complains = Complain::get();
    return view('list-complains', compact('complains'));
}

}
