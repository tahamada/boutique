$( document ).ready(function(){
	function commentaireFunction(){

		$.ajax({
                method: "POST",
                crossDomain: true,
                xhrFields: {
                    withCredentials: true
                },
                url: "commentaire.php",
                data: { idArticle: $("#idArticle").val() },
                dataType : "html"
            })
            .done(function(reponse) {
               $("#commentaire div").html(reponse);
            })
            .fail(function() {
                console.log("fail");
            })
            .always(function() {

            });
	}
	commentaireFunction();
});
