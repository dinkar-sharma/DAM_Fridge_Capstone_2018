<?php 
    
 session_start();
 // echo $_SESSION['email'];
    function display_table($dbConn)
    {

        $query = "SELECT Item, Quantity, TStamp FROM itemlist WHERE Email= '".$_SESSION['email']."'";

        $rows = $dbConn->query($query);
        foreach ($rows as $row) 
        {
            echo "<tr>";
            for ($i=0; $i < sizeof($row)/2 ; $i++) 
            { 
                echo "<td>".$row[$i]."</td>";
            }
            echo "</tr>";
        }
    }
    function connect_to_database()
    {
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
        return $db;
    }
    $tableName = $_GET['q'];
    $dbConn = connect_to_database();
    display_table($dbConn);
?>