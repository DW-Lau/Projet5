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
var diapo=["views/Images/Diapo/BigBuckBunnyOpening.png","views/Images/Diapo/blenderOpenMovie.png","views/Images/Diapo/TearsOfSteel.png","views/Images/Diapo/blenderOpenMovie_v2.png"];
var description=["Bonne visite!", "Bienvenu sur le site (non-officiel) de la fondation Blender Open Movie!","Retrouvez ici, tous les projets réalisés par l'institue Blender","Aussi riches et variés"];
var miniDiapo=["views/Images/Avatars/Agent327.png", "views/Images/Avatars/Agent327_v2.png", "views/Images/Avatars/bigbuckbunny_EvilsSquirels.png"];

var affichage=Object.create(Diaporama);
affichage.init(diapo,description);

var miniReso=Object.create(Diaporama);
miniReso.init(miniDiapo, description);

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



