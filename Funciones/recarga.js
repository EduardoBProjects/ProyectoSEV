 //src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" 
function cargarPagina(pagina)
    {
    //alert("Llega");
    //console.log(pagina);
    	$.get(pagina, function(htmlexterno){
    		$("#main").html(htmlexterno)
    	});
    }