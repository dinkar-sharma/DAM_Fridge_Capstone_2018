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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script><!--Let browser know website is optimized for mobile-->
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
</head>
<body>
    <header>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="nav-wrapper">
                <a class="brand-logo">User Display</a>
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
            <div class="collapse navbar-collapse" id="myNavbar">
                <!--  <ul class="nav navbar-nav">
                        <li><a href="../about.html">About</a></li>
                        <li><a href="../project_details.html">Project Details</a></li>
                        <li><a href="../project_plan.html">Project Plan</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">LogBooks<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="../logbook/dinkar-logbook.html">Dinkar</a></li>
                                <li class="divider"></li>
                                <li><a href="../logbook/anas-logbook.html">Anas</a></li>
                                <li class="divider"></li>
                                <li><a href="../logbook/mike-logbook.html">Mike</a></li>
                            </ul>
                        </li>
                        <li><a id="displayTime"></a></li>
                    </ul> -->
                <!--   <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a><span id="welcome" class="glyphicon glyphicon-user"></span>Welcome <?php echo $_SESSION['email']; ?></a>
                        </li>
                    
                            
                        
                    </ul> -->
            </div>
        </nav>
    </header>
    <section>
        <!--  <div class="centered responsive-table">
   
            <div>
                <h2>Item Table</h2>
                <table id="elevator-network-table" class="table" class = "responsive-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Time Stamp</th>
                        </tr>
                    </thead>
                    <tbody id="elevator-network-content"></tbody>
                </table>
                </div>
                <div ></div>
                </div> -->
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
    </section><!-- <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large"><i class="material-icons">menu</i></a> -->
    <div class="fixed-action-btn">
        <!--  <a class="btn-floating btn-large red">
         <i class="large material-icons">camera</i>
         </a> -->
        <div id="overlay" onclick="off()">
            <div id="text">
                Camera is On
            </div>
        </div>
        <div style="padding:20px">
            <a class="btn-floating btn-large red" onclick="on()"><i class="large material-icons">camera</i></a>
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
    <footer class="col-sm-12 text-center" id="foot"></footer>
</body>
</html>