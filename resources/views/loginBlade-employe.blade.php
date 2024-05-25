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

    @if (session()->has('add'))
  <script>
      Swal.fire({
          position: "center-center",
          icon: "success",
          title: "{{ session('add') }}",
          showConfirmButton: false,
          timer: 2000
      });
  </script>
@endif

@if (session()->has('validateSucess'))
<script>
    Swal.fire({
        position: "center-center",
        icon: "success",
        title: "{{ session('validateSucess') }}",
        showConfirmButton: false,
        timer: 2000
    });
</script>
@endif


@if (session()->has('resetSuccess'))
<script>
    Swal.fire({
        position: "center-center",
        icon: "success",
        title: "{{ session('resetSuccess') }}",
        showConfirmButton: false,
        timer: 2000
    });
</script>
@endif

    @if (session()->has('login'))
  <script>
      Swal.fire({
          position: "center-center",
          icon: "error",
          title: "{{ session('login') }}",
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
            <h1>تسجيل الدخول</h1>
            <div class="theErrorsSectionAlla">
                @if ($errors->any())
                    <div class="theErrorsSection">تعبئة أو اختيار كل حقول الإدخال باللون الأحمر</div>
                @endif
                </div>
        <form action={{ route('admin.login') }} method="POST">
            @csrf
            <div class="inputLabel">
                <input type="text" id="w" class="input-field @if ($errors->has('email')) errorInput @endif" name="email" onchange="handleCheck('w', 'x')" value="{{ old('email') }}">
                <label for="" class="input-label" id="x"><span>*  </span>البريد الإلكتروني</label>
            </div>
            <div class="inputLabel">
                <input type="password" id="c" class="input-field @if ($errors->has('password')) errorInput @endif" name="password" onchange="handleCheck('c', 'v')" value="{{ old('password') }}">
                <label for="" class="input-label" id="v"><span>*  </span>كلمة السر</label>
            </div>
            <div class="div-login-link">
                <a href="{{ route('reset.get') }}" class="login-link">نسيت كلمة المرور؟</a>
                <a href="{{ route('signupBladeEmploye') }}" class="login-link">ليس لديك حساب؟</a>
            </div>
            <div>
                <button type="submit">تسجيل الدخول</button>
            </div>
        </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.title = document.title + ' - ' + 'تسجيل-الدخول';
    });
</script>
<x-foo_ter/>
    <script src="/js/main.js"></script>
</body>
</html>








