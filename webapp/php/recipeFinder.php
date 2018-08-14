<?php
    if(!isset($_SESSION['email']))
    {
        echo "<p>You are not an authorized user. Click <a href=../index.html> here</a>  to sign up.</p>";
        die();
    }

	$term = isset($_GET['recipe'])?$_GET['recipe']: '';
	$term = urlencode($term);
	$website = urlencode("Recipes for ");
	$redirect = "https://www.google.com/search?q={$website}+{$term}";
	header("Location: $redirect");
?>

