$( document ).ready(function(){
	triArticle=function triArticle(){
        console.log($(this));
        var url = window.location.href;
        var tri="";
        if($(this).hasClass('asc'))
            tri="asc";
        else if($(this).hasClass('desc'))
            tri="desc";
		$.ajax({
                method: "GET",
                crossDomain: true,
                xhrFields: {
                    withCredentials: true
                },
                url: url,
                data: { tri: tri, mode: "ajax" },
                dataType : "html"
            })
            .done(function(reponse) {
               $("#articles").html(reponse);
            })
            .fail(function() {
                console.log("fail");
            })
            .always(function() {

            });
	}

    $( "#tri" ).on( "click", "button",triArticle);
    
});
