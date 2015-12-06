$(function() {
    $(".button").click(function() {
     	var comment = $("textarea#message").val();
     	console.log(comment);

     	if(comment == "")
     	{
     		 $("label#message_error").show();
        	$("textarea#message").focus();
        	return false;
     	}

     	var dataString = 'comment='+ comment;

     	$.ajax({
    		type: "POST",
    		url: "./php/action_add_comment.php",
    			data: dataString,
    			success: function() {
      $('#sucess').html("<div id='message'></div>");
      
    }
  });
  return false;
    });
  });