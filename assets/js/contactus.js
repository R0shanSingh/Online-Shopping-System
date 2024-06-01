let username = document.getElementById("contact-username");
let message = document.getElementById("contact-mssg");

let Email = document.getElementById("contact-email");
let phone = document.getElementById("contact-phoneNo");
let contactForm = document.getElementById("contact-submit-form");

let emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
let phonePattern = /^[0-9]{10}$/;

function emailvalidation(email){
    if(email.value.match(emailPattern)){ 
        email.style.border = "2px solid green";
    }
    else{ 
        email.style.border = " solid 2px red";
    }
    if(email.value === ""){
        email.style.border= "2px solid #cacaca";
    }
};
function phonevalidation(number){
    if(number.value.match(phonePattern)){ 
        number.style.border = "2px solid green";
    }
    else{ 
        number.style.border = " solid 2px red";
    }
    if(number.value === ""){
        number.style.border= "2px solid #cacaca";
    }
};


Email.addEventListener("keyup", () => {
    emailvalidation(Email);
});
phone.addEventListener("keyup", () => {
    phonevalidation(phone);
});

contactForm.onsubmit = () => {
    if(Email.value.match(emailPattern) && phone.value.match(phonePattern) && username.value!=null && message.value!=null ){
        return true;
    }
    return false;
}