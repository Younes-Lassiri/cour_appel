<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>نافذة الحق</title>
    <link rel="icon" href="/img/icon.ico">
    <link rel="stylesheet" href="/css/main.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

  <div class="landing-section">
    <x-landing-section_head />

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
  <a href="/طلب-شكاية" style="text-decoration: none" id="serviceLink" data-value='إرسال طلب شكاية'>
    <div class="service">
  
  
      <div class="serviceOne">
       <div class="serviceImg"><img src="https://www.mahakim.ma/assets/images/register-commercial.svg" alt=""></div>
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
       <div class="serviceTitle">تتبع طلب شكاية</div>
       <div class="servicePara">هذه الخدمة تسمح لكم بتتبع طلب شكاية عن طريق الأنترنيت، وتتم العملية في بضع خطوات، تأكدوا من اتباع جميع مراحل الإجراء و تأكدوا من أن المعلومات التي تم تضمينها بالطلب صحيحة قبل تأكيد طلبكم.</div>
      </div>
   
       <div class="serviceButton"><button>← عرض الخدمة</button></div>
   
   
     </div>
  </a>
    
  <a href="/طلب-شكاية" style="text-decoration: none" id="serviceLink" data-value='إرسال طلب شكاية'>
    <div class="service animated">


      <div class="serviceOne">
      <div class="serviceImg"><img src="https://www.mahakim.ma/assets/images/register-commercial.svg" alt=""></div>
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
       <div class="serviceTitle">تتبع طلب شكاية</div>
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
    @foreach ($newsposts as $post)
      <div class="posts-sectionOne">
        @php
            $postMonth = intval(explode('-', explode(' ', $post->created_at)[0])[1]);
            $monthAbbreviation = isset($months[$postMonth - 1]) ? $months[$postMonth - 1] : '';
        @endphp

        <div class="posts-sectionOneOne"><p><span style="color: #003566;">{{ $monthAbbreviation }}</span>{{ explode('-', explode(' ', $post->created_at)[0])[0] }} {{ explode('-', explode(' ', $post->created_at)[0])[2] }}<i class='bx bxs-time-five' style='color:#003566'  ></i></p><img src="{{ asset('storage/'.$post->images[0]->image) }}" alt=""></div>
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
    @foreach ($newsposts as $post)
      <div class="posts-sectionOne">
        @php
            $postMonth = intval(explode('-', explode(' ', $post->created_at)[0])[1]);
            $monthAbbreviation = isset($months[$postMonth - 1]) ? $months[$postMonth - 1] : '';
        @endphp
        <div class="posts-sectionOneOne"><p><span style="color: #003566;">{{ $monthAbbreviation }}</span>{{ explode('-', explode(' ', $post->created_at)[0])[0] }} {{ explode('-', explode(' ', $post->created_at)[0])[2] }}<i class='bx bxs-time-five' style='color:#003566'  ></i></p><img src="{{ asset('storage/'.$post->images[0]->image) }}" alt=""></div>
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
    @foreach ($reportposts as $post)
      <div class="posts-sectionOne">
        @php
            $postMonth = intval(explode('-', explode(' ', $post->created_at)[0])[1]);
            $monthAbbreviation = isset($months[$postMonth - 1]) ? $months[$postMonth - 1] : '';
        @endphp
        <div class="posts-sectionOneOne"><p><span style="color: #003566;">{{ $monthAbbreviation }}</span>{{ explode('-', explode(' ', $post->created_at)[0])[0] }} {{ explode('-', explode(' ', $post->created_at)[0])[2] }}<i class='bx bxs-time-five' style='color:#003566'  ></i></p><img src="{{ asset('storage/'.$post->images[0]->image) }}" alt=""></div>
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
    @foreach ($reportposts as $post)
      <div class="posts-sectionOne">
        @php
            $postMonth = intval(explode('-', explode(' ', $post->created_at)[0])[1]);
            $monthAbbreviation = isset($months[$postMonth - 1]) ? $months[$postMonth - 1] : '';
        @endphp
        <div class="posts-sectionOneOne"><p><span style="color: #003566;">{{ $monthAbbreviation }}</span>{{ explode('-', explode(' ', $post->created_at)[0])[0] }} {{ explode('-', explode(' ', $post->created_at)[0])[2] }}<i class='bx bxs-time-five' style='color:#003566'  ></i></p><img src="{{ asset('storage/'.$post->images[0]->image) }}" alt=""></div>
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
        <div class="posts-sectionOneThree"><a href="{{ route('detailPost', [explode(' ',$post->created_at)[0], $post->id, str_replace(' ', '-', $post->title)]) }}" style="text-decoration: none"><p><span style="color: #4D7294; font-weight: 600">←</span> عرض</p></a></div>
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
</body>
</html>