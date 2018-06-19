var bouttonBannir=document.getElementById('ban');
var ajoutModo=document.getElementById('newModo');
var retourMembre=document.getElementById('dwnDroit');
var envoie=document.getElementById('send');
var warningTitleInput=document.getElementById('newMovie');
var warningTitleText=document.getElementById('warningTitle');
warningTitleText.style.display="0";
bouttonBannir.addEventListener("click", function() {
	alert("Vous allez bannir un membre! Son pseudo sera inutilisable.");
});

ajoutModo.addEventListener("click", function( ){
	alert("Ce membre, sera inscrit en tant que modérateur du forum! :)");
});
retourMembre.addEventListener("click", function( ){
	alert("Les droits du modérateur ont été modifié!");
});

envoie.addEventListener("click",function(){
	alert("Le film a bien été ajouté! ");
});
warningTitleInput.addEventListener("click",function(){
	warningTitleText.style.display="1";
	warningTitleText.textContent="Veuilliez ne pas mettre d'espace ou de majuscule.";
});