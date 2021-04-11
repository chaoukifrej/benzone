let btnConnectionToRegistration = document.getElementById("btnConnectionToRegistration")
let btnRegistrationToConnection = document.getElementById("btnRegistrationToConnection")
let formConnection = document.getElementById("formConnection")
let formRegistration = document.getElementById("formRegistration")
let connection = document.getElementById("connection")
let registration = document.getElementById("registration")

registration.style.display = "none"
formRegistration.style.display = "none"


btnConnectionToRegistration.addEventListener('click', function(e){
    formConnection.style.display = "none"
    connection.style.display = "none"
    registration.style.display = "block"
    formRegistration.style.display = "flex"
})

btnRegistrationToConnection.addEventListener('click', function(e){
    formConnection.style.display = "flex"
    connection.style.display = "block"
    registration.style.display = "none"
    formRegistration.style.display = "none"
})

