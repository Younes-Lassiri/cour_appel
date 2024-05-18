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

<body>
    <div class="listMessages-section">
        
        <x-landing-section_head />

        <x-admin_navbar :count="count($waitingEmploye)"/>
        
          <div class="searchResultWaiting">
            <p>تمكنكم هذه الواجهة من الإطلاع على  طلبات الرخص الإدارية الخاصة بالموظفين<br><span>.واجهة خاصة بالموظفين تحت مسمى وظيفي رئيس</span></p>
          </div>


          <div class="theResult">
            
            <span class="suivie">لائحة الطلبات</span>
          </div>

        <div class="tableDiv">
            <table border="1" class="messages-table">
                <tr>
                    <th>طباعة</th>
                    <th>تاريخ مغادرة التراب الوطني</th>
                    <th>مدة الرخصة</th>
                    <th>تاريخ الرخصة الإدارية</th>
                    <th>تاريخ الإرسال</th>
                    <th>رقم تأجير الموظف</th>
                    <th>نوع عمل الموظف</th>
                    <th>إسم الموظف</th>
                    <th>الرقم الترتيبي</th>
                </tr>
                @foreach ($licenceDemandes as $lic)
                    <tr class="messageRow">
                        <td>
                            <form action="{{ route('download.pdf.licence') }}" method="POST">
                                @csrf
                                <input type="hidden" name="employe_name" value="{{ $lic->employe_name }}">
                                <input type="hidden" name="work_type" value="{{ $lic->work_type }}">
                                <input type="hidden" value="{{ $lic->rental }}" name="rental">
                                <input type="hidden" name="send_date" value="{{ explode(' ', $lic->created_at)[0] }}">
                                <input type="hidden" name="licence_date" value="{{ explode('-', explode(' ', $lic->created_at)[0])[0] }}">
                                <input type="hidden" name="licence_duree" value="{{ $lic->duree }}">
                                <input type="hidden" name="leave_date" value="{{ $lic->leave_date }}">
                                <button type="submit" class="press">طبع</button>
                            </form>
                        </td>
                        <td>{{ $lic->leave_date }}</td>
                        <td>{{ $lic->duree }}</td>
                        <td>{{ explode(' ', $lic->created_at)[0] }}</td>
                        <td>{{ explode('-', explode(' ', $lic->created_at)[0])[0] }}</td>
                        <td>{{ $lic->rental }}</td>
                        <td>{{ $lic->work_type }}</td>
                        <td>{{ $lic->employe_name }}</td>
                        <td>{{ $lic->id }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.title = document.title + ' - ' + 'طلبات رخصة إدارية';
        });
    </script>

    <x-foo_ter/>
    
    
</body>
</html>