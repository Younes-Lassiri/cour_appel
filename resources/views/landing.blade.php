<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>نافذة الحق</title>
    <link rel="icon" href="/img/icon.ico">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@400;700&display=swap" rel="stylesheet">
</head>
<style>
      .med{
        width: 100%;
        height: 100%;
    }
    .parent1{
        display: grid;
    grid-template-columns: 50% 50%;

    }
    .bigchild2{
        display: grid;
    grid-template-columns: 7fr  1fr;
    padding: 50px 15px;

    }

    .child1{

        display: grid;
        grid-template-rows: 50px 50px ;
        height: 100px;
        ;
    }
    .son{
      display: flex;
      align-items: end;
      justify-content: end;
    }

    .child2{

      height: 100px;
      width: 100px;
      display: flex;
    justify-content: start;
    padding: 0 10px
      ;
    }
    .mydiv{
    display: grid;
    grid-template-rows: 100px ; place-items: center;
    }
    .mysvg{
    width: 45px;
    height: 45px;  
    border-radius: 50%;
    background-color: #ffbc2b;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 23px;
    color: #003566
    }
    .mytext{
    color:#666666;
    font-family: "Tajawal", sans-serif;
    font-family: "Tajawal", sans-serif;
    font-family: 'Noto Sans Arabic', sans-serif;
    }
    .myh1{
    font-size: 22px;
    line-height: 28px;
    float: right;
    font-family: "Tajawal", sans-serif;
    font-family: 'Noto Sans Arabic', sans-serif;
    font-family: "Tajawal", sans-serif;
    }

</style>
<body>

  <div class="landing-section">
    <x-landing-section_head />

    @if (!session()->has('success'))
    <x-loader />
@endif

  @if (session()->has('success'))
        <script>
            Swal.fire({
                position: "center-center",
                icon: "success",
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif


    <x-user_navbar/>

<div class="container intro">
    <div class="theOne">نافذة الحق</div>
    <div class="theTwo"><img src="https://www.mahakim.ma/assets/images/Line_L.svg" alt=""></div>


    <div class="theThree">منصة الموظفين الإكترونية</div>
    


    <div class="theFour"><img src="https://www.mahakim.ma/assets/images/Line_R.svg" alt=""></div>


    <div class="theFive"><span style="color: #ffc221; font-weight: 600">Justice-window.ma</span> الخدمات الإلكترونية المقدمة من طرف مَحكَمة الإسْتئنَاف عبر الموقع <br><span style="color: #ffc221; font-weight: 600">Justice-Window-Mobile</span> و التطبيق </div>



    
<div class="theSix">
  <div class="p1"></div>
  <div class="p2"></div>
  <div class="p3"></div>
</div>
<div class="searchInput">
  <div class="searchInputTwo"><button class="theSearchButton" onclick="serviceSearch()"><i class='bx bx-search' style="font-size: 20px"></i>بحث</button></div>
  <div class="searchInputOne"><input type="text" name="" id="searchValue" placeholder="...بحث سريع عن الخدمات الإلكترونية"></div>
</div>
</div>
</div>



<div class="services">
  
  <a href="{{ route('categorie', 'news') }}" style="text-decoration: none" id="serviceLink" data-value='تتبع طلب شكاية'>
    <div class="service">


      <div class="serviceOne">
       <div class="serviceImg"><img src="https://www.mahakim.ma/assets/images/6.svg" alt=""></div>
       <div class="serviceTitle">مستجدات المحكمة</div>
       <div class="servicePara"> 
        نقدم خدمة مميزة لعرض آخر الأخبار والمستجدات الخاصة بمحكمة الاستئناف، بما في ذلك القرارات القضائية والجلسات القادمة وأهم القضايا. تابعونا للحصول على معلومات موثوقة ومحدثة باستمرار.
       </div>
      </div>
       <div class="serviceButton"><button>← عرض الخدمة</button></div>
     </div>
  </a>
    
  <a href="/طلب-شكاية" style="text-decoration: none" id="serviceLink" data-value='إرسال طلب شكاية'>
    <div class="service animated">


      <div class="serviceOne">
      <div class="serviceImg"><img src="https://mahakim.ma/assets/images/fiche-n3.svg" alt=""></div>
      <div class="serviceTitle">إرسال طلب شكاية</div>
      <div class="servicePara">هذه الخدمة تسمح لكم بتقديم طلب شكوى عن طريق الأنترنيت، وتتم العملية في بضع خطوات، تأكدوا من اتباع جميع مراحل الإجراء و تأكدوا من أن المعلومات التي تم تضمينها بالطلب صحيحة قبل تأكيد طلبكم.</div>
      </div>
  
      <div class="serviceButton"><button>← عرض الخدمة</button></div>
  
  
    </div>
  
  </a>
  <a href="{{ route('complainSuivi') }}" style="text-decoration: none" id="serviceLink" data-value='تتبع طلب شكاية'>
    <div class="service">


      <div class="serviceOne">
       <div class="serviceImg"><img src="https://www.mahakim.ma/assets/images/dossier-suivi.svg" alt=""></div>
       <div class="serviceTitle">تتبع الملفات</div>
       <div class="servicePara">هذه الخدمة تسمح لكم بتتبع طلب شكاية عن طريق الأنترنيت، وتتم العملية في بضع خطوات، تأكدوا من اتباع جميع مراحل الإجراء و تأكدوا من أن المعلومات التي تم تضمينها بالطلب صحيحة قبل تأكيد طلبكم.</div>
      </div>
   
       <div class="serviceButton"><button>← عرض الخدمة</button></div>
     </div>
  </a>
  </div>
<div>
  <x-faqs/>
</div>
</div>
<div>
  <input type="hidden" id="state" value="news">
  <div class="post-titles">
    <div class="post-titlesOne">
      <div class="post-titlesOneOne" onclick="changeState()">
        <p class="postPara" id="showP">بلاغات</p>
        <p class="postParaH" style="display: none" id="hideP">بلاغات</p>
      </div>
      <div class="post-titlesOneTwo" onclick="changeStateO()">
        <p class="postA" id="showA" style="display: none">الأخبار</p>
        <p class="postAh" id="hideA">الأخبار</p>
      </div>
    </div>
    <div class="post-titlesTwo"><p>المستجدات</p></div>
  </div>
  <div class="posts-section" id="postsSection">
    @foreach ($newsposts->take(4) as $post)
      <div class="posts-sectionOne">
        <div class="posts-sectionOneOne"><img src="{{ asset($post->images[0]->image) }}" alt=""></div>
        <div class="posts-sectionOneTwo">
          <p>
            <?php
            $words = explode(' ', $post->description);
            $limitedWords = implode(' ', array_slice($words, 0, 15));
            print($limitedWords);
          ?>
            <span style="color: #ffbc2b">[</span>...<span style="color: #ffbc2b">]</span>
          </p>
        </div>
        <div class="posts-sectionOneThree"><a href="{{ route('detailPost', [explode(' ',$post->created_at)[0], $post->id, str_replace(' ', '-', $post->title)]) }}" style="text-decoration: none"><p>← عرض</p></a></div>
      </div>  
    @endforeach
  </div>
  <div class="posts-section" id="reportSection" style="display: none">
    @foreach ($reportposts->take(4) as $post)
      <div class="posts-sectionOne">
        <div class="posts-sectionOneOne"><img src="{{ asset($post->images[0]->image) }}" alt=""></div>
        <div class="posts-sectionOneTwo">
          <p>
            <?php
            $words = explode(' ', $post->description);
            $limitedWords = implode(' ', array_slice($words, 0, 15));
            print($limitedWords);
          ?>
          <span style="color: #ffbc2b">[</span>...<span style="color: #ffbc2b">]</span>
          </p>
        </div>
        <div class="posts-sectionOneThree"><a href="{{ route('detailPost', [$post->created_at, $post->id, $post->title]) }}" style="text-decoration: none"><p><span style="color: #4D7294; font-weight: 600">←</span> عرض</p></a></div>
      </div>  
    @endforeach
  </div>
  <script>
    function changeState() {
      var stateInput = document.getElementById('state');
      var currentState = stateInput.value;

      if (currentState === 'news') {
        stateInput.value = 'report';
        document.getElementById('postsSection').style.display = 'none';
        document.getElementById('showP').style.display = 'none';
        document.getElementById('hideP').style.display = 'block';
        document.getElementById('reportSection').style.display = 'grid';
        document.getElementById('hideA').style.display = 'none';
        document.getElementById('showA').style.display = 'block';
      }
    }
    function changeStateO() {
      var stateInput = document.getElementById('state');
      var currentState = stateInput.value;

      if (currentState === 'report') {
        stateInput.value = 'news';
        document.getElementById('postsSection').style.display = 'grid';
        document.getElementById('showP').style.display = 'block';
        document.getElementById('hideP').style.display = 'none';
        document.getElementById('hideA').style.display = 'block';
        document.getElementById('showA').style.display = 'none';
        document.getElementById('reportSection').style.display = 'none';
      }
    }
  </script>
  <div class="posts-showAll"><a href="{{ route('categorie', 'news') }}"><button>← عرض الكل</button></a></div>
</div>


<div class="ministreNumbers">
  <div class="ministreNumbersOne">الوزارة في أرقام</div>
  <div class="ministreNumbersTwo">
    يرتكز نظام المملكة المغربية على الملكية الدستورية الديمقراطية والاجتماعية، مما يفرض علينا بالنظر إلى الوظائف التي يقوم بها القضاء، متابعة العمل من أجل تقوية دور المؤسسات، وسيادة القانون، وتحصين مجتمعنا، وتعزيز الأمن والطمأنينة، وتشجيع الاستثمار، ودعم التنمية الشاملة والمستديمة.
  </div>
  <div class="ministreNumbersThree">
    <div class="ministreNumbersThreeOne">
      <div class="ministreNumbersThreeOneOne">
        <div class="ministreNumbersThreeOneOneOne">محاكم الإستئناف</div>
        <div class="ministreNumbersThreeOneOneTwo">23</div>
      </div>
      <div class="ministreNumbersThreeOneTwo"><img src="/img/mnh.svg" alt=""></div>
    </div>

    <div class="ministreNumbersThreeOne">
      <div class="ministreNumbersThreeOneOne">
        <div class="ministreNumbersThreeOneOneOne">المحاكم الإدارية</div>
        <div class="ministreNumbersThreeOneOneTwo">10</div>
      </div>
      <div class="ministreNumbersThreeOneTwo"><img src="/img/mnc.svg" alt=""></div>
    </div>

    <div class="ministreNumbersThreeOne">
      <div class="ministreNumbersThreeOneOne">
        <div class="ministreNumbersThreeOneOneOne">المحاكم التجارية</div>
        <div class="ministreNumbersThreeOneOneTwo">10</div>
      </div>
      <div class="ministreNumbersThreeOneTwo"><img src="/img/mna.svg" alt=""></div>
    </div>

    <div class="ministreNumbersThreeOne">
      <div class="ministreNumbersThreeOneOne">
        <div class="ministreNumbersThreeOneOneOne">المحاكم الابتدائية</div>
        <div class="ministreNumbersThreeOneOneTwo">88</div>
      </div>
      <div class="ministreNumbersThreeOneTwo"><img src="/img/mnh.svg" alt=""></div>
    </div>

    <div class="ministreNumbersThreeOneExept">
      <div class="ministreNumbersThreeOneOne">
        <div class="ministreNumbersThreeOneOneOne">مراكز القاضي المقيم</div>
        <div class="ministreNumbersThreeOneOneTwo">83</div>
      </div>
      <div class="ministreNumbersThreeOneTwo"><img src="/img/mnp.svg" alt=""></div>
    </div>
  </div>
</div>
   
  <div class="parent1">
    <div class="h-96 md:h-80 lg:h-100 bigchild1">
        <iframe class="med"
          class="w-full h-full"
          loading="lazy"
          allowfullscreen
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3649.5466800312084!2d-13.1815651!3d27.1367691!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xc37730a2a81c9e9%3A0xd6ce0dce12d9ff50!2s%C2%A0%D9%85%D8%AD%D9%83%D9%85%D8%A9%20%D8%A7%D9%84%D8%A7%D8%B3%D8%AA%D8%A6%D9%86%D8%A7%D9%81%E2%80%AD!5e0!3m2!1sen!2sma!4v1643913201467!5m2!1sen!2sma

          "
        >
        </iframe>
      </div>
      <div class="bigchild2">

        <div class="child1">
            <div class="son">
                <h1 class="myh1">العنوان</h1>
            </div>
            <div class="son2">
                <p class="mytext" style="float: right;">مَحكَمة الإسْتئنَاف : شارع سمارة، ص.ب 1015، العيون، المغرب</p>
            </div>
        </div>
        
<div class="child2 " >
<div class="mydiv">
<img src="https://mahakim.ma/assets/images/logo/position.svg" alt="">
</div></div>


<div class="child1">
    <div class="son">
        <h1 class="myh1">الهاتف</h1>
    </div>
    <div class="son2">
        <p class="mytext" style="float: right;">+212 537 21 37 37</p>
    </div>
</div>

<div class="child2 " >
<div class="mydiv">
    <img class="" src="https://www.mahakim.ma/assets/images/logo/phone.svg" alt="V4vGM0Iec6"/> 
</div></div>


<div class="child1">
    <div class="son">
        <h1 class="myh1">البريد الالكتروني الخاص بمَحكَمة الإسْتئنَاف بالعيون
        </h1>
    </div>
    <div class="son2">
        <p class="mytext" style="float: right;">justice-window.support@justice.gov.ma

        </p>
    </div>
</div>

<div class="child2 " >
<div class="mydiv">
  <i class='bx bxs-envelope mysvg'></i>
</div></div>


<div class="child1">
    <div class="son">
        <h1 class="myh1">الهاتف الخاص بالشكايات
        </h1>
    </div>
    <div class="son2">
        <p class="mytext" style="float: right;">+212 537 56 52 77
        </p>
    </div>
</div>

<div class="child2 " >
<div class="mydiv">
  <i class='bx bx-support mysvg'></i>
</div></div>

</div>
      </div>

<script>
    function createWidget() {
  var div = document.createElement("div");
  div.className = "h-96 md:h-80 lg:h-96";

  var iframe = document.createElement("iframe");
  iframe.className = "w-full h-full";
  iframe.loading = "lazy";
  iframe.allowFullscreen = true;
  iframe.src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3649.5466800312084!2d-13.1815651!3d27.1367691!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xc37730a2a81c9e9%3A0xd6ce0dce12d9ff50!2s%C2%A0%D9%85%D8%AD%D9%83%D9%85%D8%A9%20%D8%A7%D9%84%D8%A7%D8%B3%D8%AA%D8%A6%D9%86%D8%A7%D9%81%E2%80%AD!5e0!3m2!1sen!2sma!4v1643913201467!5m2!1sen!2sma";

  div.appendChild(iframe);

  return div;
}


</script>

<x-foo_ter/>

<script>
  function serviceSearch(){
   let links = document.querySelectorAll('#serviceLink');
   let search = document.querySelector('#searchValue').value.trim();
 
   links.forEach(link => {
     let linkDataValue = link.getAttribute('data-value').trim();
     if(!linkDataValue.includes(search)){
       link.style.display = 'none';
     } else {
       link.style.display = '';
     }
   })
  }
 </script>
<script src="/js/main.js"></script>

<script>
  window.addEventListener('load', function() {
    document.body.classList.add('shadow-overlay');
    setTimeout(function() {
      document.body.classList.remove('shadow-overlay');
      document.querySelector('.theLoader').style.display = 'none';
      document.querySelector('.preLoader').style.display = 'none';
    }, 1500);
  });
</script>

</body>
</html>