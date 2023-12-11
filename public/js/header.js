document.addEventListener('DOMContentLoaded', function () {
    let showPopupButton = document.querySelector('.body__header__nav__menuToggle');
    let popup = document.querySelector('menu');
    let header = document.querySelector('.body__header__connexion__myAccount__placeholder');
    let icon = document.querySelector(".body__header__connexion__myAccount__rigth i");
    let content = document.querySelector(".body__header__connexion__myAccount__content");

    header.addEventListener('click', function () {
        icon.classList.toggle('active');
        content.classList.toggle('active');
    });

    document.addEventListener('click', function (event) {
        if (!header.contains(event.target) && !popup.contains(event.target)) {
            icon.classList.remove('active');
            content.classList.remove('active');
        }
    });

    showPopupButton.addEventListener('click', function (event) {
        event.stopPropagation();
        popup.classList.toggle("active");
    });

    document.addEventListener('click', function (event) {
        if (event.target !== showPopupButton && !popup.contains(event.target)) {
            popup.classList.remove("active");
        }
    });
});
