<?php 
    
 session_start();
 // echo $_SESSION['email'];
    function display_table($dbConn)
    {
        // $query = 'SELECT ID, Item, Quantity, TStamp FROM (SELECT * FROM itemlist ORDER BY ID DESC LIMIT 10) sub ORDER BY ID ASC';
        // $query = 'SELECT ID, Item, Quantity, TStamp FROM itemlist WHERE NOT EXISTS (SELECT users.Email FROM users WHERE users.Email = itemlist.Email)';

        // $query = 'SELECT Item, Quantity, TStamp FROM itemlist where Email = '$_SESSION['email']'';

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