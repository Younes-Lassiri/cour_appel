<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>نافذة الحق</title>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="icon" href="/img/icon.ico">
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    
    <form action="{{ route('tryy') }}" method="post">
        @csrf
    <div>
        <div class="landing-sectionHeadO">
      
            <div class="head-one"><a href="/"><img src="/img/project_nameLight.png" alt=""></a></div>
            <div class="head-twoO"><span style="color: #ffbc2b">مَحكَمة الإسْتئنَاف </span>في خدمة المواطن</div>
            <div class="head-three"><img src="/img/newLight.png" alt=""></div>
        </div>
    
        <div class="stepOne-section">
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
                <div class="stepsSeparator">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <div class="allStepsOne">
                    <div class="allStepsOneOne">المرفقات</div>
                    <div class="allStepsOneTwo">3</div>
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
                    <div class="stepsIntroductionTwoOneNum">2</div></div>
    
                    <div class="stepsIntroductionTwoTwo">تمكنكم هذه المرحلة من إدخال معلومات حول</div>
    
                    <div class="stepsIntroductionTwoThree">
                        <div class="about">ملف القضية</div>
                        <div class="about"></div>
                    </div>
                </div>
    
                <div class="stepsIntroductionThree"></div>
                
            </div>
    
    
        <div class="stepTwoInfos">
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
    
    
    
            <div class="stepTwoInfosOne">
            <input type="hidden" name="crimenalGender" id="crimenalGender">
                <div class="stepInfosGenderS">
                    <div class="dropdown theDropdownnnS">
                        <div class="dropdown-btn notChoosed">إختار جنس المعني</div>
                        <ul class="dropdown-list">
                            <li>ذكر</li>
                            <li>أنثى</li>
                        </ul>
                        <label for="" class="">: الجنس</label>
                    </div>
                
                
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                        const dropdownBtn = document.querySelector(".stepInfosGenderS .dropdown-btn");
                        const dropdownList = document.querySelector(".stepInfosGenderS .dropdown-list");
                        let inpGender = document.querySelector('#crimenalGender')
                    
                        dropdownBtn.addEventListener("click", function() {
                        dropdownList.style.display = dropdownList.style.display === "block" ? "none" : "block";
                        });
                    
                        dropdownList.addEventListener("click", function(e) {
                        if (e.target.tagName === "LI") {
                        dropdownBtn.textContent = e.target.textContent;
                        dropdownBtn.classList.remove('notChoosed');
                        dropdownBtn.classList.add('choosed');
                        dropdownList.style.display = "none";
                        inpGender.value = e.target.textContent;
                        
                        }
                        });
                        });
                    
                        
                    
                    
                    
                    </script>
                </div>
    
    
            <div class="stepTwoInfosOneThree">
                <div class="stepTwoInfosOneThreeOne"><input type="text" class="" name="lastNamec" autocomplete="off"><label for="" class="">الإسم العائلي</label></div>
            </div>
            
    
            <div class="stepTwoInfosOneThree">
                <div class="stepTwoInfosOneThreeOne"><input type="text" class="" name="firstNamec" autocomplete="off"><label for="" class="">الإسم الشخصي</label></div>
            </div>
    
                <div class="stepTwoInfosOneTwoFour">: المعني بالشكاية</div>
            </div>
    
    
            <div class="stepTwoInfosTwo">
                <div></div>
                <div class="stepTwoInfosOneThree">
                    <div class="stepTwoInfosOneThreeOne"><input type="time" class="" name="time" style="letter-spacing: 2px"><label for="" class=""><span>*  </span>التوقيت التقريبي</label></div>
                </div>
                <div class="stepTwoInfosOneThree">
                    <div class="stepTwoInfosOneThreeOne"><input type="date" class="" name="date" style="letter-spacing: 2px"><label for="" class=""><span>*  </span>تاريخ الإعتداء</label></div>
                </div>
                <div class="stepTwoInfosOneTwoFour">: معلومات حول القضية</div>
            </div>
            <div class="stepTwoInfosThree">
                <div class="stepTwoInfosOneTwoFour">: ملاحظات</div>
                <div class="stepTwoInfosThreeTwo">
                    <textarea name="sujet" id="desc-textarea" cols="" rows=""></textarea>
                </div>
            </div>
    
    
            <div class="stepInfosTheLastOne">
                <div class="stepInfosTheLastOneOne"><button type="submit"><i class='bx bx-chevron-left'></i>متابعة</button></div>
            </div>
        </div>
    </div>
</form>
<x-foo_ter/>
<script>
    ClassicEditor
        .create( document.querySelector( '#desc-textarea' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

</body>
</html>



