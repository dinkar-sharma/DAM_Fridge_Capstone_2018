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
    <!--     <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script> -->
        <script src="http://192.156.193.149:3000/socket.io/socket.io.js"></script>
<!--         <script>
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
        </script> -->
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="refresh" content="5">
</head>
<body>
    <header>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="nav-wrapper">
                <a class="brand-logo">Dashboard</a>
                <ul class="right hide-on-med-and-down">
                    <!-- <li><a href="../about.html">About Us</a></li> -->
                    <!--  echo $_SESSION['email'];  -->
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                    <li>
                        <a><span class="glyphicon glyphicon-user" id="welcome"></span>Welcome <?php 
                                                                             try 
                                                                            {
                                                                                $db = new PDO(
                                                                                'mysql:host=127.0.0.1;dbname=damfridge',
                                                                                'root',
                                                                                '');
                                                                                
                                                                            } 
                                                                            catch (Exception $e) 
                                                                            {
                                                                                echo "Error connecting to database: " .$e->getMessage();
                                                                            }
                                                                            $rows = $db->query('SELECT * FROM users');
                                                                            foreach ($rows as $row)
                                                                            {
                                                                                if ($_SESSION['email'] == $row[3])       
                                                                                {
                                                                                   echo $row[1];
                                                                                }
                                                                            }
                                                                                                    ?></a>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar"></div>
        </nav>
    </header>

    <div class="row" >
        <div class="col s6">
      <div class="video-container">
        <iframe id="stream" width="853" height="480" src="" frameborder="0" allowfullscreen></iframe>
      </div>
<!--     <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large"><i class="material-icons">menu</i></a>
    <div class="fixed-action-btn">
        <a id="camera" class="btn-floating btn-large red" onclick="startStream()">
         <i id="camera-icon" class="large material-icons">camera</i>
         </a>
    </div> -->
        </div>
        <div class="col s6">
            
            <section>
                <table id="fridge">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Time Stamp</th>
                        </tr>
                    </thead>
                    <tbody id="fridge-content"></tbody>
                </table>
                <script src="../js/displayTa.js">
                </script>
            </section>
        
    
        <div class="container">
            <section class="bg-grey-light">
                <form action="recipe_finder.php" class="col s12" method="get" target="_blank">
                    <input name="query" placeholder="Search term" type="text"> 
                    <div class="row">
                        <button class="btn waves-effect waves-light" name="action" type="submit" value="search">Get me a recipe <i class="material-icons right">send</i></button>
                    </div>
                </form>
            </section>
        </div>

        <div class="container">
            <section class="bg-grey-light">
                <form action="update_item.php" class="col s12" method="Post">
                      <div class="input-group ">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="item" name="item" type="text" class="validate"  placeholder="Enter Item's Name" required>
                        <input id="quantity" name="quantity" type="number" class="validate"  placeholder="Enter Item's Quantity" required>
                     </div>
                    <div class="row">
                        <button class="btn waves-effect waves-light" name="delete" type="submit" value="delete">Decrease Quantity <i class="material-icons right">send</i></button>
                    </div>
                </form>
            </section>
        </div>

<!-- 
        <div class="container">
            <section class="bg-grey-light">
                <form action="update_item.php" class="col s12" method="Post">
                      <div class="input-group ">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="item" name="item" type="text" class="validate"  placeholder="Enter Item's Name" required>
                        <input id="quantity" name="quantity" type="number" class="validate"  placeholder="Enter Item's Quantity" required>
                     </div>
                    <div class="row">
                        <button class="btn waves-effect waves-light" name="delete" type="submit" value="delete">Increase Quantity <i class="material-icons right">send</i></button>
                    </div>
                </form>
            </section>
        </div> -->

        <div class="container">
            <section class="bg-grey-light">
                <form action="delete_item.php" class="col s12" method="Post">
                      <div class="input-group ">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="item" name="item" type="text" class="validate"  placeholder="Enter Item's Name" required>
                     </div>
                    <div class="row">
                        <button class="btn waves-effect waves-light" name="delete" type="submit" value="delete">Delete Item <i class="material-icons right">send</i></button>
                    </div>
                </form>
            </section>
        </div>


        <div class="fixed-action-btn">
            <div id="overlay" onclick="off()">
                <div id="text">
                    Camera is On
                </div>
            </div>
            <!-- <a onclick="M.toast({html:'        ' })" class="btn">Check for Items!</a> -->


            <div style="padding:20px">
                <a class="btn-floating btn-large red" onclick="startStream()"><i class="large material-icons">camera</i></a>
            </div>
            <script>
                       function on() {
                         document.getElementById("overlay").style.display = "block";
                       }

                       function off() {
                         document.getElementById("overlay").style.display = "none";
                       }
            </script>
        </div>

        </div>

    </div>
    <!-- <a class="btn" onclick="M.toast({html: 'I am a toast', completeCallback: function(){alert('Your toast was dismissed')}})">Check for Expired Food Items!</a> -->
    <footer class="col-sm-12 text-center" id="foot"></footer><!-- </body> -->
</body>
 <!-- <script type="text/javascript" src="../js/refresh.js"></script> -->
</html>