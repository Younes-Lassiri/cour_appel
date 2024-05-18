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

        <x-admin_navbar :count="count($waitingEmploye)"/>


        
        @if (session()->has('demandeAccepted'))
            <script>
                Swal.fire({
                    position: "center-center",
                    icon: "success",
                    title: "{{ session('demandeAccepted') }}",
                    showConfirmButton: false,
                    timer: 2000
                });
            </script>
        @endif


        @if (session()->has('demandeRefused'))
            <script>
                Swal.fire({
                    position: "center-center",
                    icon: "error",
                    title: "{{ session('demandeRefused') }}",
                    showConfirmButton: false,
                    timer: 2000
                });
            </script>
        @endif
        
          <div class="searchResultWaiting">
            <p>تمكنكم هذه الواجهة من الإطلاع على طلبات الغياب الخاصة بالموظفين، على مستوى المحكمة الإستئنافية بالعيون<br><span>.واجهة خاصة بالموظفين تحت مسمى وظيفي رئيس</span></p>
          </div>


          <div class="theResult">
            
            <span class="suivie">لائحة الموظفين</span>
          </div>

        <div class="tableDiv">
            <table border="1" class="messages-table">
                <tr>
                    <th>طباعة</th>
                    <th>السبب</th>
                    <th>إلى</th>
                    <th>من</th>
                    <th>إسم الموظف</th>
                </tr>
                @foreach ($demandes as $dem)
                    <tr class="messageRow">
                        <td>
                            <form action="{{ route('download.pdf.presence') }}" method="POST">
                                @csrf
                                <input type="hidden" name="employe_name" value="{{ $dem->employe_name }}">
                                <input type="hidden" name="df" value="{{ $dem->date_from }}">
                                <input type="hidden" name="dt" value="{{ $dem->date_to }}">
                                <input type="hidden" name="reason" value="{{ $dem->reason }}">
                                <input type="hidden" name="created_at" value="{{ $dem->created_at }}">
                                <button type="submit" class="press">طبع</button>
                            </form>
                        </td>
                        <td>{{ $dem->reason }}</td>
                        <td>{{ $dem->date_to }}</td>
                        <td>{{ $dem->date_from }}</td>
                        <td>{{ $dem->employe_name }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

   

    <x-foo_ter/>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.title = document.title + ' - ' + 'طلبات الغياب';
        });
    </script>
    
</body>
</html>