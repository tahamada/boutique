$( document ).ready(function(){
	ajoutPanier=function ajoutPanier(){
		$.ajax({
            method: "POST",
            crossDomain: true,
            xhrFields: {
                withCredentials: true
            },
            url: "ajoutPanier.php",
            data: { idArticle: $("#idArticle").val(),quantite:$("#quantite").val(),idVendeur:$("#idVendeur").val() },
            dataType : "json"
        })
        .done(function(reponse) {
          
        })
        .fail(function() {
            console.log("fail");
        })
        .always(function() {

        });
	}

    $("#titreDetail").on("click","#btnAjoutPanier",ajoutPanier);
});