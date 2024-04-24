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
    
    @if (session()->has('demandeAdded'))
        <script>
            Swal.fire({
                position: "center-center",
                icon: "success",
                title: "{{ session('demandeAdded') }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

    

    @if (session()->has('presenceRegister'))
        <script>
            Swal.fire({
                position: "center-center",
                icon: "success",
                title: "{{ session('presenceRegister') }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif


@if (session()->has('presenceTimeout'))
        <script>
            Swal.fire({
                position: "center-center",
                icon: "success",
                title: "{{ session('presenceTimeout') }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif
    

    @if (session()->has('addNewEmp'))
        <script>
            Swal.fire({
                position: "center-center",
                icon: "success",
                title: "{{ session('addNewEmp') }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif



    @if (session()->has('status'))
        <script>
            Swal.fire({
                position: "center-center",
                icon: "success",
                title: "{{ session('status') }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

    

    @if (session()->has('settings'))
        <script>
            Swal.fire({
                position: "center-center",
                icon: "success",
                title: "{{ session('settings') }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif



    <x-landing-section_head />
    <x-admin_navbar :count="count($waitingEmploye)"/>

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


@if (auth()->user()->role === 'employe')
<div class="messageInfos">
    <span class="suivie">لائحة الواردات و الصادرات</span>
  </div>
  <div class="searchResult">
    <p>تمكنكم هذه الواجهة من الإطلاع و البحث على الواردات وكذلك الصادرات المتعلقة بهذه الواردات، الإدارية، التجارية بما فيها الشكايات والمحاضر، بما في ذلك الإطلاع على مآل الشكايات على مستوى <br>.المحكمة الإستئنافية بالعيون</p>
<div style="color: #f44336; font-size: 18px; padding: 30px 0">المرجو منكم إدخال الرقم الكامل للواردة/الشكاية أولا، ليتم تحميل لائحة الواردات أوتوماتيكيا وبعد ذلك يمكنكم اختيار الواردة</div>



    <div class="searchField">

<div class="searchOne">
        <div><button onclick="search()">بحث</button></div>
</div>
<div class="searchTwo">
    
    <div><label for="">إسم المرسِل</label></div>
    <div>
        <input type="text" id="senderNameInput" placeholder="إسم المرسِل">
    </div>
</div>

      <div class="searchThree">
        <div>
            <label for="">موطن المرسِل</label></div>
        <div>
            <input type="text" id="senderCity" placeholder="موطن المرسِل">
        </div>
      </div>

<div class="searchFour">
    
        
    <div><label for="">الموضوع</label></div>
    <div>
        <input type="text" id="senderObject" placeholder="الموضوع">
    </div>

</div>

<div class="searchFive">
    
    <div>
        <label for="">رقم الرسالة</label></div>
    <div>
        <input type="text" id="messageNumber" placeholder="رقم الرسالة">
    </div>
</div>
        
    </div>
  </div>



  <div class="theResult">
    <span class="suivie">نتيجة البحث</span>
  </div>
<div class="tableDiv">
    <table border="1" class="messages-table">
        <tr>
            <th>النتيجة</th>
            <th>المصدر و الجواب</th>
            <th>تاريخ الصادرة</th>
            <th>الموضوع</th>
            <th>موطنه</th>
            <th>إسم المرسِل</th>
            <th>تاريخ الوصول</th>
            <th>رقمها</th>
            <th>تاريخ الرسالة</th>
            <th>الرقم الترتيبي</th>
        </tr>
        @foreach ($messages as $mess)
    <tr class="messageRow">
        @if ($mess->response)
            <td>{{ $mess->response->result }}</td>
            <td>{{ $mess->response->response }}</td>
            <td>{{ explode(' ', $mess->response->created_at)[0] }}</td>
        @else
            <td></td>
            <td></td>
            <td></td>

        @endif
        <td>{{ $mess->message_object }}</td>
        <td>{{ $mess->sender_city }}</td>
        <td>{{ $mess->sender_name }}</td>
        <td>{{ $mess->received_date }}</td>
        <td>{{ $mess->message_number }}</td>
        <td>{{ $mess->message_date }}</td>
        <td>{{ $mess->id }}</td>
    </tr>
@endforeach

    </table>


    
</div>

@else



<div class="listMessages-section">

    

    @if (session()->has('delete'))
        <script>
            Swal.fire({
                position: "center-center",
                icon: "success",
                title: "{{ session('delete') }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

<div class="messageInfos">
    <span class="suivie">لائحة الموظفين</span>
  </div>
  <div class="searchResult">
    <p>تمكن هذه الواجهة من الإطلاع على جميع الموظفين على مستوى محكمة الإستئناف بالعيون بمختلف الأطر<br><span>.واجهة خاصة بالموظفين تحت مسمى وظيفي رئيس</span></p>

<div style="color: #f44336; font-size: 18px; padding: 30px 0">المرجو منكم إدخال الإسم الكامل للموظف أولا، ليتم تحميل لائحة الموظفين أوتوماتيكيا وبعد ذلك يمكنكم الإطلاع على معلومات الموظف</div>



    <div class="searchFieldAdmin">

<div></div>
        <div class="searchBtn"><button onclick="search2()">بحث</button></div>

        <div><label for="" class="searchN">نوع عمل الموظف</label></div>
        <div class="searchName">
            <input type="text" id="empType" placeholder="نوع عمل الموظف">
        </div>

        <div>
            <label for="" class="searchC">رقم تأجير الموظف</label></div>
        <div class="searchCity">
            <input type="text" id="empRental" placeholder="رقم تأجير الموظف">
        </div>

        <div>
            <label for="" class="searchN">إسم الموظف</label></div>
        <div class="searchNumber">
            <input type="text" id="empName" placeholder="إسم الموظف">
        </div>
        
    </div>
  </div>

  <div class="theResult">
    <span class="suivie">نتيجة البحث</span>
  </div>
<div class="tableDiv">
    <table border="1" class="messages-table">
        <tr>
            <th>ملاحظات</th>
            <th>العنوان الشخصي</th>
            <th>الإطار</th>
            <th>الإسم الكامل</th>
            <th>رقم التأجير</th>
            <th>الرقم الترتيبي</th>
        </tr>
        @foreach ($employees as $emp)
                <tr class="messageRow">
                    <td>{{ $emp->observations }}</td>
                    <td>{{ $emp->address }}</td>
                    <td>{{ $emp->cadre }}</td>
                    <td>{{ $emp->admin_name }}</td>
                    <td>{{ $emp->rental_number }}</td>
                    <td>{{ $emp->id - 9 }}</td>
                </tr>
            @endforeach
        

    </table>


    
</div>


@endif

@include('index')

<div class="employeDetail">
    <div class="employeDetailOne">
        <button class="hideProfile" onclick="hideDetail()">×</button>
        <img src="/img/userImg.png" alt=""></div>

    <div class="employeDetailTwo">
        <div class="employeDetailTwoOne">
            <div class="employeDetailTwoOneOne name"></div>
            <div class="employeDetailTwoOneTwo cadre"></div>
        </div>
        <div class="employeDetailTwoTwo"><span>معلومات حول الموضف</span></div>

        <div class="employeDetailTwoThree">
            <div class="employeDetailTwoThreeOne">
                <div>
                    <div class="about namee"></div>
                    <div class="about rental"></div>
                    <div class="about cadree"></div>
                    <div class="about address"></div>
                    <div class="about email"></div>
                    </div>
            </div>
            <div class="employeDetailTwoThreeTwo">
                <div>
                <div class="about">اسم الموضف</div>
                <div class="about">رقم تأجير الموضف</div>
                <div class="about">الإطار</div>
                <div class="about">العنوان</div>
                <div class="about">البريد الإكتروني للموضف</div>
                </div>
            </div>
        </div>
    </div>
</div>
@auth
    @if (auth()->user()->role === 'employe')
        @php
            $hasPresenceRecords = $presences->isNotEmpty();
            $lastPresence = $presences->first();
            $isButtonAvailable = !$hasPresenceRecords || !$lastPresence->time_in->isToday();
            $hasSetTimeOutToday = $lastPresence && $lastPresence->time_out && $lastPresence->time_out->isToday();
        @endphp
        
        @if ($isButtonAvailable)
            <div style="position: fixed; bottom: 30px; left: 30px">
                <form action="{{ route('presence.register') }}" method="post">
                    @csrf
                    <button type="submit" class="presenceButtons"><i class='bx bx-log-in-circle' style='color:#003566'></i></button>
                </form>
            </div>
        @endif

        @if ($lastPresence && $lastPresence->time_in->isToday() && !$hasSetTimeOutToday)
            <div style="position: fixed; bottom: 30px; left: 30px; z-index: 1000">
                <form action="{{ route('presence.timeout') }}" method="post">
                    @csrf
                    <button type="submit" class="presenceButtons"><i class='bx bx-log-out-circle' style='color:#003566'></i></button>
                </form>
            </div>
        @endif
    @endif
@endauth








<script>
    function showMess() {
    let mess = document.querySelector('.contactDivBtn');
    mess.classList.toggle('hideUp');
}
</script>


<script>
    function fill(name, cadre, email, role, address, rental){
        let theDetail = document.querySelector('.employeDetail')
        let theName = document.querySelector('.name')
        let theCadre = document.querySelector('.cadre')
        let theAdress = document.querySelector('.address')
        let theEmail = document.querySelector('.email')
        let theRent = document.querySelector('.rental')
        let theNamee = document.querySelector('.namee')
        let theCadree = document.querySelector('.cadree')
        
        if (theDetail.style.display = 'none') {
            theDetail.style.display = 'grid';
            theName.innerHTML = name;
            theCadre.innerHTML = cadre;
            theNamee.innerHTML = name;
            theCadree.innerHTML = cadre;
            theAdress.innerHTML = address;
            theEmail.innerHTML = email;
            theRent.innerHTML = rental;
        }
    }
</script>

<script>
    

    function hideDetail(){
        let theDetail = document.querySelector('.employeDetail')
        if (theDetail.style.display = 'grid') {
            theDetail.style.display = 'none'
        }
    }
</script>




<x-foo_ter/>


<script>
        
    function search() {
        var senderName = document.getElementById('senderNameInput').value.trim().toLowerCase();
        var senderCity = document.getElementById('senderCity').value.trim().toLowerCase()
        var messageNumber = document.getElementById('messageNumber').value.trim().toLowerCase()
        var messageObject = document.getElementById('senderObject').value.trim().toLowerCase()
        
        
        var rows = document.getElementsByClassName('messageRow');

        for (var i = 0; i < rows.length; i++) {
            var row = rows[i];
            var senderNameCell = row.getElementsByTagName('td')[5];
            var senderCityCell = row.getElementsByTagName('td')[4];
            var messageNumberCell = row.getElementsByTagName('td')[7];
            var messageObjectCell = row.getElementsByTagName('td')[3];
            if (senderNameCell.textContent.trim().toLowerCase().includes(senderName) && senderCityCell.textContent.trim().toLowerCase().includes(senderCity) && messageNumberCell.textContent.trim().toLowerCase().includes(messageNumber) && messageObjectCell.textContent.trim().toLowerCase().includes(messageObject)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        }
    }


</script>



<script>
    
function search2() {
    var empName = document.getElementById('empName').value.trim().toLowerCase();
    var empRental = document.getElementById('empRental').value.trim().toLowerCase()
    var empType = document.getElementById('empType').value.trim().toLowerCase()
    
    var rows = document.getElementsByClassName('messageRow');

    for (var i = 0; i < rows.length; i++) {
        var row = rows[i];
        var empNameCell = row.getElementsByTagName('td')[3];
        var empRentalCell = row.getElementsByTagName('td')[4];
        var empTypeCell = row.getElementsByTagName('td')[2];
        

        if (empNameCell.textContent.trim().toLowerCase().includes(empName) && empTypeCell.textContent.trim().toLowerCase().includes(empType) && empRentalCell.textContent.trim().toLowerCase().includes(empRental)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    }
}




</script>



</body>
</html>



