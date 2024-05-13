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
        
        <x-landing-section_head />

        <x-admin_navbar :count="count($waitingEmploye)"/>

        
          <div class="searchResultWaiting">
            <p>تمكن هذه الواجهة من الإطلاع على جميع الموظفين على مستوى محكمة الإستئناف بالعيون بمختلف الأطر، وكذلك إمكانية حذف الموظفين حسب الرغبة<br><span>.واجهة خاصة بالموظفين تحت مسمى وظيفي رئيس</span></p>



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
            
            <span class="suivie">لائحة الموظفين</span>
          </div>


        <div class="tableDiv">
            <table border="1" class="messages-table">
                <tr>
                    <th>حذف</th>
                    <th>ملاحظات</th>
                    <th>العنوان الشخصي</th>
                    <th>الإطار</th>
                    <th>الإسم الكامل</th>
                    <th>رقم التأجير</th>
                    <th>الرقم الترتيبي</th>
                </tr>
                @foreach ($employees as $emp)
                    <tr class="messageRow">
                        <td>
                            <form action="{{ route('employe.delete', $emp->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="cancelDemande"><i class='bx bx-x'></i></button>
                            </form>
                        </td>
                        <td>{{ $emp->observations }}</td>
                        <td>{{ $emp->address }}</td>
                        <td>{{ $emp->cadre }}</td>
                        <td>{{ $emp->admin_name }}</td>
                        <td>{{ $emp->rental_number }}</td>
                        <td>{{ $emp->id - 9}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <x-foo_ter/>

    

    <script>
    
        function search2() {
            var empName = document.getElementById('empName').value.trim().toLowerCase();
            var empRental = document.getElementById('empRental').value.trim().toLowerCase()
            var empType = document.getElementById('empType').value.trim().toLowerCase()
            
            var rows = document.getElementsByClassName('messageRow');
        
            for (var i = 0; i < rows.length; i++) {
                var row = rows[i];
                var empNameCell = row.getElementsByTagName('td')[4];
                var empRentalCell = row.getElementsByTagName('td')[5];
                var empTypeCell = row.getElementsByTagName('td')[3];
                
        
                if (empNameCell.textContent.trim().toLowerCase().includes(empName) && empTypeCell.textContent.trim().toLowerCase().includes(empType) && empRentalCell.textContent.trim().toLowerCase().includes(empRental)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        }
        </script>
        
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                document.title = document.title + ' - ' + 'تدبير الموظفين';
            });
        </script>
</body>
</html>

