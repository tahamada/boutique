$( document ).ready(function(){
    function connexionFunction(){
        console.log("connfunc");
        $.ajax({
                method: "POST",
                url: "connexion.php",
                data: { email: $("#email").val(), password: $("#password").val() }
            })
            .done(function(reponse) {
                console.log(reponse);
            })
            .fail(function() {
                console.log("fail");
            })
            .always(function() {

            });
    }
    dialog = $( "#ConnexionDialog" ).dialog({
        autoOpen: false,
        height: 300,
        width: 250,
        modal: true,
        buttons: {
          "Se connecter": connexionFunction,
          Fermer: function() {
            dialog.dialog( "close" );
          }
        },
        close: function() {
          //form[ 0 ].reset();
          //allFields.removeClass( "ui-state-error" );
        }
      });
   $("#connexionButton").click(function(){
      $("button").addClass("btn");
      $("button").addClass("btn-default");
      dialog.dialog( "open" );
   });    
});