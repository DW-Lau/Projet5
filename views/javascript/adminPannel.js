var bouttonBannir=document.getElementById('ban');
var ajoutModo=document.getElementById('newModo');
var retourMembre=document.getElementById('dwnDroit');

bouttonBannir.addEventListener("click", function() {
	alert("Vous allez bannir un membre! Son pseudo sera inutilisable.");
});

ajoutModo.addEventListener("click", function( ){
	alert("Ce membre, sera inscrit en tant que modérateur du forum! :)");
});
retourMembre.addEventListener("click", function( ){
	alert("Les droits du modérateur ont été modifié!");
});