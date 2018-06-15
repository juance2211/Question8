var url_local = "http://localhost/~juan";

$(document).ready(function(){
    $("#calculate").click(function(){
    	var x =$("#value1").val();
        var y = $("#value2").val();
        var op = $("#sel1").val();
        var data = {
	          values: [x,y],
	          operation: op
        };
	    $.ajax({
	        type: "POST",
	        url: url_local +"/endpoints/index.php",
	        data: JSON.stringify(data),
	        contentType: "application/json",
	        dataType: "json",
	        success: function(msg) {
	            if (msg.Status == 'error')
        			$("#result").val("error") ;
        		else if (msg.Status == "OK")
        			$("#result").val(msg.Result);
        		else 
        			$("#result").val("error");
	        },
	        error: function(e){
	            $(divToBeWorkedOn).html("Unavailable");
	        }
	    });

    });
});