<?php

session_start();
$mysqli = new mysqli("localhost", "root", "", "damfridge");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}


/* Select queries return a resultset */
if ($result = $mysqli->query("SELECT * FROM itemlist WHERE Email= '".$_SESSION['email']."'")) {
    // printf("Select returned %d rows.\n", $result->num_rows);


    /* free result set */
    // $result->close();
}
 for ($i = 0; $i <= $result->num_rows; $i++) {
            $rows = $mysqli->query("SELECT * FROM itemlist WHERE ID = '$i'");
            while ($j = $rows->fetch_assoc()) {
                // echo $j['TStamp']."<br>";
                $datetime1 = date_create(date("Y-m-d"));
                $datetime2 = date_create($j['TStamp']);
                $interval = date_diff($datetime1, $datetime2);
                // echo $interval->format('%a ');
                // echo $interval;
                $num = $interval->format('%a');

                // echo $num;
                
                if ($num <= 30){
                  printf("%s is safe", $j['Item']);
                  echo "<br />";
                   // exit;
                } 
                else  {
                    // printf("Would you like to extend the expiry date of %s? \n", $j['Item']);
                    // printf("%s has expired already.\n", $j['Item']);
                    printf("\r\n %s is about to expire.", $j['Item']);
                    // echo "<br />";
                    // printf("\r\n Would you like to use %s before it expires?", $j['Item']);

                    echo "<br />";
                    // echo'
                    //     <script>
                    //     window.onload = function() {
                    //          alert("Thank you for your message");
                    //         location.href = "index.php";  
                    //              }
                    //      </script>
                    //         ';

                     // $term = isset($_GET[$j['Item'])?$_GET[$j['Item']: '';
                     // $term = urlencode($j['Item']);
                     // $website = urlencode(" Recipes for");
                     // $redirect = ("https://www.google.com/search?q={$website}+{$term}");
                     // header("Location: $redirect");
                     // exit;
                 } 
                
                
            }            
        }
$mysqli->close();
?>