$( document ).ready(function(){
    function panierFunction(){
        console.log("connfunc");
        $.ajax({
                method: "POST",
                crossDomain: true,
                xhrFields: {
                    withCredentials: true
                },
                url: "panier.php",
                data: { email: $("#email").val(), password: $("#password").val() },
                dataType : "html"
            })
            .done(function(reponse) {
               $( "#panierDialog" ).html(reponse);
            })
            .fail(function() {
                console.log("fail");
            })
            .always(function() {

            });
    }

    function commanderFunction(){

    }

    dialogPanier = $( "#panierDialog" ).dialog({
        autoOpen: false,
        height: 500,
        width: 1000,
        modal: true,
        buttons: {
          "Commander": commanderFunction,
          Fermer: function() {
            dialogPanier.dialog( "close" );
          }
        },
        close: function() {
          //form[ 0 ].reset();
          //allFields.removeClass( "ui-state-error" );
        }
      });


   $("#btnPanier").click(function(){
      panierFunction();
      dialogPanier.dialog( "open" );
   });    


});