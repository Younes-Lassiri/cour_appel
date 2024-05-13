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
            <p>تمكنكم هذه الواجهة من الإطلاع على  طلبات الطوابع المطاطية الخاصة بالموظفين<br><span>.واجهة خاصة بالموظفين تحت مسمى وظيفي رئيس</span></p>
          </div>


          <div class="theResult">
            
            <span class="suivie">لائحة طلبات الطوابع المطاطية</span>
          </div>

        <div class="tableDiv">
            <table border="1" class="messages-table">
                <tr>
                    <th>طباعة</th>
                    <th>الملاحظات</th>
                    <th>القسم الخاص به</th>
                    <th>الكمية المطلوبة</th>
                    <th>نموذج الطابع المطاطي</th>
                    <th>الرقم الترتيبي</th>
                </tr>
                @foreach ($plastiqueDemandes as $pla)
                    <tr class="messageRow">
                        <td>
                            <form action="{{ route('download.pdf.plastique') }}" method="POST">
                                @csrf
                                <input type="hidden" name="employe_name" value="{{ $pla->employe_name }}">
                                <input type="hidden" name="id" value="{{ $pla->id }}">
                                <input type="hidden" name="typeP" value="{{ $pla->prototype }}">
                                <input type="hidden" name="nP" value="{{ $pla->number_prototype }}">
                                <input type="hidden" name="class" value="{{ $pla->class }}">
                                <input type="hidden" name="date" value="{{ $pla->created_at }}">
                                <input type="hidden" name="obs" value="{{ $pla->observations }}">
                                <button type="submit" class="press">طبع</button>
                            </form>
                        </td>
                        <td>{{ $pla->observations }}</td>
                        <td>{{ $pla->class }}</td>
                        <td>{{ $pla->number_prototype }}</td>
                        <td>{{ $pla->prototype }}</td>
                        <td>{{ $pla->id }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.title = document.title + ' - ' + 'طلبات-الطوابع-المطاطية';
        });
    </script>
    <x-foo_ter/>
    
    
</body>
</html>