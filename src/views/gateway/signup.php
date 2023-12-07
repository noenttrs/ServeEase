<?php
$pathCss = "css/gateway/signup.css";
require_once VIEWS . "base/Header.php" ?>

<main>
    <section class="main__signup">
        <img src="img/pexels-oliver-sjöström-1059040.jpg" alt="">
        <form action="/signup" class="main__signup__form" method="post">
            <div class="main__signup__clientName">
                <input type="text" name="clientName" id="clientNameId">
                <label for="clientNameId">Prénom</label>
            </div>
            <div class="main__signup__clientSurname">
                <input type="text" name="clientSurname" id="clientSurnameId">
                <label for="clientSurnameId">Nom de famille</label>
            </div>
            <div class="main__signup__clientMail">
                <input type="email" name="clientMail" id="clientMailId">
                <label for="clientMailId">Adresse e-mail</label>
            </div>
            <div class="main__signup__clientPassword">
                <input type="password" name="clientPassword" id="clientPasswordId">
                <label for="clientPasswordId">Mot de passe</label>
            </div>
            <div class="main__signup__clientRetypePassword">
                <input type="password" name="clientRetypePassword" id="clientRetypePasswordId">
                <label for="clientRetypePasswordId">Confirmer le mot de passe</label>
            </div>
        </form>
    </section>
</main>


<?php require_once VIEWS . "base/Footer.php" ?>