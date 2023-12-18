<?php


$pathCss = "css/main.css";
include_once VIEWS . "base/Header.php";

http_response_code(404);
?>

<!DOCTYPE html>
<html>
<head>
    <title>404 Not Found</title>
</head>
<body>
    <h1>404 Not Found</h1>
    <p>The page you are looking for does not exist.</p>
</body>
</html>

<?php
include_once VIEWS . "base/Footer.php";
?>