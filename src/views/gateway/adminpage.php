<?php

if(!isset($_SESSION["client"]) || $_SESSION['client']["CLIENT_ROLE"] == 0) {
    header("Location: /");
}

$pathCss = "css/gateway/signin.css";
require VIEWS . "base/header.php";
?>



<?php require VIEWS . "base/footer.php"; ?>