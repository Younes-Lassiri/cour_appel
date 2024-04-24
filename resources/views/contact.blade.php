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
  <div class="contact-section">
    <x-landing-section_head />
    <x-user_navbar/>
      </nav>

      <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb" class="breadCumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#" style="color: #212529; text-decoration: none"></a></li>
          <li class="breadcrumb-item"><a class="decoration" href="{{ route('contact') }}" style="color: #212529">إتصل بنا</a></li>
          <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('home') }}"><i class='bx bx-home' style='color:#212529; padding: 5px 5px; border-radius: 5px'  ></i></a></li>
        </ol>
      </nav>


    <div class="contact-container">
        <div class="contact-title">من أجل طلب التوضيحات المرجو الاتصال بنا</div>
        <div class="contact-desc">على العنوان التالي</div>
        <div class="contact-line"></div>
        <div class="contact-detail">
            <div class="detailPo">
                <div class="detailPoT">مَحكَمة الإسْتئنَاف : شارع سمارة، ص.ب 1015، العيون، المغرب</div>
                <div class="detailPoIcon"><i class='bx bx-map' style='color:#003566'  ></i></div>
            </div>
            <div class="tech">بالنسبة للأسئلة ذات الطابع التقني المرجو مراسلتنا على البريد التالي</div>
            <div class="deEmail">
                <div class="deEmailT">justice-window.support@justice.gov.ma</div>
                <div class="deEmailIcon">@</div>
            </div>
            <div class="dePhone">
                <div class="dePhoneT">+212 537 21 37 37</div>
                <div class="dePhoneIcon"><i class='bx bxs-phone-outgoing' style='color:#003566'></i></div>
            </div>
            <div class="contactCenter">مركز النداء</div>
            <div class="center-line"></div>

            <div class="deCenter">
                <div class="deCenterT">+212 537 26 66 00</div>
                <div class="deCenterIcon"><i class='bx bxs-phone-outgoing' style='color:#003566'></i></div>
            </div>
        </div>
        
    </div>
    </div>
    <x-foo_ter/>
    <script src="/js/main.js"></script>
</body>
</html>