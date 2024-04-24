<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <link rel="icon" href="https://assets.edlin.app/favicon/favicon.ico"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <link rel="stylesheet" href="/css/second.css">
</head>
<body>
  
  <div class="allMessagesDivOne">
    <div class="allMessagesDivOneThree"><i class='bx bx-chevron-up thei' style='color:#000009' onclick="showAll()"></i></div>
    <div class="allMessagesDivOneTwo">الرسائل</div>
    <div class="allMessagesDivOneOne"><img src="https://media.licdn.com/dms/image/D5635AQFdF6WqXOQQpg/profile-framedphoto-shrink_100_100/0/1711765573946?e=1714500000&v=beta&t=b9UEt3a44862RmvJ-pjYuNdknaKPdt2JEs4yxXBbEbo" alt=""></div>
    
  </div>
  <div class="allMessagesDiv">
    <div class="allMessagesDivMain">
      <div class="allMessagesDivMainOne">
        <input type="hidden" name="" id="authName" value="{{ auth()->user()->admin_name }}">
        @foreach ($notices as $notice)
            <div class="messInfosDiv">
              <div class="messInfosDivOne">
                <img src="https://media.licdn.com/dms/image/D5635AQFdF6WqXOQQpg/profile-framedphoto-shrink_100_100/0/1711765573946?e=1714500000&v=beta&t=b9UEt3a44862RmvJ-pjYuNdknaKPdt2JEs4yxXBbEbo" alt="">
              </div>
              <div class="messInfosDivTwo">
                <div class="messInfosDivTwoOne">
                  <h6 style="color: #000000bf; font-weight: 500">{{ $notice->admin->admin_name }}</h6>
                  <h6 style="color: #000000bf; font-weight: 800">.</h6>
                  <h6 style="color: #00000099; font-size: 12px">{{ explode(':', explode(' ',  $notice->created_at)[1])[0] }}:{{ explode(':', explode(' ',  $notice->created_at)[1])[1] }}</h6>
                </div>
                <div class="messInfosDivTwoTwo">
                  {{ $notice->content }}
                </div>
              </div>
            </div>
        @endforeach
      </div>
      <form id="hiddenForm" action="{{ route('sendNotice') }}" method="POST" hidden>
        @csrf
        <input type="text" name="content" id="theContent">
      </form>
      <div class="allMessagesDivMainTwo">
        <form id="messageForm">
          @csrf
          <input type="text" name="message" id="message" placeholder="... اكتب رسالة " oninput="checkMess()">
        
      </div>
      <div class="allMessagesDivMainThree">
        <div class="allMessagesDivMainThreeOne"><button type="submit" class="sendMessage" id="sendButton"><i class='bx bxs-send' style="color: #000000bf"></i></button></div>
      </div>
    </form>
    </div>
  </div>
  
<script>
  function checkMess(){
    let inp = document.querySelector('#message');
    let btn = document.querySelector('.sendMessage');
    if (inp.value === '') {
      btn.classList.add('notFilled');
    }else{
      btn.classList.remove('notFilled');
    }
  }
  document.addEventListener("DOMContentLoaded", function() {
    checkMess();
});
</script>

<script>
  function showAll() {
    let infosDiv = document.querySelector('.allMessagesDivOne');
    let messDiv = document.querySelector('.allMessagesDiv');
    let theI = document.querySelector('.thei');

    if (infosDiv.style.bottom === '' || infosDiv.style.bottom === '0px') {
      infosDiv.style.bottom = '450px';
      messDiv.style.height = '450px';
      theI.classList.remove('bx-chevron-up');
      theI.classList.add('bx-chevron-down');
    } else {
      infosDiv.style.bottom = '0';
      messDiv.style.height = '0';
      theI.classList.add('bx-chevron-up');
      theI.classList.remove('bx-chevron-down');
    }
  }
</script>


<script>
  let currentTime = new Date();
  let hours = currentTime.getHours();
  let minutes = currentTime.getMinutes();
  hours = hours < 10 ? '0' + hours : hours;
  minutes = minutes < 10 ? '0' + minutes : minutes;
  let authName = document.querySelector('#authName').value;
  const pusher = new Pusher('{{config('broadcasting.connections.pusher.key')}}', { cluster: 'eu' });
  const channel = pusher.subscribe('public');
  channel.bind('chat', function (data) {
    $(".allMessagesDivMainOne").append('<div class="messInfosDiv message"><div class="messInfosDivOne"><img src="https://media.licdn.com/dms/image/D5635AQFdF6WqXOQQpg/profile-framedphoto-shrink_100_100/0/1711765573946?e=1714500000&v=beta&t=b9UEt3a44862RmvJ-pjYuNdknaKPdt2JEs4yxXBbEbo" alt=""></div><div class="messInfosDivTwo"><div class="messInfosDivTwoOne"><h6 style="color: #000000bf; font-weight: 500">' + authName + '</h6><h6 style="color: #000000bf; font-weight: 800">.</h6><h6 style="color: #00000099; font-size: 12px">' + hours + ':' + minutes + '</h6></div><div class="messInfosDivTwoTwo">' + data.message + '</div></div></div>');  });
  $("#messageForm").submit(function (event) {
    event.preventDefault();
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
        $(".allMessagesDivMainOne").append('<div class="messInfosDiv message"><div class="messInfosDivOne"><img src="https://media.licdn.com/dms/image/D5635AQFdF6WqXOQQpg/profile-framedphoto-shrink_100_100/0/1711765573946?e=1714500000&v=beta&t=b9UEt3a44862RmvJ-pjYuNdknaKPdt2JEs4yxXBbEbo" alt=""></div><div class="messInfosDivTwo"><div class="messInfosDivTwoOne"><h6 style="color: #000000bf; font-weight: 500">' + authName + '</h6><h6 style="color: #000000bf; font-weight: 800">.</h6><h6 style="color: #00000099; font-size: 12px">' + hours + ':' + minutes + '</h6></div><div class="messInfosDivTwoTwo">' + $("#message").val() + '</div></div></div>');
        $("#message").val('');
        $("#sendButton").addClass('notFilled');
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
</script>

<script>
  function setContent(){
    let cont = document.querySelector('#theContent');
    let mess = document.querySelector('#message').value;
    cont.value = mess;
  }
  document.querySelector('#message').addEventListener('input', setContent);
</script>
</body>
</html>
