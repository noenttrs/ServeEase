<?php
if (session_status() == 1) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8"> <!--Meta-->
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/38e38eb36a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/css/more.css">
    <link rel="stylesheet" href="/css/base/Header.css">
    <link rel="stylesheet" href="/css/base/Footer.css">
    <link rel="stylesheet" href=<?php echo "$pathCss" ?>>
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.css" rel="stylesheet" />
    <title>ServeEase</title>
</head>

<body>
    <header>
        <nav class="body__header__nav">
            <a href="/">
                <h2 class="body__header__h2">ServeEase</h2>
            </a>

            <button class="body__header__nav__menuToggle">
                <span class="line l1"></span>
                <span class="line l2"></span>
                <span class="line l3"></span>
            </button>

            <!-- cacher le bouton connexion et inscription si l'utilisateur est connecté -->
            <?php if (isset($_SESSION["client"])) : ?>
                <section class="body__header__connexion">
                    <section class="body__header__connexion__myAccount">
                        <section class="body__header__connexion__myAccount__placeholder">
                            <div class="body__header__connexion__myAccount__left">
                                <i class="fa-solid fa-user"></i>
                                <span>Mon compte</span>
                            </div>
                            <div class="body__header__connexion__myAccount__rigth">
                                <i class="fa-solid fa-chevron-down"></i>
                            </div>
                        </section>
                        <section class="body__header__connexion__myAccount__content">
                            <?php if ($_SESSION["client"]["CLIENT_ROLE"] === 1) : ?>
                                <a href="/admin" class="body__header__connexion__myAccount__content__admin">Administrateur</a>
                            <?php endif ?>
                            <a href="/account" class="body__header__connexion__myAccount__content__parameter">Paramètre</a>
                            <a href="/order" class="body__header__connexion__myAccount__content__order">Mes commandes</a>
                            <a href="/logout" class="body__header__connexion__myAccount__content__logout">Déconnexion</a>
                        </section>
                    </section>
                    <div class="body__header__connexion__basket">
                        <a href="/basket">Mon panier</a>
                    </div>
                </section>
                <menu>
                    <section class="body__header__menu">
                        <section class="body__header__menu__up">
                            <section class="body__header__menu__up__myAccount">
                                <section class="body__header__menu__up__myAccount__placeholder">
                                    <div class="body__header__menu__up__myAccount__placeholder__left">
                                        <i class="fa-solid fa-user"></i>
                                        <span>Mon compte</span>
                                    </div>
                                    <div class="body__header__menu__up__myAccount__placeholder__rigth">
                                        <i class="fa-solid fa-chevron-down"></i>
                                    </div>
                                </section>
                                <section class="body__header__menu__up__myAccount__content">
                                    <?php if ($_SESSION["client"]["CLIENT_ROLE"] === 1) : ?>
                                        <a href="/admin" class="body__header__menu__up__myAccount__content__admin">Administrateur</a>
                                    <?php endif ?>
                                    <a href="/account" class="body__header__menu__up__myAccount__content__parameter">Paramètre</a>
                                    <a href="/order" class="body__header__menu__up__myAccount__content__order">Mes commandes</a>
                                </section>
                            </section>
                            <a class="body__header__menu__up__basket" href="/basket">Mon panier</a>
                        </section>
                        <a class="body__header__menu__logout" href="/logout">Déconnexion</a>
                    </section>
                </menu>
            <?php endif; ?>

            <!-- afficher le bouton connexion et inscription si l'utilisateur n'est pas connecté -->
            <?php if (!isset($_SESSION["client"])) : ?>
                <section class="body__header__connexion">
                    <div class="body__header__connexion__singin">
                        <i class="fa-solid fa-user"></i>
                        <a href="/signin">Connexion</a>
                    </div>
                    <div class="body__header__connexion__singup">
                        <a href="/signup">Inscription</a>
                    </div>
                </section>
                <menu>
                    <section class="body__header__menu">
                        <section class="body__header__menu__up">
                            <div class="body__header__menu__signin">
                                <i class="fa-solid fa-user"></i>
                                <a href="/signin">Connexion</a>
                            </div>
                            <div class="body__header__menu__signup">
                                <a href="/signup">Inscription</a>
                            </div>
                        </section>
                    </section>
                </menu>
            <?php endif; ?>
        </nav>
    </header>
    <script src="js/header.js"></script>
</body>