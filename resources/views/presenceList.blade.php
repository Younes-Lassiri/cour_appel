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
    <x-landing-section_head />
    <x-admin_navbar :count="count($waitingEmploye)"/>
<div class="messageInfos">
    <span class="suivie">لائحة الحظور الخاصة بالموظفين</span>
  </div>
  <div class="searchResult">
    <p>،تمكنكم هذه الواجهة من الإطلاع و البحث على سجل حظور الموظفين وكذلك مواقيت البدء و الإنتهاء من العمل <br> وذلك لتسهيل عملية إدارة الموظفين على مستوى المحكمة الإستئنافية بالعيون</p>
<div style="color: #f44336; font-size: 18px; padding: 30px 0">المرجو منكم إدخال الإسم الكامل للموظف أو التاريخ حسب الرغبة أولا، ليتم تحميل لائحة الموظفين أوتوماتيكيا وبعد ذلك يمكنكم الإطلاع على سجل حظور الموظف</div>



    <div class="searchFieldAdmin">

<div></div>
        <div class="searchBtn"></div>

        <div></div>
        <div class="searchName">
            <button onclick="search()" style="padding: 12px;border-radius: 10px">بحث</button>
        </div>

        <div>
            <label for="" class="searchC">التاريخ</label></div>
        <div class="searchCity">
            <input type="text" id="date" placeholder="التاريخ">
        </div>

        <div>
            <label for="" class="searchN">إسم الموظف</label></div>
        <div class="searchNumber">
            <input type="text" id="employeNameInput" placeholder="إسم الموظف">
        </div>
        
    </div>
  </div>

  <div class="theResult">
    <span class="suivie">نتيجة البحث</span>
  </div>
<div class="tableDiv">
    <table border="1" class="messages-table">
        <tr>
            <th>توقيت الخروج</th>
            <th>توقيت العمل</th>
            <th>التاريخ</th>
            <th>إسم الموظف</th>
        </tr>
        @foreach ($presence as $pre)
            <tr class="messageRow">
                <td>
                    @if ($pre->time_out)
                        {{ explode(' ', $pre->time_out)[1] }}
                    @endif
                </td>                
                <td>{{ explode(' ', $pre->time_in)[1] }}</td>
                <td>{{ explode(' ', $pre->time_in)[0] }}</td>
                <td>{{ $pre->employe_name }}</td>
            </tr>
        @endforeach

    </table>


    
</div>







<x-foo_ter/>


<script>
        
    function search() {
        var employeName = document.getElementById('employeNameInput').value.trim().toLowerCase();
        var date = document.getElementById('date').value.trim().toLowerCase()
        
        var rows = document.getElementsByClassName('messageRow');

        for (var i = 0; i < rows.length; i++) {
            var row = rows[i];
            var employeNameCell = row.getElementsByTagName('td')[3];
            var dateCell = row.getElementsByTagName('td')[2];
            

            if (employeNameCell.textContent.trim().toLowerCase().includes(employeName) && dateCell.textContent.trim().toLowerCase().includes(date)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        }
    }


</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.title = document.title + ' - ' + 'لائحة الحظور';
    });
</script>

</body>
</html>