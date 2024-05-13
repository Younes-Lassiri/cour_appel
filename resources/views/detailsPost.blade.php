<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="/img/icon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>نافذة الحق</title>
    <link rel="stylesheet" href="/css/main.css">
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
    <div class="detailPost-section">
        <input type="hidden" name="" id="title" value="{{ $post->title }}">
        <div class="detailPost-sectionOne">
            <nav style="" aria-label="breadcrumb" class="breadCumb">
                <ol class="breadcrumb" style="padding: 14px 0 0 0">
                  <li class="breadcrumb-item"><a class="decoration" href="" style="color: #809AB3;font-style: normal;font-weight: bold">{{ $post->title }}</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('home') }}"><i class='bx bx-home' style='color:#809AB3; padding: 2px 2px; border-radius: 5px'  ></i></a></li>
                </ol>
              </nav>
        </div>
        <div class="detailPost-sectionTwo">
            <div class="detailPost-sectionTwoOne"><img src="{{ asset('storage/'. $post->images[0]->image) }}" alt=""></div>
            <div class="detailPost-sectionTwoTwo">
                {!! $post->description !!}
            </div>
            <div class="detailPost-sectionTwoThree">
                @foreach ($post->images as $image)
                    <div class="detailPost-sectionTwoThreeOne"><img src="{{ asset('storage/'. $image->image) }}" alt=""></div>
                @endforeach
            </div>
        </div>
        <div class="detailPost-sectionThree">
            <div class="detailPost-sectionThreeOne"><a href="{{ route('categorie', 'news') }}">الأخبار</a></div>
            <div class="detailPost-sectionThreeOne"><a href="{{ route('categorie', 'report') }}">بلاغات</a></div>
        </div>
        <div class="relatedPosts">
            <div class="relatedPostsOne">منشور له صلة</div>
            <div class="relatedPostsTwo">
                @foreach ($relatedPosts as $post)
                    <div class="relatedPostsTwoOne">
                        <div class="relatedPostsTwoOneOne">{{ $post->title }}</div>
                        <div class="relatedPostsTwoOneTwo"><img src="{{ asset('storage/'. $post->images[0]->image) }}" alt=""></div>
                        <div class="relatedPostsTwoOneThree">
                            <a href="{{ route('detailPost', [explode(' ',$post->created_at)[0], $post->id, str_replace(' ', '-', $post->title)]) }}" style="text-decoration: none"><p><span style="color: #4D7294; font-weight: 600">←</span> إقرأ المزيد</p></a>
                        </div>
                    </div>
                @endforeach
                <div class="relatedPostsTwoOne">
                    <div class="relatedPostsTwoOneOne">{{ $post->title }}</div>
                    <div class="relatedPostsTwoOneTwo"><img src="{{ asset('storage/'. $post->images[0]->image) }}" alt=""></div>
                    <div class="relatedPostsTwoOneThree">
                        <a href="{{ route('detailPost', [explode(' ',$post->created_at)[0], $post->id, str_replace(' ', '-', $post->title)]) }}" style="text-decoration: none"><p><span style="color: #4D7294; font-weight: 600">←</span> إقرأ المزيد</p></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let title = document.querySelector('#title').value;
            document.title = document.title + ' - ' + title;
        });
    </script>
    
    <x-foo_ter/>
</body>
</html>