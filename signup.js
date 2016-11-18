function submitform() {
    var pass1 = document.getElementById("password").value;
    var pass2 = document.getElementById("cpassword").value;
    var ok = true;
    if (pass1 != pass2) {
        //alert("Passwords Do not match");
        alert("Passwords mismatch");
        ok = false;
    }
    return ok;
}