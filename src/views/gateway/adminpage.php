<?php

if(!isset($_SESSION["client"]) || $_SESSION['client']["CLIENT_ROLE"] == 0) {
    header("Location: /");
}

$pathCss = "css/gateway/signin.css";
require VIEWS . "base/header.php";
?>

<!-- création d'un produit -->


<!-- création d'un menu -->



<?php require VIEWS . "base/footer.php"; ?>