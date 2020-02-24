@extends('Frontend.layouts.master')
@section('contents')
<div class="chat-container">
    <div class="uchat-container">
          <input type="text" id="getid" style="display: none;" value="{{Auth::User()->id}}">
          <div class="uchat-header">
            To: Admin
          </div>
          <div class="uchat-texts">

          </div>
          <div class="uchat-textbox">
            <div>
              <input type="text" id="usend-txt" placeholder="Type a text">
            </div>
            <div>
              <button id="usend-msg">Send</button>
            </div>
          </div>
        </div>
    </div>
    <div style="margin-bottom:100vh;"></div>
      <script>
        $("document").ready(function(){
          let id = $("#getid").val();
          u_showmessages();
          u_setadmininitialrefresh();
          setInterval(function(){ u_needLoad(); }, 1000);
          setInterval(function(){ u_needLoadAgain(); }, 1000);
          setInterval(function(){ u_userinitialrefresh(); }, 1000);

          // u_setadmininitialrefresh() function
          function u_setadmininitialrefresh() {
            $.ajax({
              url : "includes/u_setadmininitialrefresh.inc.php",
              type: "POST",
              data : {
                id : id
              }, success: function(result) {

              }
            });
          }

          // a_userinitialrefresh() function
          function u_userinitialrefresh() {
            $.ajax({
              url : "includes/u_useritialrefresh.inc.php",
              type: "POST",
              data : {
                id : id
              }, success: function(result) {
                if(result == "true") {
                  u_showmessages();
                }
              }
            });
          }

          // u_needLoadAgain
          function u_needLoadAgain() {
            $.ajax({
              url : "includes/u_needloadAgain.inc.php",
              type : "POST",
              data : {
                id : id
              }, success: function(result) {
                if(result == "true"){
                  u_showmessages();
                }
              }
            });
          }

          // u_needLoad Function
          function u_needLoad() {
            $.ajax({
              url : "includes/u_needload.inc.php",
              type : "POST",
              data : {
                id : id
              }, success: function(result) {
                if(result == "true"){
                  console.log(result);
                  u_showmessages();
                  $.ajax({
                    url : "includes/achat_load.inc.php",
                    type : "POST",
                    data : {
                      id : id
                    }, success: function(result) {

                    }
                  });
                }
              }
            });
          }

          // u_showmessages Function
          function u_showmessages() {
            $.ajax({
              url : "http://127.0.0.1:8000/chat/user_messages",
              type: "GET",
              success: function(result) {
                $(".uchat-texts").html(result);
                var key = $('.uchat-texts').prop("scrollHeight");
                $('.uchat-texts').prop("scrollTop", key);
              }
            });
          }
          $("#usend-msg").click(function(){
            var text = $("#usend-txt").val();
            text = text.trim();
            if(text.length) {
              u_insertmessages(id, text);
              $("#usend-txt").val("");
            } 
          });

          // u_insertmessages Function
          function u_insertmessages(id, text) {
            $.ajax({
              url : "includes/u_insertmessages.inc.php",
              type: "POST",
              data : {
                id : id,
                text : text
              },
              success: function(result) {
                u_showmessages();
              }
            });
          }

          // show date and time through hover 
          $(".uchat-texts").on("mouseenter", ".uchat-text", function(){
            var x = $(this).attr("id");
            var y = x.substr(9, x.length);
            var z = "#uChatTextTime";
            y = z.concat(y);
            $(y).fadeIn();
          });
          $(".uchat-texts").on("mouseleave", ".uchat-text", function(){
            var x = $(this).attr("id");
            var y = x.substr(9, x.length);
            var z = "#uChatTextTime";
            y = z.concat(y);
            $(y).hide();
          });
        });
      </script>
@endsection

