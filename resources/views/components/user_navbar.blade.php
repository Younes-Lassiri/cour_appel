<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
      <div class="navbarDiv">
        <div class="navbarDivOne">
            @auth
            <form action={{ route('admin.logout') }} method="POST">
              @csrf
              <div class="logoutDiv">
                <button type="submit"><i class='bx bx-log-out-circle ii'  ></i>تسجيل الخروج</button>
                <a href="{{ route('dashboard') }}"><i class='bx bxs-dashboard iiD'></i>لوحة التحكم</a>
              </div>
            </form>
            @endauth
        </div>
        <div class="navbarDivTwo">
          <ul class="navbar-ul">
            <li><a href="{{ route('contact') }}" style="text-decoration: none">إتصل بنا</a></li>
            @guest
              <li><a href="/إنشاء-حساب-موظف" style="text-decoration: none">فضاء الموظفين</a></li>
              <li><a href="/إنشاء-حساب" style="text-decoration: none">فضاء الرؤساء</a></li>
            @endguest
            <li><a href="#" style="text-decoration: none">نصوص قانونية</a></li>
            <li><a href="#" style="text-decoration: none">نصوص قانونية</a></li>
            <div style="display: flex; align-items: center"><li onclick="showDropdown()"><a id="dropdonToggle" href="#">المؤسسة</a></li>
              <a href="/"><i class='bx bx-home' style='color:#003566;background: #ffc300; padding: 14px 14px; border-radius: 5px'  ></i></a></div>
          </ul>
      </div>
      </div>
</body>
</html>