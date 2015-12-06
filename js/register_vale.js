var ck_username = /^[A-Za-z0-9_]{2,20}$/;
var ck_password =  /^(?=.*\d).{4,12}$/;
var ck_name = /^[A-Za-z0-9 ]{2,20}$/;
var ck_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i

function validateRegister(){
  console.log("ugh");
  var username = document.getElementById('username').value;
  var password = document.getElementById('pass').value;
  var firstname = document.getElementById('firstname').value;
  var lastname = document.getElementById('lastname').value;
  var email = document.getElementById('email').value;
  var cemail = document.getElementById('email').value;
  var cpassword = document.getElementById('cpass').value;
  var errors = [];

  if (!ck_name.test(firstname)) {
    errors[errors.length] = "Invalid first name.";
  }
  if (!ck_name.test(lastname)) {
    errors[errors.length] = "Invalid last name.";
  }
  if (!ck_email.test(email)) {
    errors[errors.length] = "Invalid email.";
  }
  if (!ck_username.test(username)) {
    errors[errors.length] = "Usernames can't have special characters.";
  }
  if (!ck_password.test(password)) {
    errors[errors.length] = "Invalid password.";
  }
  if(password!=cpassword){
    errors[errors.length] = "Passwords do not match.";
  }
  if(email!=cemail){
    errors[errors.length] = "Emails do not match.";
  }
  if (errors.length > 0) {
    errors[errors.length] = "Invalid password.";
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
