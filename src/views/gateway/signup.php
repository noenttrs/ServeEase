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
                    <small></small>
                </div>
                <div class="main__signup__clientSurname autoInputText">
                    <input type="text" name="clientSurname" id="clientSurnameId" placeholder=" " required>
                    <label for="clientSurnameId">Nom de famille</label>
                    <small></small>
                </div>
                <div class="main__signup__clientMail autoInputText">
                    <input type="email" name="clientMail" id="clientMailId" placeholder=" " required>
                    <label for="clientMailId">Adresse e-mail</label>
                    <small></small>
                </div>
                <section class="main__signup__clientPassword">
                    <div class="inputPassword autoInputPassword">
                        <input type="password" name="clientPassword" id="clientPasswordId" placeholder=" " required>
                        <label for="clientPasswordId">Mot de passe</label>
                        <i class="fa-solid fa-eye-slash"></i>
                    </div>
                    <small></small>
                </section>
                <section class="main__signup__clientRetypePassword">
                    <div class="inputPassword autoInputPassword">
                        <input type="password" name="clientRetypePassword" id="clientRetypePasswordId" placeholder=" " required>
                        <label for="clientRetypePasswordId">Confirmer le mot de passe</label>
                        <i class="fa-solid fa-eye-slash"></i>
                    </div>
                    <small></small>
                </section>
                <input type="submit" value="Créer mon compte" class="main__signup__content__form__submit">
            </form>
            <p class="main__signup__redirectToSignin">Vous avez déjà un compte ? <a href="/signin">Me connecter</a></p>
        </div>
    </section>
    <script src="js/function/inputPasswordSystem.js"></script>
</main>