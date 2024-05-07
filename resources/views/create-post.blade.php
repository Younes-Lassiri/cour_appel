<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="/img/icon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
    <form action="{{ route('addPost') }}" method="post" enctype="multipart/form-data">
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
            <input type="hidden" name="tag" id="tag" value="{{ old('tag') }}">
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
          <div class="create-post-sectionTwoTwo">
            <div class="create-post-sectionTwoTwoOne">
              <div class="create-post-sectionTwoTwoOneOne"><input type="text" class="@if ($errors->has('title')) errorInput @endif" name="title" autocomplete="off" value="{{ old('title') }}"><label for="" class=""><span>*  </span>عنوان المنشور</label></div>
          </div>
            <div class="create-post-sectionTwoTwoTwo">
              <div class="create-post-sectionTwoTwoTwoOne">
                <textarea name="description" id="desc-textarea" cols="" rows=""></textarea>
                <label for="">وصف المنشور (اختياري)</label>
              </div>
            </div>
            <div class="create-post-sectionTwoTwoThree">
              <div class="create-post-sectionTwoTwoThreeOne">
                صور المنشور
              </div>
              <div class="create-post-sectionTwoTwoThreeTwo">
                <div class="create-post-sectionTwoTwoThreeTwoSumb"><i class='bx bx-plus' style='color:#003566'  ></i></div>
                <div><input type="file" name="images[]" id="" multiple></div>
              </div>
            </div>
          </div>
        </div>
        <div class="create-post-sectionThree">
          <div class="create-post-sectionThreeOne">
            <div class="create-post-sectionThreeOneOne"><button type="submit">نشر</button></div>
            <div></div>
          </div>
          <div class="create-post-sectionThreeTwo"><a href="{{ route('dashboard') }}">تراجع</a></div>
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
</body>
</html>