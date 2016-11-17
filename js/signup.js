function submitform(){
			var flag=0;
			var x = document.forms["signup"]["password"].value;
			var y = document.forms["signup"]["cpassword"].value;
			if(document.forms["signup"]["name"].value==""){
				document.getElementById("name").innerHTML="Missing field";
				flag=1;
			}

			if(document.forms["signup"]["email"].value==""){
				document.getElementById("email").innerHTML="Missing field";
				flag=1;
			}

			if(document.forms["signup"]["address"].value==""){
				document.getElementById("address").innerHTML="Missing field";
				flag=1;
			}

			if(document.forms["signup"]["city"].value==""){
				document.getElementById("city").innerHTML="Missing field";
				flag=1;
			}

			if(document.forms["signup"]["state"].value==""){
				document.getElementById("state").innerHTML="Missing field";
				flag=1;
			}

			if(document.forms["signup"]["phone"].value==""){
				document.getElementById("phone").innerHTML="Missing field";
				flag=1;
			}

			if(document.forms["signup"]["username"].value==""){
				document.getElementById("username").innerHTML="Missing field";
				flag=1;
			}

			if(document.forms["signup"]["password"].value==""){
				document.getElementById("password").innerHTML="Missing field";
				flag=1;
			}

			if(document.forms["signup"]["cpassword"].value==""){
				document.getElementById("cpassword").innerHTML="Missing field";
				flag=1;
			}

    		if (x != y) {
        		alert("Passwords not matched");
        		flag=1;
        	}

        	if(flag==0){
        		document.signup.submit();
        	}
    		}
