<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="icon" href="/img/icon.ico">
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
    <div class="presenceSection">
        <div class="presenceHead">
            <div class="head-one">{{ str_replace('-', '/', explode(' ', $request->created_at)[0]) }} العيون بتاريخ</div>
            <div class="head-two"><img src="https://i.ibb.co/86kq4Mp/mhkama-removebg-preview-1.png" alt=""></div>
            <div class="head-three">من : {{ $request->employe_name }}</div>
        </div>

        <div class="presenceTitle">
            <div class="title-one">إلى</div>
            <div class="title-two">السيد رئيس مصلحة كتابة النيابة العامة</div>
            <div class="title-three">تحت إشراف</div>
            <div class="title-four">السيد الوكيل العام للملك لدى محكمة الإستئناف بالعيون</div>
        </div>



        <div class="presenceObject">
            <div class="object-one"><span style="font-weight: 700; color: black">الموظوع :</span> طلب رخصة غياب</div>
        </div>


        <div class="hey">
            <div class="hey-one">سلام تام بوجود مولانا الإمام</div>
        </div>

        <div class="then">
            <div class="then-one">،وبعد</div>
        </div>

        <div class="text">
            <div class="text-one">أتقدم بأسمى آيات التقدير والاحترام، وأود أن أبلغ سيادتكم بأنني لن أتمكن من حضور العمل في يوم {{ str_replace('-', '/', implode('/', array_reverse(explode('-', $request->df)))) }} بسبب {{ $request->reason }}. وبالتالي، أخطط للعودة إلى العمل في يوم {{ str_replace('-', '/', implode('/', array_reverse(explode('-', $request->dt)))) }}
                <br>

                .أرجو أن تتفهموا الأمر وتقبلوا اعتذاري، وأعدكم بأنني سأعوض عملي بأفضل شكل ممكن</div>
        </div>
        <div class="final">
            <div class="final-one">والسلام</div>
            <div class="final-two">شكرًا لتفهمكم وتقديركم للوضعية الحالية</div>
            
            
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