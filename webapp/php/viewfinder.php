<?php 
    session_start();
    if(!isset($_SESSION['email']))
    {
        echo "<p>You are not an authorized user. Click <a href=../request_access.html> here</a>  to sign up.</p>";
        echo "<p>Or click <a href=../login.html> here</a>  to go back and try again</p>"; 
        die();
    }
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <title></title><!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"><!--Import materialize.css-->
    <link href="../3rd-party/materialize/css/materialize.css" media="screen,projection" rel="stylesheet" type="text/css">
    <link href="../3rd-party/materialize/css/split.css" rel="stylesheet"><!-- jQuery CDN -->
   
    <!-- jQuery -->
        <script src="http://code.jquery.com/jquery.js"></script>
   
   <!-- Bootstrap JavaScript -->
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <script src="http://192.156.193.149:3000/socket.io/socket.io.js"></script>
        <script>
             var socket = io.connect('http://142.156.193.149:3000');
              socket.on('liveStream', function(url) {
                var url2 = 'http://142.156.193.149:3000/';
                var url1 = url2.concat(url);
                    console.log(url1);
                $('#stream').attr('src', url1);
                $('.start').hide();
              });

              function startStream() {
                $("#camera-icon").html('check');
                socket.emit('start-stream');
                $('.start').hide();
              }
        </script>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- <meta http-equiv="refresh" content="8">
 --></head>
 <body>
 </body>
 </html>
 