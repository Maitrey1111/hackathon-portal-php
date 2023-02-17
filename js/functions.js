// For Contact Section
function expand(x) {
    let collection = x.children;
    collection[0].style.width = "19px";
    collection[1].style.fontSize = "17.5px";
}
function normal(x) {
    let collection = x.children;
    collection[0].style.width = "18px";
    collection[1].style.fontSize = "17px";
}

// For SIGN UP
function highlight(data) {
    let collection = data.children;
    collection[0].style.fontWeight = "600";
    collection[1].style.border = "1px solid white";
    collection[1].style.autofocus = "on";
}
function unhighlight(data) {
    let collection = data.children;
    collection[0].style.fontWeight = "500";
    collection[1].style.border = "0px solid white";
}

// SIGN UP SKILL Section
function showup(data) {
    let status = document.getElementById(data).style.display;
    if (status === "none") {
        document.getElementById(data).style.display = "block";
    }
    else {
        document.getElementById(data).style.display = "none";
    }
}

// after check on other
function showlen(current) {
    let str = current.value;
    console.log(str);
    let count = str.length;
    if (count > 0) {
        document.getElementById('passlentext').style.display = "block";
        document.getElementById('passlen').innerText = count;
    }
    else {
        document.getElementById('passlentext').style.display = "none";
    }
}

//body tag
function popup() {
    // alert("Get more convinience with our Application: \n\t The HACKATHON App \n Download now...\n https://www.google.com");
}

//confirm password
function confirm() {
    let p = document.getElementById("password").value;
    let confp = document.getElementById("confp").value;

    if (p === confp) {
        // document.getElementById('passconf').style.display = "block";
        // document.getElementById('passconf').innerText = "Passwords don't match...";
        // document.getElementById("confp").setCustomValidity("Passwords don't match");
        document.getElementById("confp").setCustomValidity("");
    }
    else {
        document.getElementById("confp").setCustomValidity("Passwords did't match");
    }

}

//email regex, DB validation
function validateEmail(email){
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
        document.getElementById("emailvalidity").innerHTML = '';               
        if (email.length != 0) {
            const emailValidation = new XMLHttpRequest();
            emailValidation.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("emailvalidity").innerHTML = this.responseText;               
                }
            }
            emailValidation.open("GET", "emailValid.php?email=" + email, true);
            emailValidation.send();
        } 
    }
    else {
        if (email.length === 0) {
            document.getElementById("eamilvalidity").innerHTML = "";
        }
        else{
            document.getElementById('emailvalidity').style.display = "block";
            document.getElementById('emailvalidity').innerText = "Email is Invalid";
        }
    }
}

//username DB validation
function validateUname(uname) {
    if (uname.length === 0) {
        document.getElementById('userdesc').innerHTML = "";
    }
    else {
        const unameValidation = new XMLHttpRequest();
        unameValidation.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("userdesc").innerHTML = this.responseText;               
            }
        }
        unameValidation.open("GET", "unameValid.php?uname=" + uname, true);
        unameValidation.send();
    }
}

//regno DB validation
function validateRegno(regno){
    if (regno.length === 0) {
        document.getElementById("regnovalidity").innerHTML = "";
    }
    else{
        const regnoValidation = new XMLHttpRequest();
        regnoValidation.onreadystatechange = function (){
            if (this.readyState == 4 && this.status == 200){
                document.getElementById("regnovalidity").innerHTML = this.responseText;               
            }
        }
        regnoValidation.open("GET", "regnoValid.php?regno=" + regno, true);
        regnoValidation.send();
    } 
}

