$(document).ready(function(){

	//initilaisation des éléments
	$(".blogTitle .trashButton, .blogTitle .editButton").hide();
	$(".deleteConfirmation").hide();
	blogBeeingDeleted = null;
	var timer; // est déclaré en dehors de la fonction afin de pouvoir annuler l'effacement en clickant sur le bouton annuler

	//effet qui permet de griser une entrée du blog et l'éditer ou l'effacer
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

	//quand les boutons sont survollés ils deviennet plus visible
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

	//quand on est au dessus d'un entrée du blog on a aussi les boutons, et quand on sort les boutons ne s'affichent plus du tout
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


	//actions du bouton supprimer
	$(".container .blogEntry .trashButton").click(
		function(){
			var id = $(this).parents(".blogEntry").data("id");
			$blog = $(this).parents(".blogEntry");
			
			//empécher les evenements qui peuvent parasiter la disparition
			$(this).siblings(".editButton, .trashButton").off('click');
			$blog.off("mouseenter mouseleave");
			$blog.find(".blogTitle").off("mouseenter mouseleave");

			//effacer la blog post (affichage)
			$blog.fadeTo("slow", 0, function(){
				$(this).hide();
			});

			//effacer si un blog est entrain de se faire effacer (le message est encore présent)
			if(blogBeeingDeleted != null && blogBeeingDeleted !== undefined){
				deleteBlog(blogBeeingDeleted)
				window.clearTimeout(timer);
			}
			//afficher le "annuler effacerment" pendant x secondes
			$(".deleteConfirmation").hide(); //pour être sur qu'il est caché avant de le montrer
			$(".deleteConfirmation").slideToggle("fast");
			blogBeeingDeleted = id;
			//setter l'blogId avec l'id du blog à effacer
			$(".deleteConfirmation").data("blogId", id);
			//cacher dans x secondes
			timer = setTimeout(function() {
				$(".deleteConfirmation").show(); //pour être sur qu'il est montré avant de le cacher
				$(".deleteConfirmation").slideToggle("slow");
				//effacer la donnée
				deleteBlog(id);
				blogBeeingDeleted = null;
			}, 5000);	
		}
	)
	
	$(".cancelDeleteButton").click(
		function(){
			window.clearTimeout(timer);
			$(".deleteConfirmation").slideToggle("slow");
			//réafficher le blog blogBeeingDeleted
			$(".blogEntry[data-id='"+blogBeeingDeleted+"']").fadeTo("slow", 1);
			blogBeeingDeleted = null;
		}
	);
	function deleteBlog(id){
		console.log("delete",id);
		console.log(postaction.blog.remove);
		$.post(postaction.blog.remove, {"id":id}, function(data){
			// if(data.response==200 ){   					
				console.log(data);
			// }
			// else {//bad request
				// window.console && console.log(data.message);
			// }
		},"json");
	}
});