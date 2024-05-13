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
            <p>تمكنكم هذه الواجهة من الإطلاع على  طلبات الولادة الخاصة بالموظفين<br><span>.واجهة خاصة بالموظفين تحت مسمى وظيفي رئيس</span></p>
          </div>


          <div class="theResult">
            
            <span class="suivie">لائحة طلبات الولادة</span>
          </div>

        <div class="tableDiv">
            <table border="1" class="messages-table">
                <tr>
                    <th>طباعة</th>
                    <th>تاريخ العودة من الإجازة</th>
                    <th>تاريخ بداية الإجازة</th>
                    <th>مدة الإجازة</th>
                    <th>تاريخ الولادة المتوقع</th>
                    <th>رقم تأجير الموظف</th>
                    <th>نوع عمل الموظف</th>
                    <th>إسم الموظف</th>
                    <th>الرقم الترتيبي</th>
                </tr>
                @foreach ($bornDemandes as $born)
                    <tr class="messageRow">
                        <td>
                            <form action="{{ route('download.pdf.born') }}" method="POST">
                                @csrf
                                <input type="hidden" name="employe_name" value="{{ $born->employe_name }}">
                                <input type="hidden" name="work_type" value="{{ $born->work_type }}">
                                <input type="hidden" name="rental" value="{{ $born->rental_number }}">
                                <input type="hidden" name="born_date" value="{{ $born->born_date }}">
                                <input type="hidden" name="born_duree" value="{{ $born->born_duree }}">
                                <input type="hidden" name="born_start" value="{{ $born->born_start }}">
                                <input type="hidden" name="born_back" value="{{ $born->born_back }}">
                                <input type="hidden" name="date" value="{{ $born->created_at }}">
                                <button type="submit" class="press">طبع</button>
                            </form>
                        </td>
                        <td>{{ $born->born_back }}</td>
                        <td>{{ $born->born_start }}</td>
                        <td>{{ $born->born_duree }}</td>
                        <td>{{ $born->born_date }}</td>
                        <td>{{ $born->rental_number }}</td>
                        <td>{{ $born->work_type }}</td>
                        <td>{{ $born->employe_name }}</td>
                        <td>{{ $born->id }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <x-foo_ter/>
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.title = document.title + ' - ' + 'طلبات-الولادة';
        });
    </script>
</body>
</html>