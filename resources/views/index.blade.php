<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <link rel="icon" href="https://assets.edlin.app/favicon/favicon.ico"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/howler@2.2.3/dist/howler.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <link rel="stylesheet" href="/css/second.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>
<body>
  
  <div class="allMessagesDivOne">
    <div class="allMessagesDivOneThree"><i class='bx bx-chevron-up thei' style='color:#000009' onclick="showAll()"></i></div>
    <div class="allMessagesDivOneTwo">الرسائل</div>
    <div class="allMessagesDivOneOne"><img src="/img/maroc-logo.png" alt=""></div>
  </div>
  <div class="allMessagesDiv">
    <div class="allMessagesDivMain">
      <div class="allMessagesDivMainOne" id="chatView">
        <input type="hidden" name="" id="authName" value="{{ auth()->user()->admin_name }}">
        @foreach ($notices as $notice)
            @if ($notice->admin->id === auth()->user()->id)
            <div class="messInfosDivNot">
              <div class="messInfosDivNotTwo">
                <div class="messInfosDivNotTwoOne">
                  <h6 style="color: #00000099; font-size: 12px">{{ explode(':', explode(' ',  $notice->created_at)[1])[0] }}:{{ explode(':', explode(' ',  $notice->created_at)[1])[1] }}</h6>
                  <h6 style="color: #000000bf; font-weight: 800; margin-top: -5px">.</h6>
                  <h6 style="font-weight: 500" class="name" onclick="fill(
                    '<?php echo $notice->admin->admin_name ?>',
                    '<?php echo $notice->admin->cadre ?>',
                    '<?php echo $notice->admin->email ?>',
                    '<?php echo $notice->admin->role ?>',
                    '<?php echo $notice->admin->address ?>',
                    '<?php echo $notice->admin->rental_number ?>'
                )">{{ $notice->admin->admin_name }}</h6>
                </div>
                <div class="messInfosDivNotTwoTwo">
                  {{ $notice->content }}
                </div>
              </div>
              <div class="messInfosDivNotOne">
                <img src="/img/maroc-logo.png" alt="">
              </div>
            </div>
            @else
            <div class="messInfosDiv">
              <div class="messInfosDivOne @if($notice->admin->online) adminOnline @endif">
                <img src="/img/maroc-logo.png" alt="">
              </div>
              <div class="messInfosDivTwo">
                <div class="messInfosDivTwoOne">
                  <h6 style="font-weight: 500" class="name" onclick="fill(
                    '<?php echo $notice->admin->admin_name ?>',
                    '<?php echo $notice->admin->cadre ?>',
                    '<?php echo $notice->admin->email ?>',
                    '<?php echo $notice->admin->role ?>',
                    '<?php echo $notice->admin->address ?>',
                    '<?php echo $notice->admin->rental_number ?>'
                )"
                >{{ $notice->admin->admin_name }}</h6>
                  <h6 style="color: #000000bf; font-weight: 800; margin-top: -5px">.</h6>
                  <h6 style="color: #00000099; font-size: 12px">{{ explode(':', explode(' ',  $notice->created_at)[1])[0] }}:{{ explode(':', explode(' ',  $notice->created_at)[1])[1] }}</h6>
                </div>
                <div class="messInfosDivTwoTwo">
                  {{ $notice->content }}
                </div>
              </div>
            </div>
            @endif
        @endforeach
      </div>
      <form id="hiddenForm" action="{{ route('sendNotice') }}" method="POST" hidden>
        @csrf
        <input type="text" name="content" id="theContent">
      </form>
      <div class="allMessagesDivMainTwo">
        <form id="messageForm">
          @csrf
          <input type="text" name="message" id="message" placeholder="... اكتب رسالة " oninput="checkMess()" autocomplete="off">
        
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
  function scrollToBottom() {
      $('.allMessagesDivMainOne').scrollTop($('.allMessagesDivMainOne')[0].scrollHeight);
  }

  function showAll() {
      scrollToBottom();
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
  function playSound() {
        var sound = new Howl({
            src: ['sound/notice-sound.mp3']
        });
        sound.play();
    }

    function sentSound() {
        var sound = new Howl({
            src: ['sound/sent.mp3']
        });
        sound.play();
    }
  let currentTime = new Date();
  let hours = currentTime.getHours();
  let minutes = currentTime.getMinutes();
  hours = hours < 10 ? '0' + hours : hours;
  minutes = minutes < 10 ? '0' + minutes : minutes;
  const pusher = new Pusher('{{config('broadcasting.connections.pusher.key')}}', { cluster: 'eu' });
  const channel = pusher.subscribe('public');
  
  channel.bind('chat', function (data) {
    if (data.senderId !== '{{ auth()->user()->id }}') {
      $(".allMessagesDivMainOne").append('<div class="messInfosDiv">' +
      '<div class="messInfosDivOne">' +
          '<img src="/img/maroc-logo.png" alt="">' +
      '</div>' +
      '<div class="messInfosDivTwo">' +
          '<div class="messInfosDivTwoOne">' +
            '<h6 style="font-weight: 500" class="name">' + data.senderNameAuth + '</h6>' +
              '<h6 style="color: #000000bf; font-weight: 800; margin-top: -5px">.</h6>' +
              '<h6 style="color: #00000099; font-size: 12px">' + hours + ':' + minutes + '</h6>' +
          '</div>' +
          '<div class="messInfosDivTwoTwo">' +
              data.message +
          '</div>' +
      '</div>' +
    '</div>');

      $('.allMessagesDivMainOne').scrollTop($('.allMessagesDivMainOne')[0].scrollHeight);

      Toastify({
        text: "لقد تلقيت إشعار جديد",
        className: "info",
        style: {
          background: "#ffc221",
          color: "#003566"
        }
      }).showToast();
      playSound();
    }
  });

  $("#messageForm").submit(function (event) {
    event.preventDefault();
    const messageId = Date.now(); 
    $.ajax({
      url: "/broadcast",
      method: 'POST',
      headers: {
        'X-Socket-Id': pusher.connection.socket_id
      },
      data: {
        _token: '{{csrf_token()}}',
        message: $("#message").val(),
        senderId: '{{ auth()->user()->id }}', 
        senderName: '{{ auth()->user()->admin_name }}',
        messageId: messageId 
      },
      success: function (res) {
        $(".allMessagesDivMainOne").append('<div class="messInfosDivNot message"><div class="messInfosDivNotTwo"><div class="messInfosDivNotTwoOne"><h6 style="color: #00000099; font-size: 12px">' + hours + ':' + minutes + '</h6><h6 style="color: #000000bf; font-weight: 800">.</h6><h6 style="color: #000000bf; font-weight: 500">' + '{{ auth()->user()->admin_name }}' + '</h6></div><div class="messInfosDivNotTwoTwo">' + $("#message").val() + '</div></div><div class="messInfosDivNotOne"><img src="/img/maroc-logo.png" alt=""></div></div>');
        $("#message").val('');
        $("#sendButton").addClass('notFilled');
        $('.allMessagesDivMainOne').scrollTop($('.allMessagesDivMainOne')[0].scrollHeight);
        sentSound();
        $("#hiddenContent").val($("#message").val());
        $.ajax({
          url: $("#hiddenForm").attr('action'),
          method: $("#hiddenForm").attr('method'),
          data: $("#hiddenForm").serialize(),
          success: function (response) {},
          error: function (xhr, status, error) {}
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


<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</body>
</html>
