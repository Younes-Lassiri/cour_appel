<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>نافذة الحق</title>
    <link rel="icon" href="/img/icon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/upload.css">
    <link rel="stylesheet" href="/css/main.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <x-landing-section_head />
    <x-admin_navbar/>
    <form action="{{ route('post-update', $post->id) }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="create-post-section">
        <div class="create-post-sectionOne">
          <div class="create-post-sectionOneOne">
            <span style="color: #ffbc2b; font-size: 18px; font-weight: 400">الخطوة 2</span><span style="color: #000009; font-size: 20px; font-weight: 700">اختيار قسم المنشور</span>
          </div>
          <div class="create-post-sectionOneTwo"><span style="color: #ffbc2b; font-size: 18px; font-weight: 400">الخطوة 1</span><span style="color: #000009; font-size: 20px; font-weight: 700">إنشاء منشور</span></div>
        </div>
        <div class="create-post-sectionTwo">
          <div class="create-post-sectionTwoOne">
            <input type="hidden" name="tag" id="tag" value="{{ $post->tag }}">
              <div class="dropdown theDropdownCreate @if ($errors->has('tag')) errorInput @endif">
                  <div class="dropdown-btn notChoosed">اختيار القسم</div>
                  <ul class="dropdown-list">
                      <li>قسم الأخبار</li>
                      <li>قسم البلاغات</li>
                  </ul>
              </div>
          <script>
              document.addEventListener("DOMContentLoaded", function() {
                  const dropdownBtn = document.querySelector(".create-post-sectionTwoOne .dropdown-btn");
                  const dropdownList = document.querySelector(".create-post-sectionTwoOne .dropdown-list");
                  let inpGender = document.querySelector('#tag');
          
                  function updateDropdownText() {
                      if (inpGender.value.trim() !== '') {
                          dropdownBtn.textContent = inpGender.value === 'news'? 'قسم الأخبار' : 'قسم البلاغات';
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
          <div class="create-post-sectionTwoTwo">
            <div class="create-post-sectionTwoTwoOne">
              <div class="create-post-sectionTwoTwoOneOne"><input type="text" class="@if ($errors->has('title')) errorInput @endif" name="title" autocomplete="off" value="{{ $post->title }}"><label for="" class=""><span>*  </span>عنوان المنشور</label></div>
          </div>
            <div class="create-post-sectionTwoTwoTwo">
              <div class="create-post-sectionTwoTwoTwoOne">
                <textarea name="description" id="desc-textarea" cols="" rows="">{{ $post->description }}</textarea>
                <label for="">وصف المنشور (اختياري)</label>
              </div>
            </div>
            <div class="create-post-sectionTwoTwoThree">
              <div>
                <input type="file" id="file-input" name="images[]" accept="image/png, image/jpeg" onchange="preview()" multiple>
              <label for="file-input" id="label">
            <i class="bx bxs-cloud-upload"></i> &nbsp; تحديد الصور
        </label>
        <p id="num-of-files">لم يتم تحديد صور بعد</p>
              </div>
        <div id="images">
        </div>
            </div>
          </div>
        </div>
        <div class="create-post-sectionThree">
          <div class="create-post-sectionThreeOne">
            <div class="create-post-sectionThreeOneOne"><button type="submit">نشر</button></div>
            <div></div>
          </div>
          <div class="create-post-sectionThreeTwo"><a href="{{ route('gestionPosts') }}"><button type="button">تراجع</button></a></div>
        </div>
    </div>
    </form>
    <x-foo_ter/>
    <script>
        ClassicEditor
            .create( document.querySelector( '#desc-textarea' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.title = document.title + ' - ' + 'تعديل منشور';
    });
</script>

<script src="/js/main.js"></script>
</body>
</html>