<!DOCTYPE html>
<html lang="en">
<head>
  <title>Chat Laravel Pusher | Edlin App</title>
  <link rel="icon" href="https://assets.edlin.app/favicon/favicon.ico"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <link rel="stylesheet" href="/css/main.css">
</head>

<body>
  <div class="theAll">
    <div class="contactDivBtn">
        <div class="messTitle">
            <div class="messTitleO"><i class='bx bxs-group'></i></div>
            <div class="messTitleTw">مجموعة محكمة الإستئناف</div>
            <div class="messTitleT"></div>
        </div>
        <div class="messages gridMessages">
@foreach ($notices as $notice)

@if ($notice->admin_id === auth()->user()->id)
<div class="messDivAuth">
    <div class="after">
                <i class='bx bx-chevron-down' style='color:#dadada' class="nav-link dropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
              <ul class="dropdown-menu theMessOpt">
                <form action="{{ route('delete-message', $notice->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="deleteMessage"><li class="dropdown-item"><a href="#">حذف</a></li>
                    </button>
                </form>
        </ul>
    </div>
    <div class="content">{{ $notice->content }}<br/><span style="font-size: 13px; color: rgb(204, 203, 203)">{{ explode(':', explode(' ', $notice->created_at)[1])[0] }}:{{ explode(':', explode(' ', $notice->created_at)[1])[1] }}</span></div>
     
</div>
@else
<div class="emp-profile">
        <div onclick="fill('<?php echo $notice->admin->admin_name ?>', '<?php echo $notice->admin->cadre ?>', '<?php echo $notice->admin->email ?>', '<?php echo $notice->admin->role ?>', '<?php echo $notice->admin->address ?>',<?php echo $notice->admin->rental_number ?>)" style="cursor: pointer"><i class='bx bxs-user-circle' style='color:#ffffff; font-size: 25px'  ></i></div>
  
    
    <div class="messDivNotAuth">
        <div><span style="color: #53bded; font-weight: 600; font-size: 12px">{{ $notice->admin->admin_name }}</span><br/>{{ $notice->content }}<br/><span style="font-size: 13px; color: rgb(204, 203, 203)">{{ explode(':', explode(' ', $notice->created_at)[1])[0] }}:{{ explode(':', explode(' ', $notice->created_at)[1])[1] }}</span></div>
    </div>
</div>
@endif
@endforeach

        </div>
        <form id="messageForm">
          @csrf
          <div id="contentInput">
              <input type="text" id="message" name="message" placeholder="اكتب رسالة">
              <div class="sendBtn"><button type="submit"><i class='bx bxs-send' style="color: white"></i></button></div>
          </div>
        </form>
        <form id="hiddenForm" action="{{ route('sendNotice') }}" method="POST" hidden>
          @csrf
          <input type="text" name="content" id="theContent">
        </form>
    </div>
    <div class="gridBtn"><button onclick="showMess()" type="button" class="presenceButtons"><i class='bx bxs-chat' style='color:#003566'></i></button></div>
  </div>

  <script>
    // JavaScript code to handle Pusher and form submission
    const pusher = new Pusher('{{config('broadcasting.connections.pusher.key')}}', { cluster: 'eu' });
    const channel = pusher.subscribe('public');

    // Receive messages
    channel.bind('chat', function (data) {
      // Append received message to the chat window
      $(".messages").append('<div class="messDivNotAuth message">' + data.message + '</div>');
      // Scroll to the bottom of the chat window
      $(document).scrollTop($(document).height());
    });

    // Handle form submission
    $("#messageForm").submit(function (event) {
      event.preventDefault(); // Prevent default form submission

      // Send message via AJAX
      $.ajax({
        url: "/broadcast",
        method: 'POST',
        headers: {
          'X-Socket-Id': pusher.connection.socket_id
        },
        data: {
          _token: '{{csrf_token()}}',
          message: $("#message").val(),
        },
        success: function (res) {
          $(".messages").append('<div class="messDivAuth message">' + $("#message").val() + '</div>');
          $("#message").val('');
          $(document).scrollTop($(document).height());

          $("#hiddenContent").val($("#message").val());
          $.ajax({
            url: $("#hiddenForm").attr('action'),
            method: $("#hiddenForm").attr('method'),
            data: $("#hiddenForm").serialize(),
            success: function (response) {
            },
            error: function (xhr, status, error) {
            }
          });
        }
      });
    });

    // Function to toggle the visibility of the chat window
    function showMess() {
      let mess = document.querySelector('.contactDivBtn');
      mess.classList.toggle('hideUp');
    }
  </script>

  <script>
    function setContent(){
      let cont = document.querySelector('#theContent');
      let mess = document.querySelector('#message').value;
      cont.value = mess;
    }

    // Update content input field on every letter entry
    document.querySelector('#message').addEventListener('input', setContent);
  </script>
</body>
</html>
