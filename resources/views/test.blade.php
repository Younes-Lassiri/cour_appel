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

@if (session()->has('errorEmail'))
  <script>
      Swal.fire({
          position: "center-center",
          icon: "error",
          title: "{{ session('errorEmail') }}",
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
                <div class="theErrorsSectionWith">.يرجى إدخال كلمة مرور جديدة أدناه</div>
                </div>
        <form action='{{ route('resetPasswordPost') }}' method="POST">
            @csrf
            <input type="hidden" name="token" id="" value="{{ $token }}">
            <div class="inputLabel">
                <input type="text" id="w" class="input-field @if ($errors->has('email')) errorInput @endif" name="email" onchange="handleCheck('w', 'x')" value="{{ old('email') }}">
                <label for="" class="input-label" id="x"><span>*  </span>البريد الإلكتروني</label>
            </div>
            <div class="inputLabel">
                <input type="password" id="c" class="input-field @if ($errors->has('password')) errorInput @endif" name="password" onchange="handleCheck('c', 'v')" value="{{ old('password') }}">
                <label for="" class="input-label" id="v"><span>*  </span>كلمة السر الجديدة</label>
            </div>
            <div class="inputLabel">
                <input type="password" id="b" class="input-field @if ($errors->has('password_confirmation')) errorInput @endif" name="password_confirmation" onchange="handleCheck('b', 'n')">
                <label for="" class="input-label" id="n"><span>*  </span>تأكيد كلمة السر الجديدة</label>
            </div>
            <div>
              <button type="submit">إسترجاع كلمة المرور</button>
            </div>
        </form>
        </div>
    </div>
</div>

<x-foo_ter/>
    <script src="/js/main.js"></script>
</body>
</html>








