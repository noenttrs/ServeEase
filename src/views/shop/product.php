<?php
$pathCss = "css/gateway/signin.css";
require_once VIEWS . "base/Header.php" ?>

<?php if (isset($_SESSION["client"])) : ?>
    <script>
        window.location.href = "/";
    </script>
<?php endif; ?>


<main>
    <section class="main__signin">
        <img src="img/pexels-oliver-sjöström-1059040.jpg" alt="">
        <div class="main__signin__content">
            <h2>Connectez vous !</h2>
            <form action="/signin" class="main__signin__content__form" method="post">
                <?php
                if(isset($signinError)) {
                    echo "<div class='main__signin__badRequest'>
                    <p>Les informations fournies, que ce soit l'adresse e-mail ou le mot de passe, sont incorrectes. Veuillez réessayer avec des identifiants valides.</p>
                    </div>";
                }
                ?>

                <div class="main__signin__clientMail autoInputText">
                    <input type="email" name="clientMail" id="clientMailId" placeholder=" " required value="<?php if(isset($clientEmailValue)) echo $clientEmailValue ?>">
                    <label for="clientMailId">Adresse e-mail</label>
                </div>
                <section class="main__signin__clientPassword">
                    <div class="inputPassword autoInputPassword">
                        <input type="password" name="clientPassword" id="clientPasswordId" placeholder=" " required>
                        <label for="clientPasswordId">Mot de passe</label>
                        <i class="fa-solid fa-eye-slash"></i>
                    </div>
                </section>
                <input type="submit" value="Me connecter" class="main__signin__content__form__submit">
            </form>
            <p class="main__signin__redirectToSignin">Vous n'avez pas de compte ? <a href="/signup">M'inscrire</a></p>
        </div>
    </section>
    <script src="js/function/inputPasswordSystem.js"></script>
</main>