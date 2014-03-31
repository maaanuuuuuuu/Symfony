$(document).ready(
	function(){
		//transformer le titre en h1
		$("#blogPost_title").focusout(
			function(){
				text = $(this).val();
				if(text != ""){
					$h1element = $('<h1>'+text+'</h1>');
					$h1element.insertBefore($(this));
					$h1element.addClass("dummyTitle");
					$(this).hide();
					var $input = $(this);
					$h1element.click(
						function(){
							$(this).remove();
							$input.show();
							$input.focus();
						}
					);
				}
			}
		);
		//gérer le ctrl+s et le shift+tab
		$("#blogPost_text").keypress(
			function(event) {
			    if (event.which == 115 && (event.ctrlKey||event.metaKey)|| (event.which == 19)) {
			        event.preventDefault();
			        console.log("save");
			        if($("#blogPost_title").val() != "" && $(this).val() != ""){
			        	$(this).parents("form").submit();
			        }
			        return false;
			    }
			    else{
			    	var keyCode = event.keyCode || event.which;  
				    if(keyCode == 9 && event.shiftKey){
				    	event.preventDefault();
				    	$("#blogPost h1").remove();
				    	$("#blogPost #blogPost_title").show();
				    	$("#blogPost #blogPost_title").focus();
				    }
			    	
			    }
			    return true;
			}
		);
		//gestion du bouton edit
		// $(".blogTitle .editButton").click(
		// 	function(){
		// 		console.log("edit");
		// 		//rendre le titre et le text editable

		// 		//gérer les events pour passer en h1

		// 		//gérer les events de keypress


		// 	}
		// );
	}
);