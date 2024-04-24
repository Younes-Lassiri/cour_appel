<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>نافذة الحق</title>
    <link rel="icon" href="/img/icon.ico">
    <link rel="stylesheet" href="/css/main.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

  <div class="landing-section">

    <x-landing-section_head />


  @if (session()->has('success'))
        <script>
            Swal.fire({
                position: "center-center",
                icon: "success",
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif


    <x-user_navbar/>

<div class="container intro">
    <div class="theOne">نافذة الحق</div>
    <div class="theTwo"><img src="https://www.mahakim.ma/assets/images/Line_L.svg" alt=""></div>


    <div class="theThree">منصة الموظفين الإكترونية</div>
    


    <div class="theFour"><img src="https://www.mahakim.ma/assets/images/Line_R.svg" alt=""></div>


    <div class="theFive"><span style="color: #ffc221; font-weight: 600">Justice-window.ma</span> الخدمات الإلكترونية المقدمة من طرف مَحكَمة الإسْتئنَاف عبر الموقع <br><span style="color: #ffc221; font-weight: 600">Justice-Window-Mobile</span> و التطبيق </div>



    
<div class="theSix">
  <div class="p1"></div>
  <div class="p2"></div>
  <div class="p3"></div>
</div>

<div class="searchInput">
  <div class="searchInputTwo"><button class="theSearchButton"><i class='bx bx-search' style="font-size: 20px"></i>بحث</button></div>
  <div class="searchInputOne"><input type="text" name="" id="" placeholder="...بحث سريع عن الخدمات الإلكترونية"></div>
</div>
</div>
</div>



<div class="services">
  <div class="">
 
   </div>
   <div class="">
 
   </div>

    
<a href="/طلب-شكاية" style="text-decoration: none">
  <div class="service animated">


    <div class="serviceOne">
     <div class="serviceImg"><img src="https://www.mahakim.ma/assets/images/register-commercial.svg" alt=""></div>
     <div class="serviceTitle">إرسال طلب شكاية</div>
     <div class="servicePara">هذه الخدمة تسمح لكم بتقديم طلب شكوى عن طريق الأنترنيت، وتتم العملية في بضع خطوات، تأكدوا من اتباع جميع مراحل الإجراء و تأكدوا من أن المعلومات التي تم تضمينها بالطلب صحيحة قبل تأكيد طلبكم.</div>
    </div>
 
     <div class="serviceButton"><button>← عرض الخدمة</button></div>
 
 
   </div>
 
</a>
  




  <a href="{{ route('complainSuivi') }}" style="text-decoration: none">
    <div class="service">


      <div class="serviceOne">
       <div class="serviceImg"><img src="https://www.mahakim.ma/assets/images/dossier-suivi.svg" alt=""></div>
       <div class="serviceTitle">تتبع طلب شكاية</div>
       <div class="servicePara">هذه الخدمة تسمح لكم بتتبع طلب شكاية عن طريق الأنترنيت، وتتم العملية في بضع خطوات، تأكدوا من اتباع جميع مراحل الإجراء و تأكدوا من أن المعلومات التي تم تضمينها بالطلب صحيحة قبل تأكيد طلبكم.</div>
      </div>
   
       <div class="serviceButton"><button>← عرض الخدمة</button></div>
   
   
     </div>
  </a>
  </div>











<div>
  <x-faqs/>
</div>


</div>

<x-foo_ter/>

    <script src="/js/main.js"></script>


    
</body>
</html>