function validateEmail(){
	var email = document.forms["myForm"]["email"].value;
	var emailError = document.getElementById("emailError");
	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (re.test(email) == false){
    	emailError.innerHTML = "<br><div class='alert alert-danger'> <strong>Warning!</strong> Please enter a valid email. </div>";
    }
    else{
    	emailError.innerHTML = "";
    }
}

function validateFirst(){
	var first = document.forms["myForm"]["first"].value;
	var username = document.forms["myForm"]["username"].value;
	var email = document.forms["myForm"]["email"].value;
	var password = document.forms["myForm"]["password"].value;
	var password1 = document.forms["myForm"]["password1"].value;
	var firstError = document.getElementById("firstError");
	var userError = document.getElementById("userError");
	var emailError = document.getElementById("emailError");
	var passError1 = document.getElementById("passError1");
	var passError2 = document.getElementById("passError2");
	if (first == null || first.trim() == "") {
		firstError.innerHTML = "<br><div class='alert alert-warning'> <strong>Warning!</strong> You must include your first name. </div>";
	}
	else{
		firstError.innerHTML = "";
	}
	return false;
}

function validateLast(){
	var last = document.forms["myForm"]["last"].value;
	var lastError = document.getElementById("lastError");
	if (last == null || last.trim() == "") {
	lastError.innerHTML = "<br><div class='alert alert-warning'> <strong>Warning!</strong> You must include your last name. </div>";
	}
	else{
		lastError.innerHTML = "";
	}
	return false;
}

function validateUser(){
	var username = document.forms["myForm"]["username"].value;
	var userError = document.getElementById("userError");
	if (username.trim() == ""){
		userError.innerHTML = "<br><div class='alert alert-warning'> <strong>Warning!</strong> Please enter a username. </div>"
	}
	else if (username.trim().length < 6){
		userError.innerHTML = "<br><div class='alert alert-warning'> <strong>Warning!</strong> Your username must be longer than 6 chars. </div>"
	}
	else {
		userError.innerHTML = "";
	}
}
function validatePass(){
	var password = document.forms["myForm"]["password"].value;
	var passError1 = document.getElementById("passError1");
	if (password.length <8){
		passError1.innerHTML = "<br><div class='alert alert-warning'> <strong>Warning!</strong> Your password must be longer than 8 chars. </div>"
	}
	else{
		passError1.innerHTML = "";
	}
}
function validatePass1(){
	var password1 = document.forms["myForm"]["password1"].value;
	var password = document.forms["myForm"]["password"].value;
	var passError2 = document.getElementById("passError2");
	if (password1 !== password){
		passError2.innerHTML = "<br><div class='alert alert-warning'> <strong>Warning!</strong> Passwords entered do not match. </div>"
	}
	else{
		passError2.innerHTML = "";
	}
}