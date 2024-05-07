<?php

use App\Models\Post;
use App\Models\Notice;
use App\Http\Controllers\Test;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\employeController;
use App\Http\Controllers\ComplainController;
use App\Http\Controllers\messagesController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\BornDemandeController;
use App\Http\Controllers\DemandeAbsenceController;
use App\Http\Controllers\DevicesDemandeController;
use App\Http\Controllers\ImprimeDemandeController;
use App\Http\Controllers\LicenceDemandeController;
use App\Http\Controllers\PlastiqueDemandeController;
use App\Http\Controllers\FournitureDemandeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/chat-app', 'App\Http\Controllers\PusherController@index');
Route::post('/broadcast', 'App\Http\Controllers\PusherController@broadcast');
Route::post('/receive', 'App\Http\Controllers\PusherController@receive');
Route::get('/', function () {
    $months = [
        "Jan", 
        "Feb", 
        "Mar", 
        "Apr", 
        "May", 
        "Jun",
        "Jul", 
        "Aug", 
        "Sep", 
        "Oct", 
        "Nov", 
        "Dec"
    ];
    $newsposts = Post::where('tag', 'news')->get();
    $reportposts = Post::where('tag', 'report')->get();
    return view('landing', compact('newsposts','reportposts','months'));
})->name('home');
Route::post('/message', [messagesController::class, 'store'])->name('message.store');
Route::post('/download-pdf', [messagesController::class, 'downloadPdf'])->name('download.pdf');
Route::middleware(['auth.redirect'])->group(function () {
    Route::get('/تسجيل-الدخول', [AdminController::class, 'loginBlade'])->name('adminBlade');
});
Route::middleware(['auth'])->group(function () {
Route::view('/إظافة-واردة', 'addMessage')->name('message.add')->middleware('message.employe');
Route::get('/لائحة-الواردات', [messagesController::class, 'index'])->name('message.index')->middleware('message.employe');
Route::get('/لوحة-التحكم', [AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/تدبير-الواردات', [messagesController::class, 'gestion'])->name('message.gestion')->middleware('message.employe');
Route::get('/ملئ-طلب-الغياب', [DemandeAbsenceController::class, 'sendDemandeAbsence'])->name('demande.show')->middleware('message.employe');
Route::post('/send_demande', [DemandeAbsenceController::class, 'sendDemandeAbsenceStore'])->name('demande.store')->middleware('message.employe');
Route::get('/list-demande', [DemandeAbsenceController::class, 'listDemande'])->name('list.demande')->middleware('message.employe');
Route::get('/إظافة-واردة/{id}', [ResponseController::class, 'show'])->name('response.show')->middleware('message.employe');
Route::get('/الإعدادات', [AdminController::class, 'settingsShow'])->name('settings.show');
Route::get('/ملئ-طلب-رخصة-إدارية', [LicenceDemandeController::class, 'licenceShow'])->name('licence.show')->middleware('message.employe');
Route::post('/licence-send', [LicenceDemandeController::class, 'licenceSend'])->name('licence.send')->middleware('message.employe');
Route::get('/قائمة-طلبات-رخصة-إدارية', [LicenceDemandeController::class, 'listLicenceEmp'])->name('licence.show.employe')->middleware('message.employe');
Route::get('/ملئ-طلب-أدوات-المكتب', [FournitureDemandeController::class, 'fournitureShow'])->name('fourniture.show')->middleware('message.employe');
Route::post('/fourniture-send', [FournitureDemandeController::class, 'fournitureSend'])->name('fourniture.send')->middleware('message.employe');
Route::get('/قائمة-طلبات-أدوات-المكتب', [FournitureDemandeController::class, 'listFournitureEmp'])->name('fourniture.show.employe')->middleware('message.employe');
Route::get('/ملئ-طلب-الولادة', [BornDemandeController::class, 'bornShow'])->name('born.show')->middleware('message.employe');
Route::post('/born-send', [BornDemandeController::class, 'bornSend'])->name('born.send')->middleware('message.employe');
Route::get('/ملئ-طلب-المطبوعات', [ImprimeDemandeController::class, 'imprimeShow'])->name('imprime.show')->middleware('message.employe');
Route::post('/imprime-send', [ImprimeDemandeController::class, 'imprimeSend'])->name('imprime.send')->middleware('message.employe');
Route::get('/ملئ-طلب-جهاز-الحاسوب-و-الطابعات', [DevicesDemandeController::class, 'deviceShow'])->name('device.show')->middleware('message.employe');
Route::post('/device-send', [DevicesDemandeController::class, 'deviceSend'])->name('device.send')->middleware('message.employe');
Route::get('/ملئ-طلب-الطوابع-المطاطية', [PlastiqueDemandeController::class, 'plastiqueShow'])->name('plastique.show')->middleware('message.employe');
Route::get('/طلبات-الطوابع-المطاطية', [PlastiqueDemandeController::class, 'listPlastique'])->name('list-plastique');
Route::post('/pdf-plastique', [PlastiqueDemandeController::class, 'pdfPlastique'])->name('download.pdf.plastique');
Route::post('/plastique-send', [PlastiqueDemandeController::class, 'plastiqueSend'])->name('plastique.send')->middleware('message.employe');
Route::get('إضافة-منشور', function(){
    return view('create-post');
})->name('add-post-blade');
Route::post('addPost', [PostController::class, 'addPost'])->name('addPost');
});
Route::get('/قائمة-طلبات-الطوابع-المطاطية', [PlastiqueDemandeController::class, 'listPlastiqueEmp'])->name('plastique.show.employe')->middleware('message.employe');
Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::post('/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/signUp', [employeController::class, 'signUpEpmploye'])->name('employe.signup');
Route::get('/إنشاء-حساب-موظف', [employeController::class, 'signupBladeEpmploye']);
Route::get('/إنشاء-حساب', [AdminController::class, 'signupBlade'])->name('signupBlade');
Route::post('/signup', [AdminController::class, 'signUp'])->name('admin.signup');
Route::middleware(['employe.role'])->group(function () {
    Route::get('/طلبات-التسجيل', [AdminController::class, 'listWaitingEmployees'])->name('listWaitingEmployees');
    Route::get('/تدبير-الموظفين', [employeController::class, 'employeesShow'])->name('employees.show');
    Route::post('/employe-delete/{id}', [employeController::class, 'employeDelete'])->name('employe.delete');
    Route::get('/إظافة-موظف', [AdminController::class, 'newEmploye'])->name('new-amploye');
    Route::post('/add-employe', [AdminController::class, 'submitEmploye'])->name('new-amploye-sub');
});
Route::post('/accept/{id}', [AdminController::class, 'acceptEmploye'])->name('employe.accept');
Route::post('/add-response', [ResponseController::class, 'create'])->name('response.create');
Route::post('/presence-register', [PresenceController::class, 'register'])->name('presence.register');
Route::post('/presence-time-out', [PresenceController::class, 'timeout'])->name('presence.timeout');
Route::get('/لائحة-الحظور', [PresenceController::class, 'presenceList'])->name('presence.list');
Route::get('/طلبات-الغياب', [DemandeAbsenceController::class, 'index'])->name('demande.index');
Route::get('/قائمة-طلبات-الغياب', [DemandeAbsenceController::class, 'listDemandeEmp'])->name('demande.index.employe');
Route::post('/accept-demande/{id}', [DemandeAbsenceController::class, 'acceptDemande'])->name('demande.accept');
Route::post('/refuse-demande/{id}', [DemandeAbsenceController::class, 'refuseDemande'])->name('demande.refuse');
Route::post('/settings-update', [AdminController::class, 'settingsUpdate'])->name('settings.update');
Route::get('/طلبات-رخصة-إدارية', [LicenceDemandeController::class, 'listLicence'])->name('list-licence');
Route::post('/pdf-licence', [LicenceDemandeController::class, 'pdfLicence'])->name('download.pdf.licence');
Route::get('/طلبات-أدوات-المكتب', [FournitureDemandeController::class, 'listFourniture'])->name('list-fourniture');
Route::post('/pdf-fourniture', [FournitureDemandeController::class, 'pdfFourniture'])->name('download.pdf.fourniture');
Route::get('/طلبات-الولادة', [BornDemandeController::class, 'listBorn'])->name('list-born');
Route::get('/قائمة-طلبات-الولادة', [BornDemandeController::class, 'listBornEmp'])->name('list.born.employe');
Route::post('/pdf-born', [BornDemandeController::class, 'pdfBorn'])->name('download.pdf.born');
Route::get('/طلبات-المطبوعات', [ImprimeDemandeController::class, 'listImprime'])->name('list-imprime');
Route::get('/قائمة-طلبات-المطبوعات', [ImprimeDemandeController::class, 'listImprimeEmp'])->name('list.imprime.employe');
Route::post('/pdf-imprime', [ImprimeDemandeController::class, 'pdfImprime'])->name('download.pdf.imprime');
Route::get('/طلبات-جهاز-الحاسوب-و-الطابعات', [DevicesDemandeController::class, 'listDevice'])->name('list-device');
Route::post('/pdf-device', [DevicesDemandeController::class, 'pdfDevice'])->name('download.pdf.device');
Route::get('/قائمة-طلبات-جهاز-الحاسوب-و-الطابعات', [DevicesDemandeController::class, 'listDeviceEmp'])->name('list.device.employe');
Route::post('/pdf-presence', [DemandeAbsenceController::class, 'pdfPresence'])->name('download.pdf.presence');
Route::post('/send-notice', [NoticeController::class, 'sendMessage'])->name('sendNotice');
Route::get('/إتصل-بنا', function(){
return view('contact');
})->name('contact');
Route::post('/delete-message/{id}', [NoticeController::class, 'deleteMessage'])->name('delete-message');
Route::post('/visit-emp/{id}', [NoticeController::class, 'visitEmp'])->name('visitEmp');
Route::view('/طلب-شكاية','complain');
Route::view('/الخطوات/1','complain-stepOne')->name('stepOne');
Route::post('/الخطوات/2', [ComplainController::class, 'try'])->name('try');
Route::post('/الخطوات/3', [ComplainController::class, 'tryy'])->name('tryy');
Route::post('/الخطوات/4', [ComplainController::class, 'step4'])->name('step4');
Route::post('/الخطوات/5', [ComplainController::class, 'step5'])->name('step5');
Route::get('/الخطوات/5', function(){
    return view('complainLast');
});
Route::get('/chikaya/pdf/{suiviNum}', [ComplainController::class, 'chikayaPdf'])->name("chikayaPdf");
Route::get('تتبع-طلب', [ComplainController::class, 'complainSuivi'])->name('complainSuivi');
Route::post('تتبع_طلب', [ComplainController::class, 'complainSuivip'])->name('complainSuivip');
Route::get('/{date}/{id}/{title}', [PostController::class, 'detailPost'])->name('detailPost');
Route::get('/قسم/{categorie}', [PostController::class, 'categorie'])->name('categorie');

Route::get('/لمحة-تاريخية', function(){
    $posts = Post::get();
    return view('cour-histoire', compact('posts'));
})->name('histoire');

Route::get('/تقديم-الموقع', function(){
    $posts = Post::get();
    return view('website', compact('posts'));
})->name('website');



Route::get('/{any}', function () {
    return view('landing');
})->where('any', '.*');


