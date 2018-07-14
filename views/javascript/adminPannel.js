
var ajoutModo=document.getElementById('newModo');
var retourMembre=document.getElementById('dwnDroit');
var envoie=document.getElementById('send');
var warningTitleInput=document.getElementById('newMovie');
var warningTitleText=document.getElementById('warningTitle');
warningTitleText.style.display="0";


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
	warningTitleText.textContent="Veuilliez respecter le nom du fichier";
});

/*LISTE MODERATEURS*/
var plusModoList= document.getElementById('plusModo');
var minusModoList=document.getElementById('minusModo');
var listModo=document.getElementById('listModo');

minusModoList.style.opacity="0";
listModo.style.display="none";

plusModoList.addEventListener('click',function(){
	listModo.style.display="block";
	minusModoList.style.display="inline-block";
	plusModoList.style.display="none";

	minusModoList.addEventListener('click',function(){
		plusModoList.style.display="block";
		minusModoList.style.display="none";
		listModo.style.display="none";
	});
});

/*LISTE MEMBRES*/

var plusmembresList= document.getElementById('plusMembre');
var minusmembresList=document.getElementById('minusMembre');
var listmembres=document.getElementById('listmembres');

minusmembresList.style.display="none";
listmembres.style.display="none";

plusmembresList.addEventListener('click',function(){
	listmembres.style.display="block";
	minusmembresList.style.display="inline-block";
	plusmembresList.style.display="none";

	minusmembresList.addEventListener('click',function(){
		plusmembresList.style.display="block";
		minusmembresList.style.display="none";
		listmembres.style.display="none";
	});
});

/*LISTE DES COMMENTAIRES*/
var plusCommsList= document.getElementById('plusComm');
var minusCommsList=document.getElementById('minusComm');
var listComms=document.getElementById('listcomments');

minusCommsList.style.display="none";
listComms.style.display="none";

plusCommsList.addEventListener('click',function(){
	minusCommsList.style.display="inline-block";
	listComms.style.display="block";
	plusCommsList.style.display="none";

	minusCommsList.addEventListener('click',function(){
		plusCommsList.style.display="block";
		minusCommsList.style.display="none";
		listComms.style.display="none";
	});
});