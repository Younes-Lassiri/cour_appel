<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
</head>
<body>
    <p>Hello,</p>
    
    <p>You are receiving this email because we received a password reset request for your account.</p>
    <p>
        If you requested a password reset, please click the button below to reset your password:
        <br>
        <a href="{{ route('reset.email', $token) }}" target="_blank" style="display: inline-block; background-color: #4CAF50; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Reset Password</a>
    </p>
    
    <p>
        If you did not request a password reset, no further action is required. Please ignore this email.
    </p>
    
    <p>Thank you!</p>
</body>
</html>
