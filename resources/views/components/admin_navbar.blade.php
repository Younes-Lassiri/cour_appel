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


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
      a{
        text-decoration: none
      }
      .dropdown-menu-end{
  background-color: #003566;
  text-align: right;
}

.dropdown-menu-end li a{
  font-size: 15px;
}

.dropdown-menu-end li{
  width: 200px;
  padding: 10px 15px;
}

.dropdown-togglee:focus{
  color: white;
}
    </style>
    
</head>
<body>
      <div class="navbarDiv" style="height: 70px">
        <div class="navbarDivOne">
            @auth
            <form action={{ route('admin.logout') }} method="POST">
              @csrf
              <div class="logoutDiv">
                <button type="submit"><i class='bx bx-log-out-circle ii'></i>تسجيل الخروج</button>
                <a href="{{ route('dashboard') }}" style="text-decoration: none"><i class='bx bxs-dashboard iiD'></i>لوحة التحكم</a>
              </div>
            </form>
            @endauth
        </div>
        <div class="navbarDivTwo">
          <ul class="navbar-ull">
            <li><a href="{{ route('settings.show') }}"><i class='bx bx-cog' style='color:#ffffff'  ></i> الإعدادات</a></li>
            @if (auth()->user()->role === 'admin')
            
            <li><a href="{{ route('new-amploye') }}"><i class='bx bxs-user-plus' style='color:#ffffff'  ></i>إظافة موظف</a></li>
            <li>
              <a href="{{ route('employees.show') }}" style="display: flex; align-items: center; gap: 5px">
                      <i class='bx bx-envelope'></i>تدبير الموظفين
              </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-togglee" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="display: flex; align-items: center; gap: 5px">
              <i class='bx bxs-down-arrow' style="font-size: 11px"></i>قائمة الطلبات
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="" href="{{ route('list-licence') }}">طلبات رخصة إدارية</a></li>
              <li><a class="" href="{{ route('list-fourniture') }}">طلبات أدوات المكتب</a></li>
              <li><a class="" href="{{ route('list-plastique') }}">طلبات الطوابع المطاطية</a></li>
              <li><a href="{{ route('list-device') }}">طلبات جهاز الحاسوب و الطابعات</a></li>
              <li><a href="{{ route('list-imprime') }}">طلبات المطبوعات</a></li>
              <li><a href="{{ route('list-born') }}">طلبات الولادة</a></li>
              <li><a href="{{ route('demande.index') }}">طلبات الغياب</a></li>
            </ul>
          </li>
              <li>
                <a href="{{ route('listWaitingEmployees') }}" style="display: flex; align-items: center; gap: 5px">
                    @if ($count > 0)
                        <span style="color: #ffc221">({{ $count }})</span> <i class='bx bx-envelope'></i>طلبات التسجيل
                    @else
                    <i class='bx bx-table'></i>
                    طلبات التسجيل
                    @endif
                </a>
            </li>
            <li><a href="{{ route('presence.list') }}"><i class='bx bxs-bell-plus' style='color:#ffffff'  ></i> لائحة الحظور</a></li>
            @endif
            @if (auth()->user()->role === 'employe')

            <li><a href="{{ route('add-post-blade') }}"><i class='bx bx-pencil' style='color:#ffffff'></i>إضافة منشور</a></li>

@php
    $absence = App\Models\DemandeAbsence::get();
    $born = App\Models\bornDemande::get();
    $device = App\Models\DevicesDemande::get();
    $fourniture = App\Models\FournitureDemande::get();
    $imprime = App\Models\ImprimeDemande::get();
    $license = App\Models\LicenceDemande::get();
    $plastique = App\Models\PlastiqueDemande::get();
    $demandeCount = $absence->count()+$born->count()+$device->count()+$fourniture->count()+$imprime->count()+$license->count()+$plastique->count();

@endphp
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-togglee" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="display: flex; align-items: center; gap: 5px">
                @if ($demandeCount > 0)
                <span style="color: #ffc221">({{ $demandeCount }})</span>
                <i class='bx bxs-down-arrow' style="font-size: 8px"></i>قائمة الطلبات
                @else
                    <i class='bx bxs-down-arrow' style="font-size: 8px"></i>
                    قائمة الطلبات
                @endif
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                  <a class="" href="{{ route('licence.show.employe') }}">
                    @if ($license->count() > 0)
                    <span style="color: #ffc221">({{ $license->count() }}) </span>طلبات رخصة إدارية
                    @else
                     طلبات رخصة إدارية
                    @endif
                  </a>
                </li>
                <li><a class="" href="{{ route('fourniture.show.employe') }}">
                  @if ($fourniture->count() > 0)
                  <span style="color: #ffc221">({{ $fourniture->count() }}) </span>طلبات أدوات المكتب
                  @else
                      طلبات أدوات المكتب
                  @endif
                </a></li>
                <li><a class="" href="{{ route('plastique.show.employe') }}">
                  @if ($plastique->count() > 0)
                  <span style="color: #ffc221">({{ $plastique->count() }}) </span>طلبات الطوابع المطاطية
                  @else
                  طلبات الطوابع المطاطية
                  @endif
                </a></li>
                <li><a href="{{ route('list.device.employe') }}">
                  @if ($device->count() > 0)
                  <span style="color: #ffc221">({{ $device->count() }}) </span>طلبات جهاز الحاسوب و الطابعات
                  @else
                  طلبات جهاز الحاسوب و الطابعات
                  @endif
                </a></li>
                <li><a href="{{ route('list.imprime.employe') }}">
                  @if ($imprime->count() > 0)
                  <span style="color: #ffc221">({{ $imprime->count() }}) </span>طلبات المطبوعات
                  @else
                  طلبات المطبوعات
                  @endif
                </a></li>
                <li><a href="{{ route('list.born.employe') }}">
                  @if ($born->count() > 0)
                  <span style="color: #ffc221">({{ $born->count() }}) </span>طلبات الولادة
                  @else
                  طلبات الولادة
                  @endif
                </a></li>
                <li><a href="{{ route('demande.index.employe') }}">
                  @if ($absence->count() > 0)
                  <span style="color: #ffc221">({{ $absence->count() }}) </span>طلبات الغياب
                  @else
                  طلبات الغياب
                  @endif
                </a></li>
              </ul>
            </li>





            <li class="nav-item dropdown">
              <a class="nav-link dropdown-togglee" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="display: flex; align-items: center; gap: 5px">
                <i class='bx bxs-down-arrow' style="font-size: 11px"></i>ملئ  طلب
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="" href="{{ route('licence.show') }}">طلب رخصة إدارية</a></li>
                <li><a class="" href="{{ route('fourniture.show') }}">طلب أدوات المكتب</a></li>
                <li><a class="" href="{{ route('plastique.show') }}">طلب الطوابع المطاطية</a></li>
                <li><a href="{{ route('device.show') }}">طلب جهاز الحاسوب و الطابعات</a></li>
                <li><a href="{{ route('imprime.show') }}">طلب المطبوعات</a></li>
                <li><a href="{{ route('born.show') }}">طلب الولادة</a></li>
                <li><a href={{ route('demande.show') }}>طلب الغياب</a></li>
              </ul>
            </li>


            <li><a href={{ route('message.gestion') }} style="display: flex; align-items: center; gap: 5px"><i class='bx bx-table'></i>تدبير الواردات</a></li>
            <li><a href={{ route('message.index') }} style="display: flex; align-items: center; gap: 5px"><i class='bx bx-envelope'></i>لائحة الواردات</a></li>
            <li><a href={{ route('message.add') }} style="display: flex; align-items: center; gap: 5px"><i class='bx bx-add-to-queue'></i>إظافة واردة</a></li>
            @endif
            <li><a href="/"><i class='bx bx-home' style='color:#003566;background: #ffc300; padding: 14px 14px; border-radius: 5px'  ></i></a></li>
            
          </ul>
      </div>
      </div>
</body>
</html>


