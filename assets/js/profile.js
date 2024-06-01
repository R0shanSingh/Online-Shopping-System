const changePasswordButton = document.getElementById('change-password');
const userDetailsDiv = document.getElementById('user-details');
const changePasswordDiv = document.getElementById('change-password-container');
const goBackButton = document.getElementById('go-back-to-profile');

changePasswordButton.addEventListener("click", ()=> {
    userDetailsDiv.style.display = "none";
    userDetailsDiv.style.pointerEvents = "none";

    changePasswordDiv.style.display = "block";
    changePasswordDiv.style.pointerEvents = "all";
});

goBackButton.addEventListener("click", ()=>{
    changePasswordDiv.style.display = "none";
    changePasswordDiv.style.pointerEvents = "none";

    userDetailsDiv.style.display = "block";
    userDetailsDiv.style.pointerEvents = "all";
});

let oldPasswordInput = document.getElementById('old-pass-input');
let NewPasswordInput = document.getElementById('new-password');
let ConfirmPasswordInput = document.getElementById('reenter-password');

let oldPassEyeIcon = document.getElementById('old-pass-eye-icon');
let NewPassEyeIcon = document.getElementById('new-pass-eye-icon');
let ConfirmPassEyeIcon = document.getElementById('confirm-pass-eye-icon');

function togglePasswordEyeIcon(password, EyeIcon) {
    if (password.type == "password") {
        password.type = "text";
        EyeIcon.classList.replace("fa-eye-slash", "fa-eye");
    } else {
        password.type = "password";
        EyeIcon.classList.replace("fa-eye", "fa-eye-slash");
    }
}

oldPassEyeIcon.addEventListener("click", () => {
    togglePasswordEyeIcon(oldPasswordInput, oldPassEyeIcon);
});

NewPassEyeIcon.addEventListener("click", () => {
    togglePasswordEyeIcon(NewPasswordInput, NewPassEyeIcon);
});

ConfirmPassEyeIcon.addEventListener("click", () => {
    togglePasswordEyeIcon(ConfirmPasswordInput, ConfirmPassEyeIcon);
});

// Profile Empty Input

let originalProfileName = document.getElementById('profile_user_name');
let originalNumberInput = document.getElementById('profile_user_phone_no');
let originalCityInput = document.getElementById('profile_user_city');
let originalZipInput = document.getElementById('profile_user_zipcode');
let originalStateInput = document.getElementById('profile_user_state');

let profileName=false;
let cnumber=false;
let ccity=false;
let cstate=false;
let czip=false;

originalProfileName.addEventListener("change",()=>{
    profileName=true;
});

originalNumberInput.addEventListener("change",()=>{
    cnumber=true;
});

originalCityInput.addEventListener("change",()=>{
    ccity=true;
});

originalStateInput.addEventListener("change",()=>{
    cstate=true;
});

originalZipInput.addEventListener("change",()=>{
    czip=true;
});

let forms = document.getElementById('update-profile-form');

forms.onsubmit = () => {
    if(!profileName && !cnumber && !ccity && !cstate && !czip){
        alert("No change in any field Update not required");
        return false;
    }
    return true;
}