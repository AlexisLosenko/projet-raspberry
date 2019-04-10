function checkFirstName() {

    let firstName = document.getElementById('firstName');
    let filter = /^([a-zA-Z éè-])+$/;

    if (!filter.test(firstName.value)) {
        firstName.style.borderColor="red";
        firstName.focus;
        return false;
    }else{
        firstName.style.borderColor="green";
        return true;
    }
}

function checkLastName() {

    let lastName = document.getElementById('lastName');
    let filter = /^([a-zA-Z éè-])+$/;

    if (!filter.test(lastName.value)) {
        lastName.style.borderColor="red";
        lastName.focus;
        return false;
    }else{
        lastName.style.borderColor="green";
        return true;
    }
}


function checkEmail() {

    let email = document.getElementById('email');
    let filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (!filter.test(email.value)) {
        email.style.borderColor="red";
        email.focus;
        return false;
    }else{
        email.style.borderColor="green";
        return true;
    }
}

function verifyForm(){
    if(checkFirstName() && checkLastName() && checkEmail() == true){
        return true;
    }else{
        return false;
    }

    function verifyInput(){
        if(checkFirstName() == true){
            firstName.value = firstName;
        }else{
            firstName.value = "";
        }

        if(checkLastName() == true){
            lastName.value = lastName;
        }else {
            lastName.value = "";
        }

        if(checkEmail() == true){
            email.value = email;
        }else {
            email.value = "";
        }
    }
}
