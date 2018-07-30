<?php
session_start();

$link = new mysqli("127.0.0.1", "root", "", "damfridge");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;



if(isset($_POST) & !empty($_POST)){
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $sql = "SELECT * from users where email = '$email'";
    $res = mysqli_query($link, $sql);
    $count = mysqli_num_rows($res);
    if($count == 1){
        echo "Send email to use with password";
    }else{
        echo "Email does not exist";
    }
}

$r = mysqli_fetch_assoc($res);
// $password = $r['password'];
$to = $r[$_SESSION['email']];
$subject = "Your new password";
$message = "please use this password to login " . $password;
$headers = "From : MrAnas@confirmation.com";
if(mail($to, $subject, $message, $headers)){
    echo "your Password has been sent to your email";
}else{
    echo "Failed to recover your password";
}
?>