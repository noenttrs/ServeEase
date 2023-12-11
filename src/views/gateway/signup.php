<?php
$pathCss = "css/gateway/signup.css";
require_once VIEWS . "base/Header.php"; ?>

<?php if (isset($_SESSION["client"])) {
    header("Location: /");
}
?>


<main>
    <section class="main__signup">
        <img src="img/pexels-oliver-sjöström-1059040.jpg" alt="">
        <div class="main__signup__content">
            <h2>Inscrivez-vous !</h2>
            <form action="/signup" class="main__signup__content__form" method="post">
                <?php
                if (isset($signupError)) {
                    echo "<div class='main__signup__badRequest'>
                    <p>Veuillez remplir tout les champs</p>
                    </div>";
                }
                ?>
                <div class="main__signup__clientName autoInputText">
                    <input type="text" name="clientName" id="clientNameId" placeholder=" " value="<?php if (isset($clientNameValue)) echo $clientNameValue ?>" required>
                    <label for="clientNameId">Prénom</label>

                    <small><?php if (isset($clientName)) echo $clientName ?></small>
                </div>
                <div class="main__signup__clientSurname autoInputText">
                    <input type="text" name="clientSurname" id="clientSurnameId" placeholder=" " value="<?php if (isset($clientSurnameValue)) echo $clientSurnameValue ?>" required>
                    <label for="clientSurnameId">Nom de famille</label>
                    <small><?php if (isset($clientSurname)) echo $clientSurname ?></small>
                </div>
                <div class="main__signup__clientMail autoInputText">
                    <input type="email" name="clientMail" id="clientMailId" placeholder=" " value="<?php if (isset($clientMailValue)) echo $clientMailValue ?>" required>
                    <label for="clientMailId">Adresse e-mail</label>
                    <small><?php if (isset($clientMail)) echo $clientMail ?></small>
                </div>
                <section class="main__signup__clientPassword">
                    <div class="inputPassword autoInputPassword">
                        <input type="password" name="clientPassword" id="clientPasswordId" placeholder=" " value="<?php if (isset($clientPasswordValue)) echo $clientPasswordValue ?>" required>
                        <label for="clientPasswordId">Mot de passe</label>
                        <i class="fa-solid fa-eye-slash"></i>
                    </div>
                    <small><?php if (isset($clientPassword)) echo $clientPassword ?></small>
                </section>
                <section class="main__signup__clientRetypePassword">
                    <div class="inputPassword autoInputPassword">
                        <input type="password" name="clientRetypePassword" id="clientRetypePasswordId" placeholder=" " required>
                        <label for="clientRetypePasswordId">Confirmer le mot de passe</label>
                        <i class="fa-solid fa-eye-slash"></i>
                    </div>
                    <small><?php if (isset($clientPasswordCorrespondance)) echo $clientPasswordCorrespondance ?></small>
                </section>
                <input type="submit" value="Créer mon compte" class="main__signup__content__form__submit">
            </form>
            <p class="main__signup__redirectToSignin">Vous avez déjà un compte ? <a href="/signin">Me connecter</a></p>
        </div>
    </section>
    <script src="js/function/inputPasswordSystem.js"></script>
</main>