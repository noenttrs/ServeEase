document.querySelector(".body__main__presentation__content__addPanerForm__inputQuantity__minus")
    .addEventListener('click', () => {
        let placeholder = document.querySelector(".body__main__presentation__content__addPanerForm__inputQuantity__placeholder")
        let productQuantityHidden = document.querySelector(".body__main__presentation__content__addPanerForm__inputQuantity__productQuantity")
        if (isNaN(Number(placeholder.innerText))) return placeholder.innerText = 1
        if (Number(placeholder.innerText) <= 1) return
        productQuantityHidden.value = Number(placeholder.innerText) - 1
        placeholder.innerText = Number(placeholder.innerText) - 1
    })

document.querySelector(".body__main__presentation__content__addPanerForm__inputQuantity__plus")
    .addEventListener('click', () => {
        let placeholder = document.querySelector(".body__main__presentation__content__addPanerForm__inputQuantity__placeholder")
        let productQuantityHidden = document.querySelector(".body__main__presentation__content__addPanerForm__inputQuantity__productQuantity")
        if (isNaN(Number(placeholder.innerText))) return placeholder.innerText = 1
        if (Number(placeholder.innerText) < 1) return
        productQuantityHidden.value = Number(placeholder.innerText) + 1
        placeholder.innerText = Number(placeholder.innerText) + 1
    })