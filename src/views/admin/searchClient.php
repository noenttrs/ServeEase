<?php

if (!isset($_SESSION["client"]) || $_SESSION['client']["CLIENT_ROLE"] === 0) {
    header("Location: /");
}

if (!isset($client)){
    header("Location: /admin");
}

$pathCss = "css/admin/home.css";
require VIEWS . "base/header.php";

echo "<h1>Client trouvé</h1>";
?>

<!-- Formulaire de modification du client / supression du client -->

<main>
    <section class="">
        <h2 class=""><?php echo $client->getClientName() . ' ' . $client->getClientSurname() ?></h2>

        <form action="/updateClient" class="">
            <div class="">
                <input type="text" name="clientName" id="clientNameId" value=<?php echo $client->getClientSurname() ?>  required>
                <label for="clientNameId">Nom du client</label>
            </div>
            <div class="">
                <input type="text" name="clientSurname" id="clientSurnameId" value=<?php echo $client->getClientName() ?> required>
                <label for="clientSurnameId">Prénom du client</label>
            </div>
            <div class="">
                <input type="email" name="clientMail" id="clientMailId" value=<?php echo $client->getClientMail() ?> required>
                <label for="clientMailId">Mail du client</label>
            </div>
            <div class="">
                <input type="text" name="clientPassword" id="clientPasswordId" placeholder="Create a new password" required>
                <label for="clientPasswordId">Mot de passe du client</label>
            </div>
            <div class="">
                <input type="number" name="clientFidelity" id="clientFidelityId" value=<?php echo $client->getClientFidelity() ?> required>
                <label for="clientFidelityId">Fidélité du client</label>
            </div>
            <div>
                <select name="clientRole" id="clientRoleId">
                    <option value="0">Client</option>
                    <option value="1">Admin</option>
                    <option value="2">Cuisine</option>
                </select>
                <label for="clientRoleId">Rôle du client</label>
            </div>
            <input type="submit" value="Modifier le client" class="">

    </section>
</main>



<?php require VIEWS . "base/footer.php"; ?>