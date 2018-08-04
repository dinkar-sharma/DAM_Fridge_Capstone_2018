<?php
	session_start();
	
	if (!isset($_SESSION['email'])) {
    echo "<p>You are not an authorized user. Click <a href=../request_access.html> here</a>  to sign up.</p>";
    echo "<p>Or click <a href=../login.html> here</a>  to go back and try again</p>"; 
	$msgArray = ['status' => 'error', 'msg' => 'You are not an authorized user.'];
	echo json_encode($msgArray);
	die();
	} 
?>