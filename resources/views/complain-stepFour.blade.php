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
    
    <form action="{{ route('step5') }}" method="post" enctype="multipart/form-data">
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
                <div class="stepsSeparatorColor" style="cursor: pointer">
                    <div></div>
                </div>
                <div class="allStepsOne">
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
                    <div class="stepsIntroductionTwoOneNum">4</div></div>
    
                    <div class="stepsIntroductionTwoTwo">تمكنكم هذه المرحلة من إدخال معلومات حول</div>
    
                    <div class="stepsIntroductionTwoThree">
                        <div class="about">مراجعة البيانات</div>
                        <div class="about"></div>
                    </div>
                </div>
    
                <div class="stepsIntroductionThree"></div>
                
            </div>
    
    
        <div class="stepFourInfos">
            <div class="stepInfosOneThree">: المعني بالطلب</div>
    
            <div class="stepFourInfosOne">
                <div class="stepInfosTwoTwoThree">
                    <div class="stepInfosTwoTwoThreeTwo"><input type="text" class="" name="documentNum" value="{{ $requestData["documentNum"] }}"><label for="" class=""><span>*  </span>رقم وثيقة التعريف</label></div>
            </div>
            <div class="stepInfosTwoOneTwo">
                <input type="hidden" name="selectedDocument" id="selectedDocument" value="{{ $requestData["selectedDocument"] }}">
                <div class="dropdown theDropdownn">
                    <div class="dropdown-btn">{{ $requestData["selectedDocument"] }}</div>
                    <ul class="dropdown-list">
                        <li>بطاقة التعريف الوطنية</li>
                        <li>جواز السفر</li>
                        <li>بطاقة الإقامة</li>
                    </ul>
                    <label for="" class=""><span>*  </span>نوع وثيقة التعريف</label>
                </div>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                    const dropdownBtn = document.querySelector(".stepInfosTwoOneTwo .dropdown-btn");
                    const dropdownList = document.querySelector(".stepInfosTwoOneTwo .dropdown-list");
                    let inpDocument = document.querySelector('#selectedDocument')
                
                    dropdownBtn.addEventListener("click", function() {
                    dropdownList.style.display = dropdownList.style.display === "block" ? "none" : "block";
                    });
                
                    dropdownList.addEventListener("click", function(e) {
                    if (e.target.tagName === "LI") {
                    dropdownBtn.textContent = e.target.textContent;
                    dropdownBtn.classList.remove('notChoosed');
                    dropdownBtn.classList.add('choosed');
                    dropdownList.style.display = "none";
                    inpDocument.value = e.target.textContent;
                    
                    }
                    });
                    });
                </script>
            </div>
        <div class="stepInfosTwoTwoThree">
            <div class="stepInfosTwoTwoThreeTwo"><input type="text" class="" name="lastName" value="{{ $requestData["lastName"] }}"><label for="" class=""><span>*  </span>الإسم العائلي</label></div>
    </div>
    <div class="stepInfosTwoTwoThree">
        <div class="stepInfosTwoTwoThreeTwo"><input type="text" class="" name="firstName" value="{{ $requestData["firstName"] }}"><label for="" class=""><span>*  </span>الإسم الشخصي</label></div>
    </div>
            </div>
    
    
            <div class="stepInfosTwoOneFour">
                <div class="stepInfosTwoOneLastOne">
                    <div class="stepInfosTwoOneLastOneOne"><input type="email" class="" name="email" value="{{ $requestData["email"] }}"><label for="" class=""><span>*  </span>البريد الالكتروني</label></div>
                </div>
                
                
                
                <div class="stepInfosTwoOneLastOne">
                    <div class="stepInfosTwoOneLastOneOne"><input type="tel" class="" name="telephone" placeholder="(+212) 06-66-66-66-66" value="{{ $requestData["telephone"] }}"><label for="" class=""><span>*  </span>الهاتف</label></div>
                </div>
                
                
                <div class="stepInfosTwoOneLastOne">
                    <div class="stepInfosTwoOneLastOneOne"><input style="text-align: right" type="date" class="" name="dateNaissance" value="{{ $requestData["dateNaissance"] }}"><label for="" class=""><span>*  </span>تاريخ الازدياد</label></div>
                </div>
                <div class="stepInfosGenderStep">
                    <input type="hidden" name="chikayaGender" id="chikayaGender" value="{{ $requestData["chikayaGender"] }}">
                    <div class="dropdown theDropdownnn">
                        <div class="dropdown-btn">{{ $requestData["chikayaGender"] }}</div>
                        <ul class="dropdown-list">
                            <li>ذكر</li>
                            <li>أنثى</li>
                        </ul>
                        <label for="" class=""><span>*  </span>: الجنس</label>
                    </div>
                
                
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                        const dropdownBtn = document.querySelector(".stepInfosGenderStep .dropdown-btn");
                        const dropdownList = document.querySelector(".stepInfosGenderStep .dropdown-list");
                        let inpGender = document.querySelector('#chikayaGender')
                    
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
            </div>
            
    
            <div class="stepTwoInfosOne">
                <input type="hidden" name="sujet" id="" value="{{ $requestData["sujet"] }}">
                <input type="hidden" name="crimenalGender" id="crimenalGender" value="{{ $requestData["crimenalGender"] }}">
                    <div class="stepInfosGenderS">
                        <div class="dropdown theDropdownnnS">
                            <div class="dropdown-btn">{{ $requestData["crimenalGender"] }}</div>
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
                    <input type="hidden" name="selectedType" value="{{ $requestData["selectedType"] }}" id="">
    <input type="hidden" name="selectedNacio" value="{{ $requestData["selectedNacio"] }}" id="">
    <input type="hidden" name="cartNational" id="" value="{{ $imagePath }}">
    <input type="hidden" name="additionalImages" id="" value="{{ $imagePatha }}">
                    <div class="stepTwoInfosOneThreeOne"><input type="text" class="" name="lastNamec" value="{{ $requestData["lastNamec"] }}"><label for="" class="">الإسم العائلي</label></div>
                </div>
                
        
                <div class="stepTwoInfosOneThree">
                    <div class="stepTwoInfosOneThreeOne"><input type="text" class="" name="firstNamec" value="{{ $requestData["firstNamec"] }}"><label for="" class="">الإسم الشخصي</label></div>
                </div>
        
                    <div class="stepTwoInfosOneTwoFour">: المعني بالشكاية</div>
                </div>
                <div class="stepTwoInfosTwo">
                    <div class="attachment" onclick="showAttach()">
                        <div class="attachmentOne"><label for="" class="">المرفقات</label></div>
                    </div>
                    <div class="stepTwoInfosOneThree">
                        <div class="stepTwoInfosOneThreeOne"><input type="time" class="" name="time" style="letter-spacing: 2px" value="{{ $requestData["time"] }}"><label for="" class="">التوقيت التقريبي</label></div>
                    </div>
                    <div class="stepTwoInfosOneThree">
                        <div class="stepTwoInfosOneThreeOne"><input type="date" class="" name="date" style="letter-spacing: 2px" value="{{ $requestData["date"] }}"><label for="" class="">تاريخ الإعتداء</label></div>
                    </div>
                    <div class="stepTwoInfosOneTwoFour">: معلومات حول القضية</div>
                </div>
    
    
                <div class="stepInfosTheLastOne">
                    <div class="stepInfosTheLastOneOne"><button type="submit"><i class='bx bx-chevron-left'></i>تأكيد</button></div>
                </div>
    
        </div>
    
    </div>
    
</form>

<div class="attachmentImages">
    <div class="attachmentImagesOne">
        <img src="{{ asset('storage/'. $imagePath) }}" alt="">
    </div>
    <div class="attachmentImagesTwo">
        <img src="{{ asset('storage/'. $imagePatha) }}" alt="">
    </div>
</div>


<script>
    function showAttach(){
        let attach = document.querySelector('.attachmentImages');
    if (attach.style.display === 'none') {
        attach.style.display = 'grid';
    }else{
        attach.style.display = 'none';
    }
    }
</script>
<x-foo_ter/>
</body>
</html>






