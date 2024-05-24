<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>نافذة الحق</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="icon" href="/img/icon.ico">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    
<form action="{{ route('step4') }}" enctype="multipart/form-data" method="post">
    @csrf
    <div class="landing-sectionHeadO">
      
            <div class="head-one"><a href="/"><img src="/img/project_nameLight.png" alt=""></a></div>
            <div class="head-twoO"><span style="color: #ffbc2b">مَحكَمة الإسْتئنَاف </span>في خدمة المواطن</div>
            <div class="head-three"><img src="/img/newLight.png" alt=""></div>
    </div>
    
    <div class="stepOne-sectionUpload">
        <div class="allSteps">
    
                <div class="allStepsOne">
                    <div class="allStepsOneOne">استلام الوصل</div>
                    <div class="allStepsOneTwo">5</div>
                    <div class="allStepsOneThree">استلام الوصل</div>
                </div>
                <div class="stepsSeparator">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <div class="allStepsOne">
                    <div class="allStepsOneOne">مراجعة البيانات</div>
                    <div class="allStepsOneTwo">4</div>
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
                    <div class="stepsIntroductionTwoOneNum">3</div></div>
    
                    <div class="stepsIntroductionTwoTwo">تمكنكم هذه المرحلة من إدخال معلومات حول</div>
    
                    <div class="stepsIntroductionTwoThree">
                        <div class="about">المرفقات</div>
                        <div class="about"></div>
                    </div>
                </div>
    
                <div class="stepsIntroductionThree"></div>
                
        </div>
    <div class="stepThreeInfos">
            <input type="hidden" name="selectedType" value="{{ $requestData["selectedType"] }}" id="">
            <input type="hidden" name="selectedNacio" value="{{ $requestData["selectedNacio"] }}" id="">
            <input type="hidden" name="selectedDocument" value="{{ $requestData["selectedDocument"] }}" id="">
            <input type="hidden" name="chikayaGender" value="{{ $requestData["chikayaGender"] }}" id="">
            <input type="hidden" name="lastName" value="{{ $requestData["lastName"] }}" id="">
            <input type="hidden" name="firstName" value="{{ $requestData["firstName"] }}" id="">
            <input type="hidden" name="documentNum" value="{{ $requestData["documentNum"] }}" id="">
            <input type="hidden" name="email" value="{{ $requestData["email"] }}" id="">
            <input type="hidden" name="telephone" value="{{ $requestData["telephone"] }}" id="">
            <input type="hidden" name="dateNaissance" value="{{ $requestData["dateNaissance"] }}" id="">
            <input type="hidden" name="crimenalGender" id="" value="{{ $requestData["crimenalGender"] }}">
            <input type="hidden" name="lastNamec" id="" value="{{ $requestData["lastNamec"] }}">
            <input type="hidden" name="sujet" id="" value="{{ $requestData["sujet"] }}">
            <input type="hidden" name="firstNamec" id="" value="{{ $requestData["firstNamec"] }}">
            <input type="hidden" name="date" id="" value="{{ $requestData["date"] }}">
            <input type="hidden" name="time" id="" value="{{ $requestData["time"] }}">
            
            <div class="stepThreeInfosOne">
                <div class="stepThreeInfosOneOne">
                    <input type="file" name="carteNacional" id="" required>
                </div>
    
                <div class="stepThreeInfosOneTwo">
                    <label for="">(الواجهة الأمامية) صورة البطاقة الوطنية</label>
                </div>
    
    
                <div class="stepThreeInfosOneThree"><i class='bx bx-cloud-upload' style='color:#003566'  ></i></div>
            </div>
    
    
    
            <div class="stepThreeInfosOne">
                <div class="stepThreeInfosOneOne">
                    <input type="file" name="additionalImages" id="carteNacio" required>
                </div>
                <div class="stepThreeInfosOneTwo">
                    <label for="">(الواجهة الخلفية) صورة البطاقة الوطنية</label>
                </div>
    
    
                <div class="stepThreeInfosOneThree"><i class='bx bx-cloud-upload' style='color:#003566'  ></i></div>
            </div>
    
            <div class="stepInfosTheLastOne">
                <div class="stepInfosTheLastOneOne"><button type="submit"><i class='bx bx-chevron-left'></i>متابعة</button></div>
            </div>
    </div>
    </div>
</form>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.title = document.title + ' - ' + 'ملئ طلب شكاية الخطوة 3';
    });
</script>
<x-foo_ter/>
</body>
</html>



