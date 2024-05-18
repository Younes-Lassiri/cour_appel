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
    @if (session()->has('deletePost'))
        <script>
            Swal.fire({
                position: "center-center",
                icon: "success",
                title: "{{ session('deletePost') }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

    @if (session()->has('restore'))
        <script>
            Swal.fire({
                position: "center-center",
                icon: "success",
                title: "{{ session('restore') }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

    @if (session()->has('force'))
        <script>
            Swal.fire({
                position: "center-center",
                icon: "success",
                title: "{{ session('force') }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

    @if (session()->has('updatePost'))
    <script>
        Swal.fire({
            position: "center-center",
            icon: "success",
            title: "{{ session('updatePost') }}",
            showConfirmButton: false,
            timer: 2000
        });
    </script>
@endif
    <x-landing-section_head />
    <x-admin_navbar/>
    <div class="categorieSectionG">
        <div class="categorieSectionOne">
            <nav style="" aria-label="breadcrumb" class="breadCumb">
                <ol class="breadcrumb" style="padding: 14px 0 0 0">
                  <li class="breadcrumb-item" style="color: #809AB3;font-style: normal;font-weight: bold">إدارة المنشورات</li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('dashboard') }}"><i class='bx bx-home' style='color:#809AB3; padding: 2px 2px; border-radius: 5px'  ></i></a></li>
                </ol>
              </nav>
        </div>
        <div class="categorieSectionTwo">
            <div class="categorieSectionTwoOne">
                @foreach ($posts as $post)
                    @if ($post->deleted_at === Null)
                    <div class="categorieSectionTwoOneOne" data-tag="{{ $post->tag }}" data-date="{{ $post->created_at }}">
                        <div class="categorieSectionTwoOneOneOne"><img src="{{ asset('storage/'. $post->images[0]->image) }}" alt=""></div>
                        <div class="categorieSectionTwoOneOneTwo">{{ $post->title }}</div>
                        <div class="categorieSectionTwoOneOneThree">
                            <?php
                                $words = explode(' ', $post->description);
                                $limitedWords = implode(' ', array_slice($words, 0, 15));
                                print($limitedWords);
                            ?>
                            <span style="color: #ffbc2b">[</span>...<span style="color: #ffbc2b">]</span>
                        </div>
                        <div class="categorieSectionTwoOneOneFourG">
                            @php
                                $postMonth = intval(explode('-', explode(' ', $post->created_at)[0])[1]);
                                $monthAbbreviation = isset($months[$postMonth - 1]) ? $months[$postMonth - 1] : '';
                            @endphp
                            <div class="categorieSectionTwoOneOneFourOneG">
                                <form action="{{ route('post-delete', $post->id) }}" method="post">
                                @csrf
                                <button><i class='bx bxs-message-x' style="margin-top: 5px"></i> مسح</button>
                                </form>
                            </div>
                            <div class="categorieSectionTwoOneOneFourOneGOne">
                                <form action="{{ route('post-edit-blade', $post->id) }}">
                                    <button><i class='bx bx-pen' style="margin-top: 5px"></i> تعديل</button>
                                </form>
                                </div>
                            <div class="categorieSectionTwoOneOneFourTwo"><p><span style="color: #003566;">{{ $monthAbbreviation }}</span>{{ explode('-', explode(' ', $post->created_at)[0])[0] }} {{ explode('-', explode(' ', $post->created_at)[0])[2] }}<i class='bx bxs-time-five' style='color:#003566'  ></i></p></div>
                        </div>
                    </div>
                    @else
                    <div class="categorieSectionTwoOneOneSoft" data-tag="{{ $post->tag }}" data-date="{{ $post->created_at }}">
                        <div class="categorieSectionTwoOneOneOneSoft"><img src="{{ asset('storage/'. $post->images[0]->image) }}" alt=""></div>
                        <div class="categorieSectionTwoOneOneTwo">{{ $post->title }}</div>
                        <div class="categorieSectionTwoOneOneThree">
                            <?php
                                $words = explode(' ', $post->description);
                                $limitedWords = implode(' ', array_slice($words, 0, 15));
                                print($limitedWords);
                            ?>
                            <span style="color: #ffbc2b">[</span>...<span style="color: #ffbc2b">]</span>
                        </div>
                        <div class="categorieSectionTwoOneOneFourG">
                            @php
                                $postMonth = intval(explode('-', explode(' ', $post->created_at)[0])[1]);
                                $monthAbbreviation = isset($months[$postMonth - 1]) ? $months[$postMonth - 1] : '';
                            @endphp
                            <div class="categorieSectionTwoOneOneFourOneG">
                                <form action="{{ route('post-force', $post->id) }}" method="post">
                                @csrf
                                <button><i class='bx bxs-message-x' style="margin-top: 5px"></i> حذف</button>
                                </form>
                            </div>
                            <div class="categorieSectionTwoOneOneFourOneGOneSoft">
                                <form action="{{ route('post-restore', $post->id) }}" method="POST">
                                    @csrf
                                    <button><i class='bx bx-pen' style="margin-top: 5px"></i> استرجاع</button>                                </form>
                                </div>
                            <div class="categorieSectionTwoOneOneFourTwo"><p><span style="color: #003566;">{{ $monthAbbreviation }}</span>{{ explode('-', explode(' ', $post->created_at)[0])[0] }} {{ explode('-', explode(' ', $post->created_at)[0])[2] }}<i class='bx bxs-time-five' style='color:#003566'  ></i></p></div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
            <div class="post-filtrage">
                <div class="post-filtrageTwo">
                    <input type="hidden" name="" id="searchTag">
                      <div class="dropdown theDropdownGestion @if ($errors->has('tag')) errorInput @endif">
                          <div class="dropdown-btn notChoosed">اختيار القسم</div>
                          <ul class="dropdown-list">
                              <li>قسم الأخبار</li>
                              <li>قسم البلاغات</li>
                          </ul>
                      </div>
                  <script>
                      document.addEventListener("DOMContentLoaded", function() {
                          const dropdownBtn = document.querySelector(".post-filtrageTwo .dropdown-btn");
                          const dropdownList = document.querySelector(".post-filtrageTwo .dropdown-list");
                          let inpGender = document.querySelector('#searchTag');
                  
                          function updateDropdownText() {
                              if (inpGender.value.trim() !== '') {
                                  dropdownBtn.textContent = inpGender.value;
                                  dropdownBtn.classList.remove('notChoosed');
                                  dropdownBtn.classList.add('choosed');
                              }else{
                                  dropdownBtn.classList.remove('choosed');
                                  dropdownBtn.classList.add('notChoosed');
                              }
                          }
                  
                          updateDropdownText();
                  
                          inpGender.addEventListener("input", updateDropdownText);
                  
                          dropdownBtn.addEventListener("click", function() {
                              dropdownList.style.display = dropdownList.style.display === "block" ? "none" : "block";
                          });
                  
                          dropdownList.addEventListener("click", function(e) {
                              if (e.target.tagName === "LI") {
                                  dropdownBtn.textContent = e.target.textContent;
                                  dropdownBtn.classList.remove('notChoosed');
                                  dropdownBtn.classList.add('choosed');
                                  dropdownList.style.display = "none";
                                  inpGender.value = e.target.textContent;
                              }
                          });
                      });
                  </script>
                  </div>
                <div class="post-filtrageOne"><input type="date" name="" id="dateFrom"></div>
                <div class="post-filtrageOne"><input type="date" name="" id="dateTo"></div>
                <div class="post-filtrageThree"><button onclick="filtrePosts()">بحث</button></div>

            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.title = document.title + ' - ' + 'إدارة المنشورات';
        });
    </script>
<x-foo_ter/>


<script>
   function filtrePosts() {
    let allPosts = document.querySelectorAll('.categorieSectionTwoOneOne');
    let postsContainer = document.querySelector('.categorieSectionTwoOne');
    let searchTagElement = document.querySelector('#searchTag');
    let searchTag = searchTagElement.value;
    let tag;

    if (searchTag === 'قسم الأخبار') {
        tag = 'news';
    } else if (searchTag === 'قسم البلاغات') {
        tag = 'report';
    } else {
        tag = '';
    }

    let dateFromElement = document.querySelector('#dateFrom');
    let dateToElement = document.querySelector('#dateTo');
    let dateFrom = dateFromElement.value;
    let dateTo = dateToElement.value;

    let anyPostMatched = false;

    allPosts.forEach(post => {
        let postTag = post.getAttribute('data-tag');
        let postDate = new Date(post.getAttribute('data-date'));

        let tagMatch = tag === '' || postTag === tag;
        let dateMatch = dateFrom === '' || dateTo === '' || (postDate >= new Date(dateFrom) && postDate <= new Date(dateTo));

        if (tagMatch && dateMatch) {
            post.style.display = ''; 
            anyPostMatched = true;
        } else {
            post.style.display = 'none';
        }
    });

    if (!anyPostMatched) {
        allPosts.forEach(post => {
            post.style.display = ''; 
        });

        searchTagElement.value = '';
        dateFromElement.value = '';
        dateToElement.value = '';

        Swal.fire({
            position: "top-center",
            icon: "error",
            title: "وقع خطأ ما المرجو التأكد من صحة البيانات",
            showConfirmButton: false,
            timer: 2000
        });
    }
}
</script>
</body>
</html>