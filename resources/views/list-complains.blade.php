@php
    $notices = App\Models\Notice::get();
@endphp
@include('index')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>نافذة الحق</title>
    <link rel="icon" href="/img/icon.ico">
    <link rel="stylesheet" href="/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="listMessages-section">
        <x-landing-section_head />
        <x-admin_navbar/>
          <div class="searchResultWaiting">
            <p style="direction: rtl">تمكن هذه الواجهة من معاينة طلبات الشكايات المقدمة من طرف المستخدمين. و لديك إمكانية معالجة هذه الشكايات.<br><span style="direction: rtl">واجهة خاصة بالموظفين تحت مسمى وظيفي موضف.</span></p>
            <div class="searchField">

                <div class="searchOne">
                        <div><button onclick="search()">بحث</button></div>
                </div>
                <div class="searchTwo">
                    
                    <div><label for="">	نوع الطلب</label></div>
                    <div>
                        <input type="text" id="complainType" placeholder="نوع الطلب">
                    </div>
                </div>
                
                      <div class="searchThree">
                        <div>
                            <label for="">رقم بطاقة التعريف</label></div>
                        <div>
                            <input type="text" id="senderCin" placeholder="رقم بطاقة التعريف">
                        </div>
                      </div>
                
                <div class="searchFour">
                    
                        
                    <div><label for="">الإسم الشخصي للمشتكي</label></div>
                    <div>
                        <input type="text" id="senderName" placeholder="الإسم الشخصي للمشتكي">
                    </div>
                
                </div>
                
                <div class="searchFive">
                    
                    <div>
                        <label for="">رقم التتبع</label></div>
                    <div>
                        <input type="text" id="suiviNum" placeholder="رقم التتبع">
                    </div>
                </div>
                        
                    </div>
        </div>
          <div class="theResult">
            <span class="suivie">لائحة الشكايات</span>
          </div>
        
        <div class="tableDivChikaya">
            <div class="tableDivChikayaOne">
                <table border="1" class="messages-tableChikaya">
                    <tr>
                        <th>المرفقات</th>
                        <th>الوقت التقريبي</th>
                        <th>تاريخ الإعتداء</th>
                        <th>جنس المعتدي</th>
                        <th>الإسم الشخصي للمعتدي</th>
                        <th>نوع الطلب</th>
                        <th>تاريخ ازدياد المشتكي</th>
                        <th>رقم بطاقة التعريف</th>
                        <th>جنسية المشتكي</th>
                        <th>بطاقة التعريف</th>
                        <th>رقم الهاتف المشتكي</th>
                        <th>البريد الإلكتروني للمشتكي</th>
                        <th>جنس المشتكي</th>
                        <th>الإسم الشخصي للمشتكي</th>
                        <th>رقم التتبع</th>
                    </tr>
                    @foreach ($complains as $complain)
                        <tr class="messageRow">
                            <td style="text-align: center"><i class='bx bx-show' style='color:#003566; font-size: 20px; cursor: pointer' onclick="showAttach(
                                '<?php echo $complain->cinImage ?>',
                                '<?php echo $complain->cinImage ?>'
                            )"></i></td>
                            <td>{{ $complain->time }}</td>
                            <td>{{ $complain->date }}</td>
                            @if ($complain->crimenalGender)
                                <td>{{ $complain->crimenalGender }}</td>
                            @else
                                <td>مجهول</td>
                            @endif
                            @if ($complain->crimenalName = '')
                                <td>{{ $complain->crimenalName }}</td>
                            @else
                                <td>مجهول</td>
                            @endif
                            <td>{{ $complain->complainType }}</td>
                            <td>{{ $complain->senderNaissance }}</td>
                            <td>{{ $complain->senderCin }}</td>
                            <td>{{ $complain->senderNationality }}</td>
                            <td>{{ $complain->senderDocumentType }}</td>
                            <td>{{ $complain->senderPhone }}</td>
                            <td>{{ $complain->senderEmail }}</td>
                            <td>{{ $complain->senderGender }}</td>
                            <td>{{ $complain->senderName }}</td>
                            <td>{{ $complain->suiviNum }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="attachmentImages">
            <div class="attachmentImagesOne">

            </div>
            <div class="attachmentImagesTwo">
                
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.title = document.title + ' - ' + 'تدبير الشكايات';
        });
    </script>
    <x-foo_ter/>
    

    <script>
        function showAttach(imageOne, imageTwo) {
            let attach = document.querySelector('.attachmentImages');
            let attachOne = document.querySelector('.attachmentImagesOne');
            let attachTwo = document.querySelector('.attachmentImagesTwo');
    
            if (attach.style.display === 'none') {
                attachOne.innerHTML = `<img src="{{ asset('storage/' . '${imageOne}') }}" alt="Image One">`;
                attachTwo.innerHTML = `<img src="{{ asset('storage/' . '${imageTwo}') }}" alt="Image Two">`;
                attach.style.display = 'grid';
            } else {
                attach.style.display = 'none';
            }
        }
    </script>
    

    
<script>
        
    function search() {
        var senderName = document.getElementById('senderName').value.trim().toLowerCase();
        var senderCin = document.getElementById('senderCin').value.trim().toLowerCase()
        var complainType = document.getElementById('complainType').value.trim().toLowerCase()
        var suiviNum = document.getElementById('suiviNum').value.trim().toLowerCase()
        
        
        var rows = document.getElementsByClassName('messageRow');

        for (var i = 0; i < rows.length; i++) {
            var row = rows[i];
            var senderNameCell = row.getElementsByTagName('td')[13];
            var senderCinCell = row.getElementsByTagName('td')[7];
            var suiviNumCell = row.getElementsByTagName('td')[14];
            var complainTypeCell = row.getElementsByTagName('td')[5];
            if (senderNameCell.textContent.trim().toLowerCase().includes(senderName) && senderCinCell.textContent.trim().toLowerCase().includes(senderCin) && complainTypeCell.textContent.trim().toLowerCase().includes(complainType) && suiviNumCell.textContent.trim().toLowerCase().includes(suiviNum)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        }
    }


</script>
</body>
</html>