<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>نافذة الحق</title>
    <link rel="icon" href="/img/icon.ico">
    <link rel="stylesheet" href="/css/main.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</head>
<body>


<div class="admin-signup-section">
    
    <x-landing-section_head />
    <x-admin_navbar :count="count($waitingEmploye)"/>

    <div class="adminCreationForm">
        <div class="adminCreationFormOne">
            <img src="/img/frame.svg" alt="">
        </div>


        <div class="adminCreationFormTwo">
            <h1>إظافة موظف جديد</h1>
    
        <form action={{ route('new-amploye-sub') }} method="POST">
            @csrf
            <div class="inputLabel">
                <input type="text" id="a" class="input-field" name="admin_name" onchange="handleCheck('a', 'z')">
                <label for="" class="input-label" id="z"><span>*  </span>الإسم الكامل</label>
            </div>
            @if($errors->has('admin_name'))
                <span style="font-size: 13px">{{ $errors->first('admin_name') }}</span>
            @endif

            <div class="inputLabel">
                <input type="number" id="e" class="input-field" name="admin_rental" onchange="handleCheck('e', 'r')">
                <label for="" class="input-label" id="r"><span>*  </span>رقم التأجير</label>
            </div>
            @if($errors->has('admin_rental'))
                <span style="font-size: 13px">{{ $errors->first('admin_rental') }}</span>
            @endif


            <div class="inputLabel">
                <input type="text" id="t" class="input-field" name="admin_cadre" onchange="handleCheck('t', 'y')">
                <label for="" class="input-label" id="y"><span>*  </span>الإطار</label>
            </div>
            @if($errors->has('admin_cadre'))
                <span style="font-size: 13px">{{ $errors->first('admin_cadre') }}</span>
            @endif



            <div class="inputLabel">
                <input type="text" id="u" class="input-field" name="admin_address" onchange="handleCheck('u', 'i')">
                <label for="" class="input-label" id="i"><span>*  </span>العنوان الشخصي</label>
            </div>
            @if($errors->has('admin_address'))
                <span style="font-size: 13px">{{ $errors->first('admin_address') }}</span>
            @endif

            <div class="inputLabel">
                <input type="text" id="o" class="input-field" name="admin_email" onchange="handleCheck('o', 'p')">
                <label for="" class="input-label" id="p"><span>*  </span>البريد الإلكتروني</label>
            </div>
            @if($errors->has('admin_email'))
                <span style="font-size: 13px">{{ $errors->first('admin_email') }}</span>
            @endif
            <div class="inputLabel">
                <input type="password" id="q" class="input-field" name="admin_password" onchange="handleCheck('q', 's')">
                <label for="" class="input-label" id="s"><span>*  </span>كلمة السر</label>
            </div>
            @if($errors->has('admin_password'))
                <span style="font-size: 13px">{{ $errors->first('admin_password') }}</span>
            @endif

            

            <div class="inputLabel">
                <input type="password" id="d" class="input-field" name="admin_password_confirmation" onchange="handleCheck('d', 'f')">
                <label for="" class="input-label" id="f"><span>*  </span>تأكيد كلمة السر</label>
            </div>
            @if ($errors->has('admin_password_confirmation'))
                <div class="error-message">
                    {{ $errors->first('admin_password_confirmation') }}
                </div>
            @endif

            
            

            <div>
                <button type="submit">إنشاء</button>
            </div>
        </form>
        </div>
    </div>
</div>
<x-foo_ter/>

    <script src="/js/main.js"></script>
</body>
</html>








