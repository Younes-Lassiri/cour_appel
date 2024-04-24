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
    
    <form action="{{ route('try') }}" method="post">
        @csrf
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
            <div class="stepsSeparator">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="allStepsOne">
                <div class="allStepsOneOne">ملف القضية</div>
                <div class="allStepsOneTwo">2</div>
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
                <div class="stepsIntroductionTwoOneNum">1</div></div>

                <div class="stepsIntroductionTwoTwo">تمكنكم هذه المرحلة من إدخال معلومات حول</div>

                <div class="stepsIntroductionTwoThree">
                    <div class="about">مقدم الطلب</div>
                    <div class="about">المعني بالطلب</div>
                </div>
            </div>

            <div class="stepsIntroductionThree"></div>
            
        </div>



        <div class="stepInfos">
                    <div class="theErrorsSectionAll">
                    @if ($errors->any())
                        <div class="theErrorsSection">تعبئة أو اختيار كل حقول الإدخال باللون الأحمر</div>
                    @endif
                    </div>
            
            <div class="stepInfosOne">
                <div><input type="hidden" id="chikayaType" name="selectedType"></div>


                <div class="stepInfosOneTwo">
                    <div>شكايات الجيران</div>
                    <div class="custom-checkbox" data-name="type">
                        <input type="checkbox" id="myCheckbox" name="" value="شكايات الجيران">
                        <div class="custom-checkbox-inner @if ($errors->has('selectedType')) errorInputCheck @endif"></div>
                    </div>
                </div>
                
                <div class="stepInfosOneTwo">
                    <div>شكاية سرقة</div>
                    <div class="custom-checkbox" data-name="type">
                        <input type="checkbox" id="myCheckbox" name="" value="شكاية سرقة">
                        <div class="custom-checkbox-inner @if ($errors->has('selectedType')) errorInputCheck @endif"></div>
                    </div>
                </div>
                <div class="stepInfosOneTwo">
                    <div>شكاية ظرب أو جرج</div>
                    <div class="custom-checkbox" data-name="type">
                        <input type="checkbox" id="myCheckbox" name="" value="شكاية ظرب أو جرج">
                        <div class="custom-checkbox-inner @if ($errors->has('selectedType')) errorInputCheck @endif"></div>
                    </div>
                </div>

                <div class="stepInfosOneThree">: نوع الطلب</div>
            </div>



            <div class="stepInfosTwo">
                <div class="stepInfosOneThree">: المعني بالطلب</div>
                
                <input type="hidden" id="chikayaNacio" name="selectedNacio">
                <input type="hidden" id="chikayaDocument" name="selectedDocument" value="{{ old('selectedDocument') }}">
                <input type="hidden" name="chikayaGender" id="chikayaGender">
                <div class="stepInfosTwoTwo">

                    <div  class="stepInfosTwoTwoOne">
                        <div>أجنبي</div>
                        <div class="custom-checkboxNacio" data-name="type">
                            <input type="checkbox" id="myCheckbox" name="" value="أجنبي">
                            <div class="custom-checkbox-inner @if ($errors->has('selectedNacio')) errorInputCheck @endif"></div>
                        </div>
                    </div>

                    <div  class="stepInfosTwoTwoTwo">
                        <div>مغربي</div>
                        <div class="custom-checkboxNacio" data-name="type">
                            <input type="checkbox" id="myCheckbox" name="" value="مغربي">
                            <div class="custom-checkbox-inner @if ($errors->has('selectedNacio')) errorInputCheck @endif"></div>
                        </div>
                    </div>

                    <div class="stepInfosTwoTwoFive">: الجنسية</div>


                    <div class="stepInfosTwoTwoThree">
                            <div class="stepInfosTwoTwoThreeTwo"><input type="text" class="@error('lastName') errorInput @enderror" name="lastName" value="{{ old('lastName') }}"><label for="" class=""><span>*  </span>الإسم العائلي</label></div>
                    </div>
                    

                    <div class="stepInfosTwoTwoFour">
                        <div class="stepInfosTwoTwoThreeTwo"><input type="text" class="@error('firstName') errorInput @enderror"name="firstName" value="{{ old('firstName') }}"><label for="" class=""><span>*  </span>الإسم الشخصي</label></div>
                    </div>


                </div>




                <div class="stepInfosTwoOne">

                    <div class="stepInfosTwoOneOne">
                        <div class="stepInfosTwoOneOneOne"><input type="text" class="@error('documentNum') errorInput @enderror" name="documentNum" value="{{ old('documentNum') }}"><label for="" class=""><span>*  </span>رقم وثيقة التعريف</label></div>
                </div>

                
                    <div class="stepInfosTwoOneTwo">
                        <div class="dropdown stepInfosTwoOneTwoOne theDropdown @if ($errors->has('selectedDocument')) errorInput @endif">
                            <div class="dropdown-btn notChoosed">اختر وثيقة التعريف</div>
                            <ul class="dropdown-list">
                                <li>بطاقة التعريف الوطنية</li>
                                <li>جواز السفر</li>
                                <li>بطاقة الإقامة</li>
                            </ul>
                            <label for="" class=""><span>*  </span>نوع وثيقة التعريف</label>
                        </div>
                    </div>
                </div>


                <div class="stepInfosTwoOneLast">

<div class="stepInfosTwoOneLastOne">
    <div class="stepInfosTwoOneLastOneOne"><input type="email" class="@error('email') errorInput @enderror" name="email" value="{{ old('email') }}"><label for="" class=""><span>*  </span>البريد الالكتروني</label></div>
</div>



<div class="stepInfosTwoOneLastOne">
    <div class="stepInfosTwoOneLastOneOne"><input type="tel" class="@error('telephone') errorInput @enderror" name="telephone" placeholder="(+212) 06-66-66-66-66" value="{{ old('telephone') }}"><label for="" class=""><span>*  </span>الهاتف</label></div>
</div>


<div class="stepInfosTwoOneLastOne">
    <div class="stepInfosTwoOneLastOneOne"><input style="text-align: right" type="date" class="@error('dateNaissance') errorInput @enderror" name="dateNaissance" value="{{ old('dateNaissance') }}"><label for="" class=""><span>*  </span>تاريخ الازدياد</label></div>
</div>

<div class="stepInfosGender">
    <div class="dropdown theDropdown @if ($errors->has('chikayaGender')) errorInput @endif">
        <div class="dropdown-btn notChoosed">إختار جنس المعني</div>
        <ul class="dropdown-list">
            <li>ذكر</li>
            <li>أنثى</li>
        </ul>
        <label for="" class=""><span>*  </span>: الجنس</label>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const dropdownBtn = document.querySelector(".stepInfosGender .dropdown-btn");
            const dropdownList = document.querySelector(".stepInfosGender .dropdown-list");
            const inpGender = document.querySelector('#chikayaGender');
    
            const savedGender = localStorage.getItem("inpGender");
            if (savedGender) {
                dropdownBtn.textContent = savedGender;
                dropdownBtn.classList.remove('notChoosed');
                dropdownBtn.classList.add('choosed');
                inpGender.value = savedGender;
            }
    
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
                    localStorage.setItem("inpGender", e.target.textContent);
                }
            });
        });
    </script>
    
</div>


                </div>


            </div>



            <div class="stepInfosTheLastOne">
                <div class="stepInfosTheLastOneOne"><button type="submit"><i class='bx bx-chevron-left'></i>متابعة</button></div>
                <div class="stepInfosTheLastOneTwo"><a href="/طلب-شكاية"><button type="button">رجوع<i class='bx bx-chevron-right'></i></button></a></div>
            </div>
            
        </div>
    </div>
    
</form>

<x-foo_ter/>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
        const checkboxes = document.querySelectorAll('.custom-checkbox input[type="checkbox"]');
        const hiddenInput = document.getElementById("chikayaType");
        
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener("change", function() {
            const groupName = this.closest('.custom-checkbox').dataset.name;
            checkboxes.forEach(function(otherCheckbox) {
                if (otherCheckbox.closest('.custom-checkbox').dataset.name === groupName && otherCheckbox !== checkbox) {
                otherCheckbox.checked = false;
                }
            });
            if (checkbox.checked) {
                hiddenInput.value = checkbox.value;
            } else {
                hiddenInput.value = '';
            }
            });
        });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
        const checkboxes = document.querySelectorAll('.custom-checkboxNacio input[type="checkbox"]');
        const hiddenInput = document.getElementById("chikayaNacio");
        
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener("change", function() {
            const groupName = this.closest('.custom-checkboxNacio').dataset.name;
            checkboxes.forEach(function(otherCheckbox) {
                if (otherCheckbox.closest('.custom-checkboxNacio').dataset.name === groupName && otherCheckbox !== checkbox) {
                otherCheckbox.checked = false;
                }
            });
            
            if (checkbox.checked) {
                hiddenInput.value = checkbox.value;
            } else {
                hiddenInput.value = '';
            }
            });
        });
        });
    </script>




<script>
    document.addEventListener("DOMContentLoaded", function() {
        const dropdownBtn = document.querySelector(".dropdown-btn");
        const dropdownList = document.querySelector(".dropdown-list");
        const inpDocument = document.querySelector('#chikayaDocument');
        
        const savedDocument = localStorage.getItem("inpDocument");
        if (savedDocument) {
            dropdownBtn.textContent = savedDocument;
            dropdownBtn.classList.remove('notChoosed');
            dropdownBtn.classList.add('choosed');
            inpDocument.value = savedDocument;
        }

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
                localStorage.setItem("inpDocument", e.target.textContent);
            }
        });
    });
</script>

</body>
</html>



