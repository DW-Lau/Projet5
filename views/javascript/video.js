var bouton=document.getElementById('sousTitre');

bouton.style.border='orange 2px solid';
bouton.style.borderRadius="5px";
bouton.style.width="10%";

var msg=document.getElementById('activerSousTitre');
msg.style.display="none";

bouton.addEventListener('click',function(){
	msg.style.display="block";
	msg.style.fontSize="0.8em";
	msg.style.textAlign="justify";

});