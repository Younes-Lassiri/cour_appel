@php
    $notices = App\Models\Notice::get();
@endphp
@include('index')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>نافذة الحق</title>
    <link rel="icon" href="/img/icon.ico">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    
    
</head>
<body>


<div class="admin-signup-section">
    
    <x-landing-section_head />
    <x-admin_navbar :count="count($waitingEmploye)"/>
    <div class="adminCreationForm">
        <div class="adminCreationFormOne">
            <img src="/img/frame.svg" alt="">
        </div>


        <div class="adminCreationFormTwo">
            <h1>الإعدادات</h1>
            <div class="theErrorsSectionAlla">
                @if ($errors->any())
                    <div class="theErrorsSection">تعبئة أو اختيار كل حقول الإدخال باللون الأحمر</div>
                @endif
                </div>
        <form action={{ route('settings.update') }} method="POST">
            @csrf
            <div class="inputLabel">
                <input type="text" id="l" class="input-field @if ($errors->has('new_name')) errorInput @endif" name="new_name" onchange="handleCheck('l', 'm')" value="{{ old('new_name') }}" autocomplete="off">
                <label for="" class="input-label" id="m"><span>*  </span>الإسم الكامل الجديد</label>
            </div>
            <div class="inputLabel">
                <input type="text" id="t" class="input-field @if ($errors->has('new_email')) errorInput @endif" name="new_email" onchange="handleCheck('t', 'y')" value="{{ old('new_email') }}" autocomplete="off">
                <label for="" class="input-label" id="y"><span>*  </span>البريد الإلكتروني الجديد</label>
            </div>
            <div class="inputLabel">
                <input type="password" id="u" class="input-field" name="new_password" onchange="handleCheck('u', 'i')">
                <label for="" class="input-label" id="i"><span>*  </span>كلمة السر الجديدة</label>
            </div>
            @if($errors->has('new_password'))
                <span style="font-size: 13px">{{ $errors->first('new_password') }}</span>
            @endif
            
            <div class="inputLabel">
                <input type="password" id="o" class="input-field" name="new_password_confirmation" onchange="handleCheck('o', 'p')">
                <label for="" class="input-label" id="p"><span>*  </span>تأكيد كلمة السر</label>
            </div>

            <div style="margin-top: 30px">
                <button type="submit">حفظ</button>
            </div>
        </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.title = 'نافذة الحق' + ' - ' + 'الإعدادات';
    });
</script>

<x-foo_ter/>
    <script src="/js/main.js"></script>
</body>
</html>








