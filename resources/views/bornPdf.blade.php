<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>طلب إجازة للغياب بسبب الولادة</title>
    <style>
        body{
            margin: 80px
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
    top: 280px;

}
.toPers1{
    top: 300px;

}
.toPers,.toPers1{
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    font-weight: 700;
    font-size: 20px
}
.one{
    position: absolute;
    top: 300px;
    right: 20px;
    font-weight: 400;
    margin-bottom: 2px;
    margin-top: 40px;
}
.onee{
    position: absolute;
    top: 310px;
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
    top: 350px;
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
            <p  class="part3">لدى محكمةالاستئناف بالعيون </p>
            <p  class="part4">رقم التأجير:<span>{{ $request->rental }} </span></p>
                </div>

        <span class="date">{{ str_replace('-', '/', explode(' ', $request->date)[0]) }} المدينة  بتاريخ </span>

        <h4 class="chikaya">الى</h4>


        <h4 class="modo3">السيد رئيس مصلحة كتابة النيابة العامة</h4>
         
<h4 class="to">تحت اشراف</h4>



<p class="toPers">السيد الوكيل العام للملك لدى محكمة الإستئناف </p>
<p class="toPers1">بالعيون</p>

<h4 class="one"><span style="font-weight: 700"> الموضوع:</span> طلب إجازة للغياب بسبب الولادة</h4>
<span style="font-weight: 700; position: absolute; right: 35%; top: 90px;">سلام تام بوجود مولانا الامام</span>



<span style="font-weight: 400; position: absolute; right: 20px; top: 430px">وبعد,</span>

<div style="width: 97%; position: absolute; left: 50%; top: 470px; transform: translateX(-50%); text-align: right">
    <p>
        <p style="padding-right: 40px;"><p  style="padding-right: 40px;">.أود أن أطلعكم على قراري بالغياب عن العمل لفترة محدودة بسبب الولادة </p>  من المتوقع أن تتم ولادة طفلي/طفلتي في {{ $request->born_date }}.

            بناءً على ذلك، أطلب منكم منحي إجازة لمدة {{ $request->born_duree }} يوما اعتبارًا من {{ str_replace('-', '/',$request->born_start) }}. 
            
            
<p style="padding-right: 40px;">           .أعتزم العودة إلى العمل يوم {{ str_replace('-', '/',$request->born_back) }}، بعد استكمال فترة  <br>
</p>            الإجازة
<p style="padding-right: 40px;">            .أشكركم مقدمًا على تفهمكم ودعمكم في هذه الفترة المهمة من حياتي الشخصية<br>
</p>        
    </p>

<br ><p style="text-align: center ;">وتقبلوا فائق التقدير والاحترام</p> <br>



<span style="font-weight: 700;margin-right: 80%" >والسلام</span>

<span style="font-weight: 700;margin-right: 80%"> امضاء</span><br>

<p style="margin-top:40px "> <strong style="padding-left:80px">اطلع عليه السيد الوكيل العام للملك</strong> <strong>  رئيس مصلحة كتابة النيابة العامة </strong></p>


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