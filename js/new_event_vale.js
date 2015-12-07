var ck_datec = /^\d{1,2}\/\d{1,2}\/\d{4}$/;
var ck_datef = /^\d{1,2}\-\d{1,2}\-\d{4}$/;
 
function validateCreate(){
  console.log("ugh");
  var title = document.getElementById('title').value;
  var description = document.getElementById('description').value;
  var date = document.getElementById('datepicker').value;
  var local = document.getElementById('local').value;
 
 
  var errors = [];
 
  if (title.length<2) {
    errors[errors.length] = "Too few characters on title. Minimum 2.";
  }
  if (title.length>30) {
    errors[errors.length] = "Too much characters on title. Maximum 30.";
  }
  if (description.length>165) {
    errors[errors.length] = "Too much characters on description. Maximum 165.";
  }
  if (local == null || local.length==0) {
    errors[errors.length] = "Please specify a location for your event.";
  }
  if( date == null || date.length==0){
    errors[errors.length] = "Invalid date input";
  }
  if (errors.length > 0) {
    reportErrors(errors);
    return false;
  }
  return true;
}
 
function reportErrors(errors){
  var msg = "Invalid input:\n";
  for (var i = 0; i<errors.length; i++) {
    var numError = i + 1;
    msg += "\n" + numError + ". " + errors[i];
  }
  swal({
        title: "Error!",
        text: msg,
        type: "error",
        confirmButtonText: "OK"
  });
}