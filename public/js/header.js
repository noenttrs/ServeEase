document.querySelector('.body__header__connexion__myAccount__left span')
    .addEventListener("click", () => {
        document.querySelector(".body__header__connexion__myAccount__rigth i").classList.toggle('active')
        document.querySelector(".body__header__connexion__myAccount__content").classList.toggle('active')
    })