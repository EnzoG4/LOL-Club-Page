function validateEmail(){
	var email = document.forms["passRecovery"]["email"].value;
	var emailError = document.getElementById("emailError");
	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (re.test(email) == false){
    	emailError.innerHTML = "<br><div class='alert alert-danger'> <strong>Warning!</strong> Please enter a valid email. </div>";
    }
    else{
    	emailError.innerHTML = "";
    }
}