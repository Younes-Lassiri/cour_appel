<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إعادة تعيين كلمة المرور</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }
        .email-container {
            background-color: #ffffff;
            padding: 20px;
            max-width: 600px;
            margin: 50px auto;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: right;
        }
        .email-container h2 {
            color: #333333;
            text-align: center;
        }
        .email-container p {
            color: #666666;
        }
        .reset-link {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 10px;
            background-color: #003566;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            transition: .7s
        }
        .reset-link:hover {
            background-color: #00284d;
        }
        .logo {
            display: block;
            margin: 0 auto 20px;
            max-width: 150px;
        }
    </style>
</head>
<body>
    <div class="email-container" style="background-color: #ffffff;padding: 20px;max-width: 600px;margin: 50px auto;border-radius: 5px;box-shadow: 0 0 10px rgba(0,0,0,0.1);text-align: right;">
        <img src="https://imagetolink.com/ib/EoneAzZbpa.png" alt="شعار الموقع" class="logo">
        <h2>إعادة تعيين كلمة المرور</h2>
        <p>مرحباً،</p>
        <p>لقد طلبت إعادة تعيين كلمة المرور الخاصة بك. الرجاء الضغط على الرابط أدناه لإعادة تعيين كلمة المرور الخاصة بك:</p>
        <a href="{{ route('reset.email', $token) }}" class="reset-link" style="color: white">إعادة تعيين كلمة المرور</a>
        <p>إذا لم تطلب إعادة تعيين كلمة المرور، يرجى تجاهل هذا البريد الإلكتروني.</p>
        <p>شكراً،<br>فريق الدعم</p>
    </div>
</body>
</html>
