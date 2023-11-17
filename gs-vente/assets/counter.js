let counterplus=document.getElementById('counter-plus')
counterplus.addEventListener('click', function(){
let qte=document.getElementById("qte");
let ancienne_valeur= parseInt(qte.value);
let nouvelle_valeur=ancienne_valeur+1;
qte.value=nouvelle_valeur;
})
let countermoins=document.getElementById('counter-moins')
countermoins.addEventListener('click', function(){
let qte=document.getElementById("qte");
let ancienne_valeur= parseInt(qte.value);
let nouvelle_valeur=ancienne_valeur-1;
qte.value=nouvelle_valeur;
if(qte.value<0){qte.value=0;}
})