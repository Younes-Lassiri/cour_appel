<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="/img/icon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>نافذة الحق</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    
</head>
<body>


<div class="admin-signup-section">
    

    <x-landing-section_head />
    

    <div class="adminCreationForm">
        <div class="adminCreationFormOne">
            <img src="/img/frame.svg" alt="">
        </div>
        <div class="adminCreationFormTwo">
            <h1>إنشاء حساب</h1>
            <div class="theErrorsSectionAlla">
                @if ($errors->any())
                    <div class="theErrorsSection">تعبئة أو اختيار كل حقول الإدخال باللون الأحمر</div>
                @endif
                </div>
        <form action={{ route('employe.signup') }} method="POST">
            @csrf
            <div class="theGrid">
                <div class="inputLabel">
                    <input type="number" id="l" class="input-field @if ($errors->has('employe_rental')) errorInput @endif" name="employe_rental" onchange="handleCheck('l', 'm')" value="{{ old('employe_rental') }}">
                    <label for="" class="input-label" id="m"><span>*  </span>رقم التأجير</label>
                </div>
                <div class="inputLabel">
                    <input type="text" id="w" class="input-field @if ($errors->has('employe_name')) errorInput @endif" name="employe_name" onchange="handleCheck('w', 'x')" value="{{ old('employe_name') }}">
                    <label for="" class="input-label" id="x"><span>*  </span>الإسم الكامل</label>
                </div>
            </div>
            <div class="theGridd">
                <div class="inputLabel">
                    <input type="text" id="t" class="input-field @if ($errors->has('employe_cadre')) errorInput @endif" name="employe_cadre" onchange="handleCheck('t', 'y')" value="{{ old('employe_cadre') }}">
                    <label for="" class="input-label" id="y"><span>*  </span>الإطار</label>
                </div>
                <div class="inputLabel">
                    <input type="text" id="c" class="input-field @if ($errors->has('employe_address')) errorInput @endif" name="employe_address" onchange="handleCheck('c', 'v')" value="{{ old('employe_address') }}">
                    <label for="" class="input-label" id="v"><span>*  </span>العنوان الشخصي</label>
                </div>
            </div>
            <div class="inputLabel">
                <input type="email" id="b" class="input-field @if ($errors->has('email')) errorInput @endif" name="email" onchange="handleCheck('b', 'n')" value="{{ old('email') }}">
                <label for="" class="input-label" id="n"><span>*  </span>البريد الإلكتروني</label>
            </div>
            <div class="inputLabel">
                <input type="password" id="a" class="input-field @if ($errors->has('employe_password')) errorInput @endif" name="employe_password" onchange="handleCheck('a', 'z')" value="{{ old('employe_password') }}">
                <label for="" class="input-label" id="z"><span>*  </span>كلمة السر</label>
            </div>
            <div class="inputLabel">
                <input type="password" id="e" class="input-field @if ($errors->has('employe_password_confirmation')) errorInput @endif" name="employe_password_confirmation" onchange="handleCheck('e', 'r')" value="{{ old('employe_password_confirmation') }}">
                <label for="" class="input-label" id="r"><span>*  </span>تأكيد كلمة السر</label>
            </div>
            <div class="div-login-link"><a href="{{ route('employeLoginBlade') }}" class="login-link">هل لديك حساب بالفعل؟</a></div>


            
            

            <div style="margin-top: 30px">
                <button type="submit">إنشاء</button>
            </div>
        </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.title = document.title + ' - ' + 'إنشاء حساب';
    });
</script>
<x-foo_ter/>

    <script src="/js/main.js"></script>
</body>
</html>








