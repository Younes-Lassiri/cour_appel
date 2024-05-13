<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" href="/img/icon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100..900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="/css/histoire.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <title>نافذة الحق - تقديم الموقع</title>
  </head>
  <body>
    <x-landing-section_head />
    <x-user_navbar/>
    <div class="">
      <div class="top-section">
        <div class="breadcrum-container">
          <h2 class="breadcrum-title">تقديم الموقع</h2>
          <div class="breadcrum">
            <a href="/" class="link"
              ><span class="icon-arrow" style="color: #000009"></span><span class="icon-home" style="color: #000009"></span
            ></a>
            <span class="breadcrum-page">تقديم الموقع</span>
          </div>
        </div>
      </div>
      <div class="main">
        <div class="main-section">
          <div class="block-title red">
            <span class="title title-red">تقديم الموقع </span>
          </div>
          <div class="content">
            <p>تتقدم محكمة الاستئناف بتقديم موقعها
               الإلكتروني الجديد، وتواكب به النقلة التاريخية التي يشهدها المغرب
               في بناء دولة الحق والمؤسسات الديمقراطية، وترسيخ مبادئ الحكم الرشيد
               وتحقيق العدالة الاجتماعية. إن هذا الموقع يسعى لتوفير خدمات تفاعلية
               تمكن المواطنين من تقديم شكاوىهم واستلام الردود عليها بكل سهولة ويسر.
            </p>
            <p>يعبر موقعنا الجديد عن التزامنا التام بمضامين الدستور الجديد
               ورؤية صاحب الجلالة الملك محمد السادس حفظه الله، وتعكس إرادتنا في توفير بيئة
                تفاعلية تضمن الشفافية والمسؤولية في تقديم الخدمات القضائية.
            </p>
            <p>محكمة الاستئناف تسعى من خلال هذا الموقع إلى توفير كافة الآليات والمعلومات اللازمة لتيسير ولوج المواطنين إلى العدالة، وضمان تطبيق القانون بمهنية وإصدار الأحكام في إطار الشفافية والعدالة.

            </p>
            <p>
              
              نحن نلتزم بتقديم الخدمات بما يتماشى مع معايير 
              الجودة والكفاءة، ونعمل على تحسين وتطوير هذه
               الخدمات بشكل مستمر لتلبية احتياجات المواطنين وتحقيق رضاهم.
            </p>
            <p>محكمة الاستئناف تعمل بجدية 
              وإصرار على تحقيق أهدافها، وتطمح إلى أن يكون هذا الموقع منصة تفاعلية 
              تعكس الجهود الجادة التي تبذلها في خدمة المواطن وحماية حقوقه وحرياته.
        
            </p>
            <p>
              
              نحن نثق بأن هذا الموقع سيكون واجهة مثالية
               لمحكمة الاستئناف، وسيساهم بشكل فعّال في تعزيز العدالة وتحقيق الرضا العام.
            </p>
          </div>
        </div>
        <div class="side-bar">
          <div class="block-title green">
            <span class="title title-green">مستجدات</span>
          </div>
          <div class="updates">
            @foreach ($posts as $post)
            <div class="item">
                <div class="imgH">
                  <img src="{{ asset('storage/'. $post->images[0]->image) }}" alt="" />
                </div>
                <div class="rp-text">
                  <span class="date">{{ explode(' ', $post->created_at)[0] }}</span>
                  <a href="{{ route('detailPost', [explode(' ',$post->created_at)[0], $post->id, str_replace(' ', '-', $post->title)]) }}" style="text-decoration: none">
                    <p>
                        <?php
                            $words = explode(' ', $post->description);
                            $limitedWords = implode(' ', array_slice($words, 0, 12));
                            print($limitedWords);
                        ?>
                      </p>
                </a>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
      <x-foo_ter/>
    </div>
  </body>
</html>
