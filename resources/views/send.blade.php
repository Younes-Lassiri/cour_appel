<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@400;700&display=swap" rel="stylesheet">
  <style>
    .reset-email-div{
        display: grid;
        grid-auto-columns: 1fr;
        grid-auto-rows: 1fr 1fr 1fr 1fr 1fr;
        width: 45%;
        height: 70vh;
        margin: 0 auto;
    }
    .reset-email-divOne{
        text-align: center;
        height: 100px;
    }
    .reset-email-divOne img{
        width: 29%;
        height: 115%
    }
    .reset-email-divTwo{
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 15px;
        position: relative;
    }

    .reset-email-divTwo span{
        position: absolute;
        left: 50%;
        transform: translateX(-50%)
    }
    
    .slogan{
        width: 20px;
        height: 20px;
        background: #24b4fb;
        border-radius: 50%;
        color: #fff;
        font-weight: 600

    }
    .reset-email-divThree{
        text-align: right;
        direction: rtl;
        font-size: 18px;
        color: #000009;
        font-weight: 400;
        padding: 30px
    }
    .reset-email-divFour{
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }
    .theA{
        padding: 15px 25px;
        border-radius: 4px;
        background: #24b4fb;
        text-decoration: none;
        color: #fff;
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
    }
    .reset-email-divFive{
        text-align: right;
        direction: rtl;
        font-size: 15px;
        color: #f44336;
        font-weight: 400;
        padding: 25px
    }
  </style>
</head>
<body>
    <div class="reset-email-div">
        <div class="reset-email-divOne"><img src="https://imagetolink.com/ib/EoneAzZbpa.png" alt=""></div>
        <div class="reset-email-divTwo"><span class="slogan">Y</span><span>{{ $email }}</span></div>
        <div class="reset-email-divThree">تم طلب اعادة تغيير كلمة المرور باستعمال بريدك الاكتروني
            اذا كنت انت من قام بالطلب المرجو الظغط على الزر واتباع خطوات تغيير كلمة المرور</div>
        <div class="reset-email-divFour">
            <a href="{{ route('reset.email', $token) }}" class="theA">تعديل كلمة المرور</a>
        </div>
        <div class="reset-email-divFive">
            إذا لم تقم بطلب إعادة تعيين كلمة المرور، فلا حاجة لاتخاذ أي إجراء إضافي. يرجى تجاهل هذا البريد الإلكتروني. <br>شكرًا لك!
        </div>
    </div>
</body>
</html>