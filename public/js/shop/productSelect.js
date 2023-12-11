document.querySelectorAll('.body__main__presentation__content__select__description__placeholder')
    .forEach((placeholder, index) => {
        placeholder.addEventListener('click', () => {
            document.querySelectorAll(".body__main__presentation__content__select__description__placeholder__rigth i")[index].classList.toggle("active")
            document.querySelectorAll(".body__main__presentation__content__select__description__content")[index].classList.toggle("active")
        })
    })