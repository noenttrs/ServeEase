<?php
$pathCss = "css/gateway/signup.css";
require_once VIEWS . "base/Header.php" ?>

<?php if (isset($_SESSION["client"])) : ?>
    <script>
        window.location.href = "/";
    </script>
<?php endif; ?>


<main>
    <section class="main__signup">
        <img src="img/pexels-oliver-sjöström-1059040.jpg" alt="">
        <div class="main__signup__content">
            <h2>Inscrivez-vous !</h2>
            <form action="/signup" class="main__signup__content__form" method="post">
                <div class="main__signup__clientName autoInputText">
                    <input type="text" name="clientName" id="clientNameId" placeholder=" " required>
                    <label for="clientNameId">Prénom</label>
                </div>
                <div class="main__signup__clientSurname autoInputText">
                    <input type="text" name="clientSurname" id="clientSurnameId" placeholder=" " required>
                    <label for="clientSurnameId">Nom de famille</label>
                </div>
                <div class="main__signup__clientMail autoInputText">
                    <input type="email" name="clientMail" id="clientMailId" placeholder=" " required>
                    <label for="clientMailId">Adresse e-mail</label>
                </div>
                <div class="main__signup__clientPassword inputPassword autoInputPassword">
                    <input type="password" name="clientPassword" id="clientPasswordId" placeholder=" " required>
                    <label for="clientPasswordId">Mot de passe</label>
                    <i class="fa-solid fa-eye-slash"></i>
                </div>
                <div class="main__signup__clientRetypePassword inputPassword autoInputPassword">
                    <input type="password" name="clientRetypePassword" id="clientRetypePasswordId" placeholder=" " required>
                    <label for="clientRetypePasswordId">Confirmer le mot de passe</label>
                    <i class="fa-solid fa-eye-slash"></i>
                </div>
                <input type="submit" value="Créer mon compte">
            </form>
        </div>
    </section>
    <script src="js/function/inputPasswordSystem.js"></script>
</main>


<?php require_once VIEWS . "base/Footer.php" ?>