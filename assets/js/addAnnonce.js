let model = document.getElementById('inputModel')
let resultat = document.getElementById('resultat')

model.addEventListener("click",function(e){
    resultat.innerText = model.value
})