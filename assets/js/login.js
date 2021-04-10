let btnConnectionToInscription = document.getElementById("btnConnectionToInscription")
let btnInscriptionToConnection = document.getElementById("btnInscriptionToConnection")
let formConnection = document.getElementById("formConnection")
let formInscription = document.getElementById("formInscription")
let connection = document.getElementById("connection")
let inscription = document.getElementById("inscription")

inscription.style.display = "none"
formInscription.style.display = "none"


btnConnectionToInscription.addEventListener('click', function(e){
    formConnection.style.display = "none"
    connection.style.display = "none"
    inscription.style.display = "block"
    formInscription.style.display = "flex"
})

btnInscriptionToConnection.addEventListener('click', function(e){
    formConnection.style.display = "flex"
    connection.style.display = "block"
    inscription.style.display = "none"
    formInscription.style.display = "none"
})

