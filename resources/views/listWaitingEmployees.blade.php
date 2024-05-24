@php
    $notices = App\Models\Notice::get();
@endphp


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>نافذة الحق</title>
    <link rel="icon" href="/img/icon.ico">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
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

        <x-admin_navbar :count="count($waitingEmploye)"/>

        
          <div class="searchResultWaiting">
            <p>تمكن هذه الواجهة من معاينة طلبات التسجيل المقدمة من الموظفين والمديرين الجدد على حد سواء. لديك الخيار لقبول أو رفض هذه الطلبات حسب الرغبة<br><span>.واجهة خاصة بالموظفين تحت مسمى وظيفي رئيس</span></p>
          </div>
          <div class="theResult">
            
            <span class="suivie">لائحة الموظفين</span>
          </div>


          @if (session()->has('accept'))
            <script>
                Swal.fire({
                    position: "center-center",
                    icon: "success",
                    title: "{{ session('accept') }}",
                    showConfirmButton: false,
                    timer: 2000
                });
            </script>
        @endif

        @if (session()->has('reject'))
            <script>
                Swal.fire({
                    position: "center-center",
                    icon: "success",
                    title: "{{ session('reject') }}",
                    showConfirmButton: false,
                    timer: 2000
                });
            </script>
        @endif

        
        <div class="tableDiv">
            <table border="1" class="messages-table">
                <tr>
                    <th>رفض الطلب</th>
                    <th>الموافقة على الطلب</th>
                    <th>وضعية الطلب</th>
                    <th>المسمى الوظيفي</th>
                    <th>البريد الإلكتروني</th>
                    <th>إسم الموظف</th>
                </tr>
                @foreach ($waitingEmploye as $emp)
                    <tr class="messageRow">
                        <td>
                            <form action={{ route('employe.reject', $emp->id) }} method="post">
                                @csrf
                                <button type="submit" class="rejectDemande"><i class='bx bx-plus'></i></button>
                            </form>
                        </td>
                        <td>
                            <form action={{ route('employe.accept', $emp->id) }} method="post">
                                @csrf
                                <button type="submit" class="acceptDemande">✓</button>
                            </form>
                        </td>
                        <td style="color: #088772">قيد الانتظار</td>
                        <td>
                            @if ($emp->role === 'employe')
                                موظف
                            @else
                                رئيس    
                            @endif
                        </td>
                        <td>{{ $emp->email }}</td>
                        <td>{{ $emp->admin_name }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.title = document.title + ' - ' + 'طلبات التسجيل';
        });
    </script>
    <x-foo_ter/>
    
    @include('index')
    
</body>
</html>