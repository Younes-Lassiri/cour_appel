<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>نافذة الحق</title>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="icon" href="/img/icon.ico">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="landing-sectionHeadO">
      
        <div class="head-one"><a href="/"><img src="/img/project_nameLight.png" alt=""></a></div>
        <div class="head-twoO"><span style="color: #ffbc2b">مَحكَمة الإسْتئنَاف </span>في خدمة المواطن</div>
        <div class="head-three"><img src="/img/newLight.png" alt=""></div>
    </div>

    <div class="stepOne-section">
        <div class="allSteps">

            <div class="allStepsOne" style="cursor: pointer">
                <div class="allStepsOneOne">استلام الوصل</div>
                <div class="allStepsOneTwoColor">5</div>
                <div class="allStepsOneThree">استلام الوصل</div>
            </div>


            
            <div class="stepsSeparatorColor" style="cursor: pointer">
                <div></div>
            </div>

            <div class="allStepsOne" style="cursor: pointer">
                <div class="allStepsOneOne">مراجعة البيانات</div>
                <div class="allStepsOneTwoColor">4</div>
                <div class="allStepsOneThree">تأكيد بيانات الطلب</div>
            </div>
            <div class="stepsSeparatorColor" style="cursor: pointer">
                <div></div>
            </div>
            <div class="allStepsOne" style="cursor: pointer">
                <div class="allStepsOneOne">المرفقات</div>
                <div class="allStepsOneTwoColor">3</div>
                <div class="allStepsOneThree">المرفقات الخاصة بالطلب</div>
            </div>
            <div class="stepsSeparatorColor" style="cursor: pointer">
                <div></div>
            </div>
            <div class="allStepsOne" style="cursor: pointer">
                <div class="allStepsOneOne">ملف القضية</div>
                <div class="allStepsOneTwoColor">2</div>
                <div class="allStepsOneThree">معلومات حول القضية</div>
            </div>
            <div class="stepsSeparatorColor" style="cursor: pointer">
                <div></div>
            </div>
            <div class="allStepsOne" style="cursor: pointer">
                <div class="allStepsOneOne">معلومات</div>
                <div class="allStepsOneTwoColor">1</div>
                <div class="allStepsOneThree">مقدم الطلب/المعني بالطلب</div>
            </div>
        </div>




        <div class="stepsIntroduction">
            <div class="stepsIntroductionOne"><img src="https://egrace.justice.gov.ma/assets/images/etapes/group_mizan.svg" alt=""></div>
            <div class="stepsIntroductionTwo">
                <div class="stepsIntroductionTwoOne"><div style="font-weight: 700;font-size: 14px">تعريف بالمرحلة</div>
                <div class="stepsIntroductionTwoOneNum">5</div></div>

                <div class="stepsIntroductionTwoTwo">تمكنكم هذه المرحلة من</div>

                <div class="stepsIntroductionTwoThree">
                    <div class="about">تحميل وصل الشكاية</div>
                    <div class="about"></div>
                </div>
            </div>

            <div class="stepsIntroductionThree"></div>
            
        </div>



        <div class="stepFiveInfos">
            
        <input type="hidden" value="{{ $suiviNum }}" name="suiviNum">
            <div class="stepFiveInfosOne">.تم تسجيل إجراءك بنجاح <i class='bx bx-check' style='color:#003566'  ></i></div>
            <div class="stepFiveInfosTwo">
                <div class="stepFiveInfosTwoOne">رقم طلبكم هو : {{ $suiviNum }}
                </div class="stepFiveInfosTwoTwo">
                <div>يرجى الاحتفاظ بهذا الرقم، سيكون لديك حاجة إليه لتتبع حالة معالجة الطلب</div>
            </div>
            <div class="stepInfosTheLastOne">
                <div class="stepInfosTheLastOneOne"><a href="{{ route('chikayaPdf', $suiviNum) }}"><button type="submit"><i class='bx bx-chevron-left'></i>تحميل الوصل</button></a></div>
            </div>
    </div>

    
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.title = document.title + ' - ' + 'ملئ طلب شكاية الخطوة 5';
    });
</script>
<x-foo_ter/>

</body>
</html>



