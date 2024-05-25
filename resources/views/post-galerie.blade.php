<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="/img/icon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>نافذة الحق</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <x-header/>
    <x-landing-section_head />
    <x-user_navbar/>
    <input type="hidden" id="title" value="{{ $categorie === 'news' ? 'قسم الأخبار' : 'قسم البلاغات' }}">
    <div class="categorieSection">
        <div class="categorieSectionOne">
            <nav style="" aria-label="breadcrumb" class="breadCumb">
                <ol class="breadcrumb" style="padding: 14px 0 0 0">
                  <li class="breadcrumb-item" style="color: #809AB3;font-style: normal;font-weight: bold">@if ($categorie === 'news')
                    الأخبار
                  @else
                  بلاغات
                  @endif</li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('home') }}"><i class='bx bx-home' style='color:#809AB3; padding: 2px 2px; border-radius: 5px'  ></i></a></li>
                </ol>
              </nav>
        </div>
        <div class="categorieSectionTwo">
            <div class="categorieSectionTwoOne">
                @foreach ($posts as $post)
                    <div class="categorieSectionTwoOneOne">
                        <div class="categorieSectionTwoOneOneOne"><img src="{{ asset($post->images[0]->image) }}" alt=""></div>
                        <div class="categorieSectionTwoOneOneTwo">{{ $post->title }}</div>
                        <div class="categorieSectionTwoOneOneThree">
                            <?php
                                $words = explode(' ', $post->description);
                                $limitedWords = implode(' ', array_slice($words, 0, 15));
                                print($limitedWords);
                            ?>
                            <span style="color: #ffbc2b">[</span>...<span style="color: #ffbc2b">]</span>
                        </div>
                        <div class="categorieSectionTwoOneOneFour">
                            @php
                                $postMonth = intval(explode('-', explode(' ', $post->created_at)[0])[1]);
                                $monthAbbreviation = isset($months[$postMonth - 1]) ? $months[$postMonth - 1] : '';
                            @endphp
                            <div class="categorieSectionTwoOneOneFourOne"><a href="{{ route('detailPost', [explode(' ',$post->created_at)[0], $post->id, str_replace(' ', '-', $post->title)]) }}" style="text-decoration: none"><button><span style="color: #003566;font-weight: 600">←</span> إقرأ المزيد</button></a></div>
                            <div class="categorieSectionTwoOneOneFourTwo"><p><span style="color: #003566;">{{ $monthAbbreviation }}</span>{{ explode('-', explode(' ', $post->created_at)[0])[0] }} {{ explode('-', explode(' ', $post->created_at)[0])[2] }}<i class='bx bxs-time-five' style='color:#003566'  ></i></p></div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="detailPost-sectionThree">
                <div class="detailPost-sectionThreeOne @if ($categorie === 'news') categorieVisited @endif"><a href="{{ route('categorie', 'news') }}">الأخبار</a></div>
                <div class="detailPost-sectionThreeOne @if ($categorie === 'report') categorieVisited @endif""><a href="{{ route('categorie', 'report') }}">بلاغات</a></div>
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


<script>
    function getStoredPostIds() {
        const storedPostIds = localStorage.getItem('postIds');
        return storedPostIds ? JSON.parse(storedPostIds) : [];
    }

    function savePostIds(postIds) {
        localStorage.setItem('postIds', JSON.stringify(postIds));
        updateShowTitles();
        updateInputValue(postIds.length);
        updateAllInput(postIds);
    }
    
    function updateInputValue(length) {
    const inputElement = document.getElementById('postIdsLength');
    inputElement.textContent = length;
    }
    function togglePostId(element) {
        const postId = element.getAttribute('data-post-id');
        let postIds = getStoredPostIds();

        if (postIds.includes(postId)) {
            postIds = postIds.filter(id => id !== postId);
            element.classList.remove('bxs-star');
            element.classList.add('bx-star');
            console.log('Post ID removed:', postId);
        } else {
            postIds.push(postId);
            element.classList.remove('bx-star');
            element.classList.add('bxs-star');
            console.log('Post ID stored:', postId);
        }

        savePostIds(postIds);
    }
    function updateShowTitles() {
    let allPostsTitles = document.querySelector('.employeDetailLikesTwo');
    let postIds = getStoredPostIds();
    allPostsTitles.innerHTML = '';
    postIds.forEach(postId => {
        const post = posts.find(post => post.id === parseInt(postId));
        if (post) {
    const postDiv = document.createElement('div');
    const postDivInsideOne = document.createElement('div');
    const postDivInsideTwo = document.createElement('div');
    postDiv.className = 'wishPost';
    
    const postHref = document.createElement('a');
    postHref.textContent = post.title;
    postHref.setAttribute('target', '_blank');
    postHref.setAttribute('href', `/${post.created_at.split(" ")[0]}/${post.id}/${post.title.replace(/ /g, '-')}`);
    postHref.setAttribute('data-created-at', '{{ $post->created_at }}');
    postHref.setAttribute('data-id', post.id);
    postHref.setAttribute('data-title', post.title);
    postDivInsideOne.appendChild(postHref);
    postDivInsideTwo.innerHTML = `<i class="bx bx-plus" onclick="cutLike(${post.id})"></i>`;
    postDivInsideOne.className = "wishPostOne";
    postDivInsideTwo.className = 'wishPostTwo';
    postDiv.appendChild(postDivInsideTwo);
    postDiv.appendChild(postDivInsideOne);
    allPostsTitles.appendChild(postDiv);
}

    });
}

    document.addEventListener('DOMContentLoaded', function() {
        const postIds = getStoredPostIds();
        var posts = <?php echo json_encode($posts); ?>;
        const elements = document.querySelectorAll('.detailPost-sectionOneOne i');

        elements.forEach(element => {
            const postId = element.getAttribute('data-post-id');
            if (postIds.includes(postId)) {
                element.classList.remove('bx-star');
                element.classList.add('bxs-star');
            }
        });
        updateInputValue(postIds.length);
        updateShowTitles();
        
    });
    function cutLike(postId) {
    let elements = document.querySelectorAll('.detailPost-sectionOneOne i');
    elements.forEach(ele => {
        if (parseInt(ele.getAttribute('data-post-id')) === parseInt(postId)) {
            ele.classList.remove('bxs-star');
            ele.classList.add('bx-star');
        }
    })
    let postIds = getStoredPostIds();
    postIds = postIds.filter(id => parseInt(id) !== postId);
    savePostIds(postIds);
    }

</script>
</body>
</html>