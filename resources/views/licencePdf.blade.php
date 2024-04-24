<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>طلب رخصة ادارية و مغادرة التراب الوطني</title>
    <style>
        body{
            margin: 30px
        }
        *{
            padding: 0;
            margin: 0;
            font-size: 25px
        }
        @media print {
    @page {
        margin: 0;
    }

    @page {
        margin-top: 10 !important;
        margin-bottom: 0 !important;
    }
    button{
        display: none
    }
}

.date{
    position: absolute;
    top: 45px;
    left: 20px
}

.chikaya{
    position: absolute;
    top: 130px;
    left: 50%;
    transform: translateX(-50%);
    font-weight: 700;
    font-size: 25px
}

.modo3{
    position: absolute;
    top: 180px;
    left: 50%;
    transform: translateX(-50%);
    font-weight: 700;
    font-size: 20px
}

.to{
    position: absolute;
    top: 230px;
    left: 50%;
    transform: translateX(-50%);
    font-weight: 600;
    font-size: 20px
}

.toPers{
    position: absolute;
    top: 280px;
    left: 50%;
    transform: translateX(-50%);
    font-weight: 700;
    font-size: 20px
}
.one{
    position: absolute;
    top: 340px;
    right: 20px;
    font-weight: 400;
    margin-bottom: 2px;
    margin-top: 40px;
}
.onee{
    position: absolute;
    top: 350px;
    right: 20px;
    font-weight: 400
}
.part3{
    top: 80px
}.part1{
    top: 20px
}
.part4{
    top: 110px
}

.part2 {

    top: 50px;

}
.part1,.part2 ,.part3 ,.part4{
    position: absolute;
    right: 20px;
    font-weight: 400
}
.oneee{
    position: absolute;
    top: 390px;
    right: 20px;
    font-weight: 400
}


    </style>
</head>
<body>
    <div style="position: relative">
        <div >
            <p  class="part1" >من : <span>{{ $request->employe_name }}</span></p>
            <span  class="part2">{{ $request->work_type }}</span>
            <p  class="part3">لدى محكمةالاستئناف بالعيون</p>
            <p  class="part4">رقم التأجير: <span>{{ $request->rental }}</span></p>
                </div>

        <span class="date"> {{ implode('/', explode('-', $request->send_date)) }}
            المدينة  بتاريخ </span>

        <h4 class="chikaya">الى</h4>


        <h4 class="modo3">السيد رئيس مصلحة كتابة النيابة العامة</h4>
         
<h4 class="to">تحت اشراف</h4>




<p class="toPers">السيد الوكيل العام للملك لدى محكمة الإستئناف بالعيون</p>

<h4 class="one"><span style="font-weight: 700"> الموضوع:</span> طلب رخصة إدارية</h4>
<span style="font-weight: 700; position: absolute; right: 35%; top: 430px;">سلام تام بوجود مولانا الامام</span>



<span style="font-weight: 400; position: absolute; right: 20px; top: 470px">وبعد,</span>

<div style="width: 97%; position: absolute; left: 50%; top: 510px; transform: translateX(-50%); text-align: right">
    <p>
        <p style="padding-right: 40px;">علاقة بالموضوع الموما اليه  اعلاه, يشرفني أن اطلب من سيادتكم تمكيني من<br></p> الاستفادة من رخصتي الادارية عن سنة <span> {{ $request->licence_date}} </span>وامدها <span> {{ $request->licence_duree }} يوما </span>وكدا الإذن بمغادرة <br> التراب الوطني وذلك ابتداء من تاريخ {{ implode('/', explode('-', $request->send_date)) }}
        
    </p>

<br ><p style="text-align: center ;">وتقبلوا فائق التقدير والاحترام</p> <br>



<span style="font-weight: 700;margin-right: 80%" >والسلام</span>

<span style="font-weight: 700;margin-right: 80%"> امضاء</span><br>

<p style="margin-top:80px "> <strong style="padding-left:80px">اطلع عليه السيد الوكيل العام للملك</strong> <strong>  رئيس مصلحة كتابة النيابة العامة </strong></p>


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