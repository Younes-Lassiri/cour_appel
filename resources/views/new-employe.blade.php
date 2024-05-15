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
            <div class="testFormOne">
                @if ($errors->any())
                    <div class="theErrorsSection">تعبئة أو اختيار كل حقول الإدخال باللون الأحمر</div>
                @endif
            </div>
        <form action={{ route('new-amploye-sub') }} method="POST">
            @csrf
            <div class="inputLabel">
                <input type="text" id="a" class="input-field @if ($errors->has('admin_name')) errorInput @endif" name="admin_name" onchange="handleCheck('a', 'z')" value="{{ old('admin_name') }}">
                <label for="" class="input-label" id="z"><span>*  </span>الإسم الكامل</label>
            </div>
            <div class="inputLabel">
                <input type="number" id="e" class="input-field @if ($errors->has('admin_rental')) errorInput @endif" name="admin_rental" onchange="handleCheck('e', 'r')" value="{{ old('admin_rental') }}">
                <label for="" class="input-label" id="r"><span>*  </span>رقم التأجير</label>
            </div>
            <div class="inputLabel">
                <input type="text" id="t" class="input-field @if ($errors->has('admin_cadre')) errorInput @endif" name="admin_cadre" onchange="handleCheck('t', 'y')" value="{{ old('admin_cadre') }}">
                <label for="" class="input-label" id="y"><span>*  </span>الإطار</label>
            </div>

            <div class="inputLabel">
                <input type="text" id="c" class="input-field @if ($errors->has('admin_address')) errorInput @endif" name="admin_address" onchange="handleCheck('c', 'v')" value="{{ old('admin_address') }}">
                <label for="" class="input-label" id="v"><span>*  </span>العنوان الشخصي</label>
            </div>
            <div class="inputLabel">
                <input type="text" id="b" class="input-field @if ($errors->has('admin_email')) errorInput @endif" name="admin_email" onchange="handleCheck('b', 'n')" value="{{ old('admin_email') }}">
                <label for="" class="input-label" id="n"><span>*  </span>البريد الإلكتروني</label>
            </div>
            <div class="inputLabel">
                <input type="password" id="w" class="input-field @if ($errors->has('admin_password')) errorInput @endif" name="admin_password" onchange="handleCheck('w', 'x')" value="{{ old('admin_password') }}">
                <label for="" class="input-label" id="x"><span>*  </span>كلمة السر</label>
            </div>
            <div class="inputLabel">
                <input type="password" id="d" class="input-field @if ($errors->has('admin_password_confirmation')) errorInput @endif" name="admin_password_confirmation" onchange="handleCheck('d', 'f')" value="{{ old('admin_password_confirmation') }}">
                <label for="" class="input-label" id="f"><span>*  </span>تأكيد كلمة السر</label>
            </div>
            <div>
                <button type="submit">إنشاء</button>
            </div>
        </form>
        </div>
    </div>
</div>
<x-foo_ter/>

    <script src="/js/main.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.title = document.title + ' - ' + 'إظافة موظف';
        });
    </script>
</body>
</html>








