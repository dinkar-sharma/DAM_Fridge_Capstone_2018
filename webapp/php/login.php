<?php
    session_start();

    $authenticated = FALSE;

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'];
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

        if ($email == $row[3] && $password == $row[2])
            
        {
           // echo $row[1];
            $authenticated = TRUE;
            $db->query('TRUNCATE TABLE currentuser');
            $db->query("INSERT INTO currentuser(email) VALUES ('$email')");
            break;
        }
    }

   

    if ($authenticated == TRUE)
    {

        $_SESSION['email']=$email;
        echo $_SESSION['email'];
        header("Location: display.php");
         // $Uname = ("SELECT Username FROM users WHERE Email='$email'");
         // $statement = $db->prepare($Uname);
         // $statement->execute();
         // echo $_SESSION['statement'];
    // $rows = $db->query('SELECT * FROM users');
    // foreach ($rows as $row)
    // {

    //     if ($email == $row[3] && $password == $row[2])
            
    //     {
    //        // echo $row[1];
    //         $_SESSION['Username'] ;
    //     }
    // }
       // header("Location: display.php");  
        
    }
    else

    {
        echo "<p>Invalid email or password, click here<a href=../loginDAM.html> here</a>  to go back and try again</p>";

        echo "<p>Or click <a href=../request_access.html> here</a>  to sign up.</p>"; 

    }
?>