<?php
	session_start();
	header('Content-Type: application/json');

	$columns = array(
			array( 'db' => 'Item', 'dt' => 'Item' ),
			array( 'db' => 'ItemPic',  'dt' => 'ItemPic' ),
			array( 'db' => 'Quantity',   'dt' => 'Quantity' ),
			array( 'db' => 'TStamp',     'dt' => 'TStamp' )
	    // array( 'Item' => '1', '0' => 0 ),
	    // array( 'ItemPic' => '2',  '1' => 1 ),
	    // array( 'Quantity' => '3',   '2' => 2 ),
	    // array( 'TStamp' => '4',     'dt' => 3 )
	);

	echo json_encode($columns);
?>