// Password Show Hide

function toggleEyeIcon(password, EyeIcon) {
    if (password.type == "password") {
        password.type = "text";
        EyeIcon.classList.replace("fa-eye-slash", "fa-eye");
    } else {
        password.type = "password";
        EyeIcon.classList.replace("fa-eye", "fa-eye-slash");
    }
}

let loginEyeIcon = document.getElementById('login-eye-icon');
let signupEyeIcon1 = document.getElementById('signup-eye-icon1');
let signupEyeIcon2 = document.getElementById('signup-eye-icon2');
let AdminEyeIcon = document.getElementById('admin-eye-icon');

let passwordLoginInput = document.getElementById('login-password-input');
let passwordSignupInput1 = document.getElementById('signup-password-input');
let passwordSignupInput2 = document.getElementById('signup-cpassword-input');
let passwordAdminInput = document.getElementById('admin-password');

loginEyeIcon.addEventListener("click", () => {
    toggleEyeIcon(passwordLoginInput, loginEyeIcon);
});

signupEyeIcon1.addEventListener("click", () => {
    toggleEyeIcon(passwordSignupInput1, signupEyeIcon1);
})

signupEyeIcon2.addEventListener("click", () => {
    toggleEyeIcon(passwordSignupInput2, signupEyeIcon2);
});

AdminEyeIcon.addEventListener("click", ()=> {
    toggleEyeIcon(passwordAdminInput, AdminEyeIcon);
});

// Login Signup

let signupButton = document.getElementById('toSignupPage');

let adminButton = document.getElementById('toAdminPage');

let loginButton = document.getElementById('toLoginPage');
let loginButton2 = document.getElementById('toLoginPage2');

let loginform = document.getElementById('modal-login-form');

let signupform = document.getElementById('modal-signup-form');

let adminform = document.getElementById('modal-admin-form');

signupButton.addEventListener("click", () => {
    loginform.style.display = "none";
    loginform.style.pointerEvents = "none";
    adminform.style.display = "none";
    adminform.style.pointerEvents = "none";
    signupform.style.display = "flex";
    signupform.style.pointerEvents = "all";
});

loginButton.addEventListener("click", () => {
    signupform.style.display = "none";
    signupform.style.pointerEvents = "none";
    adminform.style.display = "none";
    adminform.style.pointerEvents = "none";
    loginform.style.display = "flex";
    loginform.style.pointerEvents = "all";
});

loginButton2.addEventListener("click", ()=> {
    signupform.style.display = "none";
    signupform.style.pointerEvents = "none";
    adminform.style.display = "none";
    adminform.style.pointerEvents = "none";
    loginform.style.display = "flex";
    loginform.style.pointerEvents = "all";
});

adminButton.addEventListener("click", ()=> {
    loginform.style.display = "none";
    loginform.style.pointerEvents = "none";
    signupform.style.display = "none";
    signupform.style.pointerEvents = "none";
    adminform.style.display = "flex";
    adminform.style.pointerEvents = "all";
});

// Login Form Validation

let emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

function emailvalidation(email,emailIcon){
    if(email.value.match(emailPattern)){ 
        
        if(emailIcon.classList.contains("fa-circle-xmark")) {
            emailIcon.classList.replace("fa-circle-xmark","fa-circle-check");
            emailIcon.style.color= "green";
        }
        if(emailIcon.classList.contains("fa-envelope")) { 
            emailIcon.classList.replace("fa-envelope","fa-circle-check");
            emailIcon.style.color= "green";
        }  
        email.style.border = "2px solid green";
    }
    else{ 
        if(emailIcon.classList.contains("fa-envelope")) {
            emailIcon.classList.replace("fa-envelope","fa-circle-xmark");
            emailIcon.style.color= "red";
        }
        if(emailIcon.classList.contains("fa-circle-check")) { 
            emailIcon.classList.replace("fa-circle-check","fa-circle-xmark");
            emailIcon.style.color= "red";
        }  
        email.style.border = " solid 2px red";
    }
    if(email.value === ""){
        emailIcon.classList.replace("fa-circle-xmark","fa-envelope");
        emailIcon.style.color="#a0a4ac";
        email.style.border= "2px solid #cacaca";
    }
};

let loginFormEmail = document.getElementById("login-email-input");
let loginFormEmailIcon = document.getElementById("login-email-icon");

let signupFormEmail = document.getElementById("signup-email-input");
let signupFormEmailIcon = document.getElementById("signup-email-icon");

loginFormEmail.addEventListener("keyup", () => {
    emailvalidation(loginFormEmail,loginFormEmailIcon);
});

signupFormEmail.addEventListener("keyup", () => {
    emailvalidation(signupFormEmail,signupFormEmailIcon);
});

//password matching for signup form
let signupPass = document.getElementById("signup-password-input");
let signupCPass = document.getElementById("signup-cpassword-input");

signupCPass.addEventListener("keyup", ()=>{
    if(signupCPass.value==signupPass.value){
        signupCPass.style.border = "2px solid green";
    }
    else{
        signupCPass.style.border = "2px solid red";
    }
    if(signupCPass.value==""){
        signupCPass.style.border = "2px solid #cacaca";
    }
});

//form validation at the time of submit

let loginForm = document.getElementById("login-form");
let loginPass = document.getElementById("login-password-input");

loginForm.onsubmit = ()=>{

    if(loginFormEmailIcon.classList.contains("fa-circle-check") && loginPass.value!=""){
        return true;
    }
    else{
        if(loginFormEmail.value=="" || loginFormEmailIcon.classList.contains("fa-circle-xmark")){
            loginFormEmail.style.border="2px solid red";
        }
        if(loginPass.value==""){
            loginPass.style.border="2px solid red";
        }
        return false;
    }
};


let signupForm = document.getElementById("signup-form");
let userName = document.getElementById("signup-username-input");

signupForm.onsubmit = () => {
    if(signupFormEmailIcon.classList.contains("fa-circle-check") && signupCPass.value!=""&& signupCPass.value==signupPass.value && userName!="" ){
        return true;
    }
    else{
        if(signupFormEmail.value=="" || signupFormEmailIcon.classList.contains("fa-circle-xmark")){
            signupFormEmail.style.border="2px solid red";
        }
        if(signupPass.value==""){
            signupPass.style.border="2px solid red";
        }
        if(signupCPass.value=="" ){
            signupCPass.style.border="2px solid red";
        }
        if(userName.value==""){
            userName.style.border="2px solid red";
        }
        return false;
    }
};

loginPass.addEventListener("keyup" , ()=>{
    loginPass.style.border="2px solid #cacaca"
});

signupPass.addEventListener("keyup" , ()=>{
    signupPass.style.border="2px solid #cacaca"
});

userName.addEventListener("keyup" , ()=>{
    userName.style.border="2px solid #cacaca"
});



