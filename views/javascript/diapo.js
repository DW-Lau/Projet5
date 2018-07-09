var Diaporama={	
	sources:"",
	textes:"",
	compteur:0,
	
		change: function(i){
			 this.compteur +=i;
				if( this.compteur >  this.sources.length-1&& this.compteur> this.textes.length-1){
					this.compteur=0;
				}
				if( this.compteur<0){
				  this.compteur= this.sources.length-1&&this.textes.length-1;
				}
				document.getElementById("carrousel").src=this.sources[ this.compteur];//affichage de l'image
				document.getElementById("legende").innerHTML=this.textes[this.compteur];//affichage de la légende
			},

		init:function(tabImgs,tabTextes){
			 this.sources=tabImgs;
			 this.textes=tabTextes;
		}
	};
/*-------------GRANDE RESOLUTION------------------*/
var diapo=["views/Images/Screens/BigBuckBunny.png","views/Images/Films/Sintel.jpg"];
var description=["Bonne visite!", "Bienvenu!"," Inscrivez vous"];
var miniDesc=["hello 1", "hello 2", "hello3"];

var affichage=Object.create(Diaporama);
affichage.init(diapo,description);

var miniReso=Object.create(Diaporama);
miniReso.init(diapo, miniDesc);

var pDroite=document.getElementById("arrows-R");//récupération des boutons en responsiv
var pGauche=document.getElementById("arrows-L");//récupération des boutons en responsiv
		
var tailleB=window.innerWidth;
if(tailleB >900){		
		pDroite.addEventListener("click",function(){
			affichage.change(1);
		});
		pGauche.addEventListener("click",function(){
			affichage.change(-1);
		});
}
else if( tailleB<=900){
		pDroite.addEventListener("click",function(){
			miniReso.change(1);
		});
		pGauche.addEventListener("click",function(){
			miniReso.change(-1);
		});
}



