$( document ).ready(function(){
	commentaireFunction=function commentaireFunction(){

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
    if($("#commentaire div"))
	   commentaireFunction();

    ajoutCommentaire=function ajoutCommentaire(){
        if($("#envoyerCommentaire").prev().val().trim()){
            $.ajax({
                method: "POST",
                crossDomain: true,
                xhrFields: {
                    withCredentials: true
                },
                url: "ajoutCommentaire.php",
                data: { idArticle: $("#idArticle").val(), idPersonne: $("#idClient").val(),contenu:$("#envoyerCommentaire").prev().val()},
                dataType : "html"
            })
            .done(function(reponse) {

               commentaireFunction();
            })
            .fail(function() {
                console.log("fail");
            })
            .always(function() {

            });
        }
    }
});
