document.querySelectorAll(".inputPassword i").forEach((eyes, index) => {
    eyes.addEventListener("click", (event) => {
        let inputPassword = document.querySelectorAll(".inputPassword input")
        if (inputPassword[index].getAttribute("type") === "password") {
            event.target.classList = "fa-solid fa-eye"
            inputPassword[index].type = "text"
        } else {
            event.target.classList = "fa-solid fa-eye-slash"
            inputPassword[index].type = "password"
        }
    })
})