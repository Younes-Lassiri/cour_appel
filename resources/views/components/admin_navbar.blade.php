@php
    $chikaya = App\Models\Complain::get();
    $absence = App\Models\DemandeAbsence::where('employe_name', auth()->user()->admin_name)->where('status','under review')->get();
    $born = App\Models\BornDemande::where('employe_name', auth()->user()->admin_name)->where('status','under review')->get();
    $device = App\Models\DevicesDemande::where('employe_name', auth()->user()->admin_name)->where('status','under review')->get();
    $fourniture = App\Models\FournitureDemande::where('employe_name', auth()->user()->admin_name)->where('status','under review')->get();
    $imprime = App\Models\ImprimeDemande::where('employe_name', auth()->user()->admin_name)->where('status','under review')->get();
    $license = App\Models\LicenceDemande::where('employe_name', auth()->user()->admin_name)->where('status','under review')->get();
    $plastique = App\Models\PlastiqueDemande::where('employe_name', auth()->user()->admin_name)->where('status','under review')->get();
    $demandeCount = $absence->count()+$born->count()+$device->count()+$fourniture->count()+$imprime->count()+$license->count()+$plastique->count();

@endphp

@php
    $absenceA = App\Models\DemandeAbsence::where('status', 'under review')->get();
    $bornA = App\Models\bornDemande::where('status', 'under review')->get();
    $deviceA = App\Models\DevicesDemande::where('status', 'under review')->get();
    $fournitureA = App\Models\FournitureDemande::where('status', 'under review')->get();
    $imprimeA = App\Models\ImprimeDemande::where('status', 'under review')->get();
    $licenseA = App\Models\LicenceDemande::where('status', 'under review')->get();
    $plastiqueA = App\Models\PlastiqueDemande::where('status', 'under review')->get();
    $demandeCountA = $absenceA->count()+$bornA->count()+$deviceA->count()+$fournitureA->count()+$imprimeA->count()+$licenseA->count()+$plastiqueA->count();

@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
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
              @if ($demandeCountA > 0)
              <span style="color: #ffc221">({{ $demandeCountA }})</span>
              <i class='bx bxs-down-arrow' style="font-size: 8px"></i>قائمة الطلبات
              @else
                  <i class='bx bxs-down-arrow' style="font-size: 8px"></i>
                  قائمة الطلبات
              @endif
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <a class="" href="{{ route('list-licence') }}">
                  @if ($licenseA->count() > 0)
                  <span style="color: #ffc221">({{ $licenseA->count() }}) </span>طلبات رخصة إدارية
                  @else
                   طلبات رخصة إدارية
                  @endif
                </a>
              </li>
              <li><a class="" href="{{ route('list-fourniture') }}">
                @if ($fournitureA->count() > 0)
                <span style="color: #ffc221">({{ $fournitureA->count() }}) </span>طلبات أدوات المكتب
                @else
                    طلبات أدوات المكتب
                @endif
              </a></li>
              <li><a class="" href="{{ route('list-plastique') }}">
                @if ($plastiqueA->count() > 0)
                <span style="color: #ffc221">({{ $plastiqueA->count() }}) </span>طلبات الطوابع المطاطية
                @else
                طلبات الطوابع المطاطية
                @endif
              </a></li>
              <li><a href="{{ route('list-device') }}">
                @if ($deviceA->count() > 0)
                <span style="color: #ffc221">({{ $deviceA->count() }}) </span>طلبات جهاز الحاسوب و الطابعات
                @else
                طلبات جهاز الحاسوب و الطابعات
                @endif
              </a></li>
              <li><a href="{{ route('list-imprime') }}">
                @if ($imprimeA->count() > 0)
                <span style="color: #ffc221">({{ $imprimeA->count() }}) </span>طلبات المطبوعات
                @else
                طلبات المطبوعات
                @endif
              </a></li>
              <li><a href="{{ route('list-born') }}">
                @if ($bornA->count() > 0)
                <span style="color: #ffc221">({{ $bornA->count() }}) </span>طلبات الولادة
                @else
                طلبات الولادة
                @endif
              </a></li>
              <li><a href="{{ route('demande.index') }}">
                @if ($absenceA->count() > 0)
                <span style="color: #ffc221">({{ $absenceA->count() }}) </span>طلبات الغياب
                @else
                طلبات الغياب
                @endif
              </a></li>
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
            <li>
              @if ($chikaya->count() > 0)
              <a href={{ route('listChikaya') }} style="display: flex; align-items: center; gap: 5px">
                <span style="color: #ffc221">({{ $chikaya->count() }})</span>
                <i class='bx bx-line-chart'></i> تدبير الشكايات</a>
              @else
              <a href={{ route('listChikaya') }} style="display: flex; align-items: center; gap: 5px">
                <i class='bx bx-line-chart'></i> تدبير الشكايات</a>
              @endif
              </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-togglee" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="display: flex; align-items: center; gap: 5px">
                <i class='bx bxs-down-arrow' style="font-size: 8px"></i>المنشورات
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdownPosts">
                <li><a href="{{ route('add-post-blade') }}" style="display: flex; align-items: center; gap: 5px;justify-content: end"><i class='bx bx-pencil' style='color:#ffffff'></i>إضافة منشور</a></li>
                <li><a href={{ route('gestionPosts') }} style="display: flex; align-items: center; gap: 5px;justify-content: end"><i class='bx bx-line-chart'></i>إدارة المنشورات</a></li>

              </ul>
            </li>
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


