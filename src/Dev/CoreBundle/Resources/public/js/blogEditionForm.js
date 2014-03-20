$(document).ready(function(){

	//initilaisation des éléments
	$(".blogTitle .trashButton, .blogTitle .editButton").hide();

	//effet qui permet de selectionner une entrée du blog et l'éditer ou l'effacer
	$(".container .blogEntry .blogTitle").mouseenter(
		function(){
			//griser l'entrée
			$(this).parent(".blogEntry").stop(true).fadeTo(300, 0.5);
			
		}
	).mouseleave(
		function(){
			//montrer l'entrée
			$(this).parent(".blogEntry").stop(true).fadeTo("fast", 1);
		}
	);

	$(".container .blogEntry .trashButton, .container .blogEntry .editButton").mouseenter(
		function(){
			$(this).show();
			$(this).css("opacity",1);
		}
	).mouseleave(
		function(){
			$(this).css("opacity",0.4);
		}
	);
	$(".container .blogEntry").mouseenter(
		function(){
			//afficher les boutons
			$(this).find(".trashButton, .editButton").show();
			$(this).find(".trashButton, .editButton").stop(true).fadeTo(500, 0.4);
		}
	).mouseleave(
		function(){
			//effacer les boutons
			var $el = $(this);
			$(this).find(".trashButton, .editButton").stop(true).fadeTo("fast", 0, function(){
				$el.find(".trashButton, .editButton").hide();
			});

		}
	)

});