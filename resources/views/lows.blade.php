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
    <x-landing-section_head />
    <x-user_navbar/>
    <div class="categorieSection">
        <div class="categorieSectionOne">
            <nav style="" aria-label="breadcrumb" class="breadCumb">
                <ol class="breadcrumb" style="padding: 14px 0 0 0">
                    <li class="breadcrumb-item" style="color: #ffbc2b;font-weight: bold; font-size: 15px">
                      مشاريع قوانين
                    </li>
                  <li class="breadcrumb-item" style="color: #809AB3;font-weight: bold; font-size: 15px">
                    التشريعات والاجتهادات
                  </li>
                  <li class="breadcrumb-item" style="color: #809AB3;font-weight: bold; font-size: 15px">
                    القوانين والتشريعات
                  </li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('home') }}"><i class='bx bx-home' style='color:#809AB3; padding: 2px 2px; border-radius: 5px'  ></i></a></li>
                </ol>
              </nav>
        </div>
        <div class="categorieSectionTwo">
            <div class="categorieSectionTwoOneLows">
                <div class="categorieSectionTwoOneLowsOne">مشاريع النصوص القانونية المحالة إلى البرلمان (3)</div>
                <div class="categorieSectionTwoOneLowsTwo">
                    مشروع القانون التنظيمي رقم 86.15 المتعلق بتحديد شروط وإجراءات الدفع بعدم دستورية قانون، بعد ترتيب الآثار على قرار المحكمة الدستورية عدد 70.18 بتاريخ 6 مارس 2018
                </div>
                <div class="categorieSectionTwoOneLowsTwo">
                    مشروع قانون رقم 95.17 يتعلق بالتحكيم والوساطة الاتفاقية.
                </div>
                <div class="categorieSectionTwoOneLowsTwo">
                    مشروع قانون رقم 38.15 يتعلق بالتنظيم القضائي بعد ترتيب الآثار القانونية على قرار المحكمة الدستوريةرقم 19.89 م. د. المؤرخ في2 من جمادى الآخرة 1440(8 فبراير 2019).
                </div>

                <div class="categorieSectionTwoOneLowsOne" style="margin-top: 60px">
                    مشاريع النصوص القانونية والتنظيمية المحالة إلى الأمانة العامة للحكومة
                </div>
                <div class="lowsTitle">
                    مشاريع قوانين <span style="color: #ffbc2b;font-weight: 800">(7)</span>
                </div>
                <div class="categorieSectionTwoOneLowsTwo">
                    مشروع قانون تنظيمي بتغيير وتتميم القانون التنظيمي رقم 100.13 المتعلق بالمجلس الأعلى للسلطة القضائية
                </div>
                <div class="categorieSectionTwoOneLowsTwo">
                    مشروع قانون تنظيمي بتغيير وتتميم القانون التنظيمي رقم 106.13 المتعلق بالنظام الأساسي للقضاة
                </div>
                <div class="categorieSectionTwoOneLowsTwo">
                    مشروع قانون بتغيير وتتميم الظهير الشريف بمثابة قانون رقم 1.74.467 بتاريخ 26 شوال 1394 (11 نونبر 1974)يكون النظام الأساسي لرجال القضاء.
                </div>
                <div class="categorieSectionTwoOneLowsTwo">
                    مشروع قانون رقم 27.21 يتعلق برقمنة الإجراءات القضائية.
                </div>
                <div class="categorieSectionTwoOneLowsTwo">
                    مشروع قانون رقم 16.03 يتعلق بتنظيم مهنة العدول.
                </div>
                <div class="categorieSectionTwoOneLowsTwo">
                    مشروع قانون رقم 21.46 يتعلق بمهنة المفوضين القضائيين.
                </div>
                <div class="categorieSectionTwoOneLowsTwo">
                    مشروع قانون يتعلق "بالمعهد الوطني للمهن القانونية وكتابة الضبط".
                </div>
                <div class="categorieSectionTwoOneLowsTwo">
                    مسودة مشروع قانون المسطرة المدنية
                </div>
                <div class="categorieSectionTwoOneLowsTwo">
                    مشروع قانون يتعلق بالمعهد العالي للقضاء.
                </div>
            </div>
            <div class="detailPost-sectionThree">
                <div class="lowsOne" onclick="showLows()">
                    <div class="lowsOneOne"><i class='bx bx-chevron-down dropLogo' style='color:#333943;font-size: 25px'  ></i></div>
                    <div class="lowsOneTwo">التشريعات والاجتهادات</div>
                </div>
                <div class="lowsDropdown">
                    <div class="lowsOne lowsActive">
                        <div class="lowsOneOne"></div>
                        <div class="lowsOneTwo"><a href="{{ route('lows') }}">مشاريع قوانين</a></div>
                    </div>
                    <div class="lowsOne lowsActivee">
                        <div class="lowsOneOne"></div>
                        <div class="lowsOneTwo"><a href="{{ route('lowsnew') }}" style="color: #809AB3;font-size: 16px; font-weight: 400">التشريعات الصادرة حديثاً</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-foo_ter/>
    <script>
        function showLows() {
        let dropLogo = document.querySelector('.dropLogo');
        let theLows = document.querySelector('.lowsDropdown');
        
        let computedStyle = window.getComputedStyle(theLows);
    
        if (computedStyle.display === 'none') {
            dropLogo.classList.remove('bx-chevron-left');
            dropLogo.classList.add('bx-chevron-down');
            theLows.style.display = 'block';
        } else {
            dropLogo.classList.remove('bx-chevron-down');
            dropLogo.classList.add('bx-chevron-left');
            theLows.style.display = 'none';
        }
    }
    </script>
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.title = document.title + ' - ' + 'مشاريع قوانين';
        });
    </script>
</body>
</html>