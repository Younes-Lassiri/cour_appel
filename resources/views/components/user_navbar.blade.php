<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
            <div style="display: flex; align-items: center">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-togglee" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="display: flex; align-items: center; gap: 5px" id="dropdonToggle">المؤسسة
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="" href="{{ route('histoire') }}">لمحة تاريخية</a></li>
                <li><a href="{{ route('website') }}">تقديم الموقع</a></li>
              </ul>
            </li>
              <a href="/" id="exept"><i class='bx bx-home' style='color:#003566;background: #ffc300; padding: 14px 14px; border-radius: 5px'></i></a></div>
              
          </ul>
      </div>
      </div>
</body>
</html>