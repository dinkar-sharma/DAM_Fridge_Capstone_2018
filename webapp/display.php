
<?php 
    session_start();
    if(!isset($_SESSION['username']))
    {
        echo "<p>You are not authorized users. Click <a href=../request_access.html> here to sign up.</p>"; 
        die();
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../3rd-party/materialize/css/materialize.css" media="screen,projection" />
    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--Let browser know website is optimized for mobile-->

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
    <header>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="nav-wrapper">
      <a href="index.html" class="brand-logo">DAM Fridge</a>

      <ul class="right hide-on-med-and-down">
        <li><a href="../about.html">About Us</a></li>
        <li><a href="logout.php">Logout</a></li>
        
      </ul>
    </div>
                <div id="myNavbar" class="collapse navbar-collapse">
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
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a><span id="welcome" class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['username']; ?></a>
                        </li>
                    
                            
                        
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
    <section >
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
              <th>ID</th>
              <th>Item</th>
              <th>Quantity</th>
              <th>Time Stamp</th>
          </tr>
        </thead>

        <tbody id="fridge-content"></tbody>
      </table>
         
       <script src="../js/displayTa.js"></script>
    </section>
    <footer id="foot" class="col-sm-12 text-center">
    </footer>
</body>
</html>