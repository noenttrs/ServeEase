<?php
$pathCss = "css/gateway/signin.css";
require_once VIEWS . "base/Header.php" ?>

<main>
    <section class="body__main__presentation">
        <section class="body__main__presentation__image">
            <img src="https://tb-static.uber.com/prod/image-proc/processed_images/6543273de91ec9b37cbee283dcf7e888/5954bcb006b10dbfd0bc160f6370faf3.jpeg" alt="">
        </section>
        <section class="body__main__presentation__content">
            <h1 class="body__main__presentation__content__name">Menu Best Of™</h1>
            <p class="body__main__presentation__content__price">17 EUR</p>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Obcaecati adipisci neque veritatis similique aliquam nisi delectus minus, laborum veniam magni voluptate doloribus exercitationem eos, dignissimos nemo odio pariatur placeat voluptas!</p>
            <form action="" class="body__main__presentation__content__addPanerForm" method="post">
                <div class="body__main__presentation__content__form">
                    <i class="fa-solid fa-minus"></i>
                    <span>3</span>
                    <input type="hidden" value="">
                    <i class="fa-solid fa-plus"></i>
                </div>
                <input type="submit" value="Ajouter un panier">
            </form>
            <form action="" class="body__main__presentation__content__checkoutForm" method="post">
                <input type="submit" value="Acheter un produit">
            </form>
        </section>
    </section>

    <script src="js/function/inputPasswordSystem.js"></script>
</main>

<?php require_once VIEWS . "base/Footer.php" ?>