<?php
	function decrease_quant($dbConn, $item, $quat)
	{

	  $sql = "UPDATE itemlist SET Quantity = (Quantity - '$quat') WHERE Item = '$item'";
	  if ($dbConn->query($sql) === TRUE) {
		
		printf("You don't have that many of %s.", $item);
    
			} else{
			header('Location: display.php');
			}

	    // if(!$result)
	    // {
	    //     echo "Error executing statement";
	    // }
	}
	function increase_quant($dbConn, $item, $quat)
	{
	    $query =  "UPDATE itemlist SET Quantity = (Quantity + '$quat') WHERE Item = '$item'";
	  if ($dbConn->query($query) === TRUE) {
		
		printf("You don't have that many of %s.", $item);
    
			} else{
			header('Location: display.php');
			}

	    // if(!$result)
	    // {
	    //     echo "Error executing statement";
	    // }
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
	$decreaseq = $_POST['decreaseq'] ?? '';
	$increaseq = $_POST['increaseq'] ?? '';
	$item = $_POST['item'] ?? '';
	$quantity = $_POST['quantity'] ?? '';
	$db = connect_to_database();

	if($decreaseq == true)
	{
		decrease_quant($db, $item, $quantity);	
	}
	else
	{
		increase_quant($db, $item, $quantity);
	}
?>