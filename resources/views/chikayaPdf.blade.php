<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>نافذة الحق</title>
    <link rel="stylesheet" href="{{ asset('public/css/main.css') }}">
    <link rel="icon" href="/img/icon.ico">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>



    <div class="chikayaPdf-section">

        <div></div>

        <div class="chikayaPdf-sectionMain">
            <div class="chikayaPdf-sectionMainOne">.تم تسجيل إجراءك بنجاح <i class='bx bx-check' style='color:#003566'  ></i></div>
            <div class="chikayaPdf-sectionMainTwo">
                <div class="">رقم طلبكم هو : {{ $suiviNum }}</div>
                <div>يرجى الاحتفاظ بهذا الرقم، سيكون لديك حاجة إليه لتتبع حالة معالجة الطلب</div>
            </div>
        </div>


        <div class="chikayaPdf-sectionMainThree">
            تم إنجازه بواسطة محكمة الاستئناف بالعيون | 2024
        </div>

    </div>
    
    <script>
        function openPrintView() {
            window.print();
            window.onafterprint = function () {
                window.close();
            }
        }
        window.onload = openPrintView;
    </script>

    
</body>
</html>
