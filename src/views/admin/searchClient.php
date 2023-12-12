<?php

if (!isset($_SESSION["client"]) || $_SESSION['client']["CLIENT_ROLE"] === 0) {
    header("Location: /");
}

if (!isset($client)) {
    header("Location: /admin");
}

$pathCss = "css/admin/searchClient.css";
require VIEWS . "base/header.php";
?>

<!-- Formulaire de modification du client / supression du client -->

<main>
    <section class="body__main__searchClient">
        <h1 class="body__main__searchClient__h1">Client trouvé !</h1>
        <p class="body__main__searchClient__p">Voici le résultat pour votre recherche matissegom@gmail.com</p>
        <form action="/updateClient" class="body__main__searchClient__form">
            <div class="body__main__searchClient__form__clientName autoInputText">
                <input type="text" name="clientName" id="clientNameId" value="<?php echo $client->getClientSurname(); ?>" placeholder=" ">
                <label for="clientNameId">Nom du client</label>
            </div>
            <div class="body__main__searchClient__form__clientSurname autoInputText">
                <input type="text" name="clientSurname" id="clientSurnameId" value="<?php echo $client->getClientName(); ?>" placeholder=" ">
                <label for="clientSurnameId">Prénom du client</label>
            </div>
            <div class="body__main__searchClient__form__clientMail autoInputText">
                <input type="email" name="clientMail" id="clientMailId" value="<?php echo $client->getClientMail(); ?>" placeholder=" ">
                <label for="clientMailId">Mail du client</label>
            </div>
            <div class="body__main__searchClient__form__clientPassword autoInputText">
                <input type="text" name="clientPassword" id="clientPasswordId" placeholder=" ">
                <label for="clientPasswordId">Mot de passe du client</label>
            </div>
            <div class="body__main__searchClient__form__clientFidelity autoInputText">
                <input type="number" name="clientFidelity" id="clientFidelityId" value="<?php echo $client->getClientFidelity(); ?>" placeholder=" ">
                <label for="clientFidelityId">Fidélité du client</label>
            </div>
            <div class="body__main__searchClient__form__clientRole">
                <select name="clientRole" id="clientRoleId">
                    <option value="0">Client</option>
                    <option value="1">Admin</option>
                    <option value="2">Cuisine</option>
                </select>
            </div>
            <input type="hidden" name="clientId" value="<?php echo $client->getClientId(); ?>">
            <input type="submit" value="Modifier le client" class="body__main__searchClient__form__submit">
        </form>
    </section>
</main>



<?php require VIEWS . "base/footer.php"; ?>