<?php 
session_start()
$username = $_POST['username']
$password = $_POST['password']

if($username && $password){
    $db = new PDO(
        'mysql:host=142.156.193.71:83;dbname=damfridge',
        'root',
        ''
    );
    $authenticated = FALSE;
    $rows = $db->query('SELECT * FROM users ORDERED BY id');
    foreach ($rows as $row){
        if ($username == $row[1] && $password == $row[2]) {
            $authenticated = TRUE;
        }
    }

    if ($authenticated == TRUE) {
        $_SESSION['username']=$username;
        echo "<p> duh hello </p>";
        echo "Go to <a href = "homePage.html"> here </a> to go homepage";
    } else {
        echo "<p>you are not authenticated</p>";
        echo "go back to login page <a href = "login.html"> here </a>";
        echo "or go to the front page <a href = "index.html"> here </a>";
    }

}  else {
        echo "<p>Please enter a username and password</p>";
}
?>
