<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تفعيل الحساب</title>
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
        .validate-link {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 10px;
            background-color: #007bff;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
        }
        .validate-link:hover {
            background-color: #0056b3;
        }
        .logo {
            display: block;
            margin: 0 auto 20px;
            max-width: 150px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <img src="https://imagetolink.com/ib/EoneAzZbpa.png" alt="شعار الموقع" class="logo">
        <h2>تفعيل الحساب</h2>
        <p>مرحباً،</p>
        <p>شكراً لتسجيلك في موقعنا. يرجى الضغط على الرابط أدناه لتفعيل حسابك والتمكن من تسجيل الدخول:</p>
        <a href="{{ route('validate-account', $id) }}" class="validate-link" style="display: block; width: 200px; margin: 20px auto; padding: 10px; background-color: #007bff; color: white; text-align: center; text-decoration: none; border-radius: 5px;">تفعيل الحساب</a>
        <p>إذا لم تقم بالتسجيل في موقعنا، يرجى تجاهل هذا البريد الإلكتروني.</p>
        <p>شكراً،<br>فريق الدعم</p>
    </div>
</body>
</html>
