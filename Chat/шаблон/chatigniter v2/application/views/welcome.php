<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- Copyright (c) 2008 Dustin Sallings <dustin+html@spy.net> -->
<html lang="en">
  <head>
    <title>slosh chat</title>
    <script type="text/javascript"
      src="http://code.jquery.com/jquery-latest.js"></script>
    <link title="Default" rel="stylesheet" media="screen" href="style.css" />
  </head>

  <body>
    <h1>Welcome to Slosh Chat</h1>

    <div id="messages">
      <div>
        <span class="from">First!:</span>
        <span class="msg">Welcome to chat. Please don't hurt each other.</span>
      </div>
    </div>

    <form method="post" action="#">
      <div>Nick: <input id='from' type="text" name="from"/></div>
      <div>Message:</div>
      <div><textarea id='msg' name="msg"></textarea></div>
      <div><input type="submit" value="Say it" id="submit"/></div>
    </form>

    <script type="text/javascript">
      var timestamp = null();

      function waitForMsg(){
        $.ajax({
            type : "GET",
            url : "url?timestamp=" + timestamp,
            async : true,
            cache : false,
            success : function(){
                var json = eval ('(' + data + ')');
                if(json['msg'] != ""){
                    alert(json['msg']);
                }
                timestamp = json['msg'];
                setTimeout('waitForMsg', 1000);
            },
            error: function(XMLHttpRequest, textStatus,errorThrown){
                alert("Error: "+ textStatus + " (" + errorThrown + ")");
                setTimeout('waitForMsg()', 15000);
            }
        });
      }

      waitForMsg();
    </script>
<?php
while ($current <= $timestamp) {
    usleep(10000);
    clearstatcache();
    $current = $lastmsg;
}



?>

  </body>
</html>