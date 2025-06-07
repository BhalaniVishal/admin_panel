<?php
require_once "../auth/check_auth.php";

$url = "https://jsonplaceholder.typicode.com/posts/1";

// api call
$response = file_get_contents($url);

$data = json_decode($response, true);

echo "<pre>";
print_r($data);
echo "</pre>";
?>
