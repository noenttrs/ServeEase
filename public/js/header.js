document.querySelector('.body__header__connexion__myAccount__placeholder')
    .addEventListener("click", () => {
        document.querySelector(".body__header__connexion__myAccount__rigth i").classList.toggle('active')
        document.querySelector(".body__header__connexion__myAccount__content").classList.toggle('active')
    })

document.querySelector('.body__header__menu__up__myAccount__placeholder')
    .addEventListener("click", () => {
        document.querySelector(".body__header__menu__up__myAccount__placeholder__rigth i").classList.toggle('active')
        document.querySelector(".body__header__menu__up__myAccount__content").classList.toggle('active')
    })

document.addEventListener('DOMContentLoaded', function () {
    var showPopupButton = document.querySelector('.body__header__nav__menuToggle');
    var popup = document.querySelector('menu');

    // Afficher le popup
    showPopupButton.addEventListener('click', function () {
        popup.classList.add("active")
    });

    // Fermer le popup lorsque l'utilisateur clique en dehors de celui-ci
    document.addEventListener('click', function (event) {
        if (event.target !== showPopupButton && !popup.contains(event.target)) {
            popup.classList.remove("active")
        }
    });
});