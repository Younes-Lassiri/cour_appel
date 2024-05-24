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
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<body>
    @if (session()->has('successAccept'))
        <script>
            Swal.fire({
                position: "center-center",
                icon: "success",
                title: "{{ session('successAccept') }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif
    @if (session()->has('successReject'))
        <script>
            Swal.fire({
                position: "center-center",
                icon: "info",
                title: "{{ session('successReject') }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif
    <div class="listMessages-section">
        
        <x-landing-section_head />

        <x-admin_navbar :count="count($waitingEmploye)"/>
        
          <div class="searchResultWaiting">
            <p>تمكنكم هذه الواجهة من الإطلاع على  طلبات جهاز الحاسوب و الطابعات الخاصة بالموظفين<br><span>.واجهة خاصة بالموظفين تحت مسمى وظيفي رئيس</span></p>
          </div>


          <div class="theResult">
            
            <span class="suivie">لائحةلطلبات جهاز الحاسوب و الطابعات</span>
          </div>

        <div class="tableDiv">
            <table border="1" class="messages-table">
                <tr>
                    <th>طباعة</th>
                    <th>قبول الطلب</th>
                    <th>رفض الطلب</th>
                    <th>دواعي الإستعمال</th>
                    <th>الكمية المطلوبة</th>
                    <th>نوعية المطلوبات</th>
                    <th>الرقم الترتيبي</th>
                </tr>
                @foreach ($devicesDemandes as $dev)
                    <tr class="messageRow">
                    <td>
                        <form action="{{ route('download.pdf.device') }}" method="POST">
                            @csrf
                            <input type="hidden" name="employe_name" value="{{ $dev->employe_name }}">
                            <input type="hidden" name="id" value="{{ $dev->id }}">
                            <input type="hidden" name="typeF" value="{{ $dev->type_device }}">
                            <input type="hidden" name="nF" value="{{ $dev->number_device }}">
                            <input type="hidden" name="why" value="{{ $dev->why }}">
                            <input type="hidden" name="date" value="{{ $dev->created_at }}">
                            <button type="submit" class="press">طبع</button>
                        </form>
                    </td>

                    @if ($dev->status === 'under review')
                            <td>
                                <form action="{{ route('admin-accept-device', $dev->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="acceptDemande">✓</button>
                                </form>
                            </td>
                        @else
                            @if ($dev->status === 'not approved')
                                <td><span style="color: #f03738">تم الرفض</span></td>
                            @else
                                <td><span style="color: #088772">تمت الموافقة</span></td>
                            @endif
                        @endif
                        @if ($dev->status === 'under review')
                            <td>
                                <form action="{{ route('admin-reject-device', $dev->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="cancelDemande"><i class='bx bx-x'></i></button>
                                </form>
                            </td>
                        @else
                        <td></td>
                        @endif
                        <td>{{ $dev->why }}</td>
                        <td>{{ $dev->number_device	 }}</td>
                        <td>{{ $dev->type_device }}</td>
                        <td>{{ $dev->id }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.title = document.title + ' - ' + 'طلبات جهاز الحاسوب و الطابعات';
        });
    </script>

    <x-foo_ter/>
    
    
</body>
</html>