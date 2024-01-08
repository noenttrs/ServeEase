document.addEventListener('DOMContentLoaded', function () {
    let showPopupButton = document.querySelector('.body__header__nav__menuToggle');
    let popup = document.querySelector('menu');
    let header = document.querySelector('.body__header__connexion');
    let icon = document.querySelector(".body__header__connexion__myAccount__rigth i");
    let content = document.querySelector(".body__header__connexion__myAccount__content");
    let headerMobile = document.querySelector('.body__header__menu__up__myAccount__placeholder');
    let iconMobile = document.querySelector(".body__header__menu__up__myAccount__placeholder__rigth i");
    let contentMobile = document.querySelector(".body__header__menu__up__myAccount__content");

    header.addEventListener('click', function () {
        icon?.classList.toggle('active');
        content?.classList.toggle('active');
    });

    document.addEventListener('click', function (event) {
        if (!header.contains(event.target) && !popup.contains(event.target)) {
            icon?.classList.remove('active');
            content?.classList.remove('active');
        }
    });

    headerMobile?.addEventListener('click', function () {
        iconMobile.classList.toggle('active');
        contentMobile.classList.toggle('active');
    });

    document?.addEventListener('click', function (event) {
        if (!header.contains(event.target) && !popup.contains(event.target)) {
            iconMobile?.classList.remove('active');
            contentMobile.classList.remove('active');
        }
    });

    showPopupButton?.addEventListener('click', function (event) {
        event.stopPropagation();
        popup.classList.toggle("active");
    });

    document?.addEventListener('click', function (event) {
        if (event.target !== showPopupButton && !popup.contains(event.target)) {
            popup.classList.remove("active");
        }
    });
});
