<?php
$term = isset($_GET['query'])?$_GET['query']: '';
$term = urlencode($term);
$website = urlencode(" recipes for");
$redirect = "https://www.google.com/search?q={$website}+{$term}";
header("Location: $redirect");
exit;
?>