<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
        <div class='faq'>
          <input id='faq-a' type='checkbox' onchange="changeI(this.id,'four')">
          <label for='faq-a'>
            <div class="faqhIcon">
              <div class='faqPlus' id="four"><i class='bx bx-plus' style="font-size: 30px;font-weight: 500"></i></div>
              <div class="faqPara"><p class="faq-heading">ماهي أنواع الملفات التي يمكن تتبعها عبر خدمة تتبع الملفات؟</p></div>
            
            </div>
              <p class="faq-text">تمكن خدمة تتبع الملفات القضائية المدنية والجنائية وملفات التبليغ والتنفيذ وكذا ملفات التحصيل المتعلقة بسير القضية.</p>
          </label>

            <input id='faq-b' type='checkbox' onchange="changeI(this.id,'three')">
            <label for='faq-b'>
              <div class="faqhIcon">
                <div class='faqPlus' id="three"><i class='bx bx-plus' style="font-size: 30px;font-weight: 500"></i></div>
                <div class="faqPara"><p class="faq-heading">ماهي أنواع الملفات التي يمكن تتبعها عبر خدمة تتبع الملفات؟</p></div>
              
              </div>
                <p class="faq-text">تمكن خدمة تتبع الملفات القضائية المدنية والجنائية وملفات التبليغ والتنفيذ وكذا ملفات التحصيل المتعلقة بسير القضية.</p></p>
            </label>
            <input id='faq-c' type='checkbox' onchange="changeI(this.id,'two')">
            <label for='faq-c'>
              <div class="faqhIcon">
                <div class='faqPlus' id="two"><i class='bx bx-plus' style="font-size: 30px;font-weight: 500"></i></div>
                <div class="faqPara"><p class="faq-heading">كيف يمكنني الحصول على رقم الملف؟</p></div>
              
              </div>
                <p class="faq-text">رقم الملف معلومة خاصة وليست للعموم ويمكن فقط لأطراف الملف الحصول عليها. ويمكن الحصول عليها من خلال التواصل مع مصلحة رئاسة كتابة الضبط بالمحكمة التي تم فيها فتح الملف</p>
            </label>
            <input id='faq-d' type='checkbox' onchange="changeI(this.id,'one')">
            <label for='faq-d'>
              <div class="faqhIcon">
                <div class='faqPlus' id="one"><i class='bx bx-plus' style="font-size: 30px;font-weight: 500"></i></div>
                <div class="faqPara"><p class="faq-heading">كيف يمكنني الحصول على رقم الملف؟</p></div>
              
              </div>
                <p class="faq-text">رقم الملف معلومة خاصة وليست للعموم ويمكن فقط لأطراف الملف الحصول عليها. ويمكن الحصول عليها من خلال التواصل مع مصلحة رئاسة كتابة الضبط بالمحكمة التي تم فيها فتح الملف</p>
            </label>
      <script>
        function changeI(id, idd){
        let checkbox = document.getElementById(id)
        let icon = document.querySelector(`#${idd} i`);
        if (checkbox.checked) {
          icon.classList.remove('bx-plus');
          icon.classList.add('bx-minus');
          icon.style.backgroundColor = 'rgb(238, 238, 238)';
          icon.style.borderColor = '#ffbc2b';
          icon.style.color = '#ffbc2b';
        } else {
          icon.classList.remove('bx-minus');
          icon.classList.add('bx-plus');
          icon.style.backgroundColor = '';
          icon.style.borderColor = '';
          icon.style.color = '';
        }
        }
      </script>
      
</body>
</html>