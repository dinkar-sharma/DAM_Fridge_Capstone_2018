<?php
	session_start();

    if(!isset($_SESSION['email']))
    {
        echo "<p>You are not an authorized user. Click <a href=../index.html> here</a>  to sign up.</p>";
        die();
    }

	header('Content-Type: application/json');

	$userEmail = $_SESSION['email'] ?? '';
	$imageLocation = '';

	try 
	{
	    $db = new PDO(
	    'mysql:host=127.0.0.1:3306;dbname=damfridge',
	    'admin',
	    ''
	    );
	   
	} 
	catch (Exception $e) 
	{
	    error_log('Error connecting to database: '.$e->getMessage());
	}

	$query = "SELECT ItemPic FROM itemlist WHERE Email = '".$userEmail."' ORDER BY ID DESC LIMIT 1";
	$rows = $db->query($query);

	if ($rows) {
		foreach ($rows as $row){
			$imageLocation = $row[0];
		}

		$msgArray = ['status' => 'success', 
					 'msg' => '',
					 'data' => ['imageLocation' => $imageLocation]
					 ];
		echo json_encode($msgArray);
	}
?>