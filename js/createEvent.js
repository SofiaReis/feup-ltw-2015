$(document).ready(function() {
var nrIm=1;
  $( "#datepicker" ).datepicker();

  $("#add_image_input").click(function() {
    nrIm=nrIm+1;
    $("#add_image_input").before('<span>Image '+ nrIm +':</span><div class="fileUpload btn btn-primary" name="image">  <input id="file" type="file" class="fileUpload" name="file[]"/></div>');

  });
});
