<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نافذة الحق</title>
    <link rel="icon" href="/img/icon.ico">
    <link rel="stylesheet" href="path/to/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="suiviSection">
        <div class="landing-sectionHeadO">
            <div class="head-one"><a href="/"><img src="/img/project_nameLight.png" alt=""></a></div>
            <div class="head-twoO"><span style="color: #ffbc2b">مَحكَمة الإسْتئنَاف </span>في خدمة المواطن</div>
            <div class="head-three"><img src="/img/newLight.png" alt=""></div>
        </div>
        <form action="{{ route('complainSuivip') }}" method="POST">
            @csrf
            <div class="suiviSectionTwo">
                <div class="suiviSectionTwoOne">
                    <div class="suiviSectionTwoOneOne"></div>
                    <div class="suiviSectionTwoOneTwo">: رقم الطلب</div>
                    <div class="suiviSectionTwoOneThree">
                        <div class="suiviSectionTwoOneThreeOne"><button type="submit" class="sbutton">بحث</button></div>
                        <div class="suiviSectionTwoOneThreeTwo"><input type="number" name="sn" value="{{ session()->has('sn')? session('sn') : '' }}"></div>
                    </div>
                    <div class="suiviSectionTwoOneThreeOneTwo">
                        @if (session()->has('status'))
                            <h1>{{ session('status') }}</h1>
                        @endif
                    </div>
                </div>
                <div class="suiviSectionTwoTwo">
                    <div class="suiviSectionTwoTwoOne"><img src="https://egrace.justice.gov.ma/assets/images/etapes/group_mizan.svg" alt=""></div>
                    <div class="suiviSectionTwoTwoTwo"><div class="suiviText">تتبع الطلب</div></div>
                </div>
            </div>
        </form>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.title = document.title + ' - ' + 'تتبع طلب';
        });
    </script>
</body>
</html>