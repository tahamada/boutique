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
    if($("#commentaire div"))
	   commentaireFunction();

    function ajoutCommentaire(){
        $.ajax({
                method: "POST",
                crossDomain: true,
                xhrFields: {
                    withCredentials: true
                },
                url: "ajoutCommentaire.php",
                data: { idArticle: $("#idArticle").val(), idClient: $("#idClient").val()},
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
    $("#envoyerCommentaire").click("ajoutCommentaire");
});
