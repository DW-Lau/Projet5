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

/*LISTE MODERATEURS*/
var plusModoList= document.getElementById('plusModo');
var minusModoList=document.getElementById('minusModo');
var listModo=document.getElementById('listModo');

minusModoList.style.opacity="0";
listModo.style.display="none";

plusModoList.addEventListener('click',function(){
	listModo.style.display="inline-block";
	minusModoList.style.opacity="1";
	plusModoList.style.opacity="0";

	minusModoList.addEventListener('click',function(){
		plusModoList.style.opacity="1";
		minusModoList.style.opacity="0";
		listModo.style.display="none";
	});
});

/*LISTE MEMBRES*/

var plusmembresList= document.getElementById('plusMembre');
var minusmembresList=document.getElementById('minusMembre');
var listmembres=document.getElementById('listmembres');

minusmembresList.style.opacity="0";
listmembres.style.display="none";

plusmembresList.addEventListener('click',function(){
	listmembres.style.display="inline-block";
	minusmembresList.style.opacity="1";
	plusmembresList.style.opacity="0";

	minusmembresList.addEventListener('click',function(){
		plusmembresList.style.opacity="1";
		minusmembresList.style.opacity="0";
		listmembres.style.display="none";
	});
});

/*LISTE DES COMMENTAIRES*/
var plusCommsList= document.getElementById('plusComm');
var minusCommsList=document.getElementById('minusComm');
var listComms=document.getElementById('listComms');

minusCommsList.style.opacity="0";
//listComms.style.display="none";
var listSize=listComms.length;
console.log(listSize);
plusCommsList.addEventListener('click',function(){

	
	if (listComms.length!=1) {
		listComms.style.display="inline-block";
		minusCommsList.style.opacity="1";
		plusCommsList.style.opacity="0";
	}
	else{
		listComms.textContent="Il n'y a pas de commentaires à vérifier."
	}
	

	minusCommsList.addEventListener('click',function(){
		plusCommsList.style.opacity="1";
		minusCommsList.style.opacity="0";
		listComms.style.display="none";
	});
});