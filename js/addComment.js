$("#comment").live( "submit" , function(){
    // Intercept the form submission
    var formdata = $(this).serialize(); // Serialize all form data

    // Post data to your PHP processing script
    $.post( "#", formdata, function( data ) {
        // Act upon the data returned, setting it to #success <div>
        $("#success").html ( data );
    });

    return false; // Prevent the form from actually submitting
});