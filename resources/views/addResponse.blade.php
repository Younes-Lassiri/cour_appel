<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>نافذة الحق</title>
    <link rel="icon" href="/img/icon.ico">
    <link rel="stylesheet" href="/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <div class="addMessage">


        
        
        <x-landing-section_head />

        <x-admin_navbar/>
        <div class="formSection">
            <h1>إضافة صادرة</h1>
            
            <span style="font-size: 12px">(*) يجب ملء الخانات التي تحتوي على</span>
            <form action={{ route('response.create') }} method="POST">
                @csrf
                <div class="inputLabel">
                    <label for="" class="" id=""><span> </span>رقم الرسالة</label><br>
                    <input type="number" id="allInputs1" class="input-field" value="{{ $message->message_number }}" readonly>
                    
                </div>
                <div >
                <div class="inputLabel">
                    <label for="" class="" id="issue2"><span>  </span>إسم المرسِل</label><br>
                    <input type="text" id="allInputs2" class="input-field" value="{{ $message->sender_name }}" readonly>
                    
                </div>
                <div class="inputLabel">
                    <label for="" class="" id="select"><span> </span>موطن المرسِل</label><br>
                    <input type="text" id="allInputs2" class="input-field" value="{{ $message->sender_city }}" readonly>

                </div>
                <div class="inputLabel my-3">
                    <label for="" class="" id=""><span>  </span>الموضوع</label><br>
                    <input type="text" id="allInputs3" class="input-field" value="{{ $message->message_object }}" readonly>
                    
                </div>


        <input type="hidden" name="message_id" value="{{ $id }}">


        <div class="inputLabel my-3">
            <input type="text" id="a" class="input-field @if ($errors->has('response_source')) errorInput @endif" name="response_source" onchange="handleCheck('a','z')" value="{{ old('response_source') }}">
            <label for="" class="input-label" id="z"><span>*  </span>المصدر و الجواب</label>
        </div>
        <div class="inputLabel my-3">
            <input type="text" id="b" class="input-field @if ($errors->has('response_result')) errorInput @endif" name="response_result" onchange="handleCheck('b','n')" value="{{ old('response_result') }}">
            <label for="" class="input-label" id="n"><span>*  </span>النتيجة</label>
        </div>

            <div>
                <button type="submit">حفظ</button>
            </div>
            </form>
            </div>
    </div>

    <div>
    <x-foo_ter/>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.title = document.title + ' - ' + 'إضافة صادرة';
        });
    </script>

    <script src="/js/main.js"></script>
</body>
</html>