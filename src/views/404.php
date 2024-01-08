<?php


$pathCss = "css/404.css";
include_once VIEWS . "base/Header.php";

http_response_code(404);
?>

<body>
    <h1>404 Not Found</h1>
    <p>The page you are looking for does not exist.</p>
    <a href="/" class="body__redirectToHomePage">Retourner à la page d'accueil</a>
</body>

<?php
include_once VIEWS . "base/Footer.php";
?>