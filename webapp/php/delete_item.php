<?php
session_start();

$item = $_POST['item'] ?? '';
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

  	$sql_e = "SELECT * FROM itemlist WHERE Item='$item'";
  	$res_e = $db->prepare($sql_e);
  	$res_e->execute();
  	if ($res_e->rowCount() < 0) {
  	  echo "Sorry... Food item doesn't exist";	 	
 
  	}

	
  	else{
   // sql to delete a record

$sql = "DELETE FROM itemlist WHERE Item = '$item'";

if ($db->query($sql) === TRUE) {
	printf("You don't have that many of %s.", $item);
    
}
header('Location: display.php');
}
?>