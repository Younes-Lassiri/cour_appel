<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>نافذة الحق</title>
    <link rel="icon" href="/img/icon.ico">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</head>
<body>
    @if (session()->has('resetSent'))
    <script>
        Swal.fire({
            position: "center-center",
            icon: "success",
            title: "{{ session('resetSent') }}",
            showConfirmButton: false,
            timer: 2000
        });
    </script>
    @endif
<div class="user-login-section">
    <x-landing-section_head />

    <div class="userLoginForm">
        <div class="userLoginFormOne">
            <img src="/img/frame.svg" alt="">
        </div>
        <div class="userLoginFormTwo">
            <h1>إنشاء كلمة مرور جديدة</h1>
            <div class="theErrorsSectionAlla">
                @if ($errors->any())
                    <div class="theErrorsSection">تعبئة أو اختيار كل حقول الإدخال باللون الأحمر</div>
                @endif
                <div class="theErrorsSectionWith">.يرجى إدخال بريدك الإلكتروني، ستتلقى رابطًا لإنشاء كلمة مرور جديدة عبر البريد الإلكتروني</div>
                
                </div>
        <form action="{{ route('send') }}" method="POST">
            @csrf
            <div class="inputLabel">
                <input type="email" id="w" class="input-field @if($errors->has('email')) errorInput @endif" name="email" onchange="handleCheck('w', 'x')" style="padding: 12px 5px">
                <label for="" class="input-label" id="x"><span>*  </span>البريد الإلكتروني</label>
            </div>
            <div class="div-login-link"><a href="{{ route('employeLoginBlade') }}" class="login-link">تسجيل الدخول؟</a></div>
            <div>
                <button type="submit">إرسال رابط إعادة تعيين كلمة المرور</button>
            </div>
        </form>
        </div>
    </div>
</div>
<x-foo_ter/>
    <script src="/js/main.js"></script>
</body>
</html>








