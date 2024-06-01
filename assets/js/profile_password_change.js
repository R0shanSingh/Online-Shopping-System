let oldPass =  document.getElementById("old-pass-input");
let newPass = document.getElementById("new-password");
let conPass = document.getElementById("reenter-password");

let changeForm = document.getElementById("change_pass_form");

let alertmessage = document.getElementById("alert");

conPass.addEventListener("keyup", ()=>{
conPass.style.border = "2px solid #cacaca";
});

changeForm.onsubmit = () => {
    if(conPass.value!=newPass.value){
        conPass.style.border ="2px solid red";
        conPass.focus();
        return false;
    }
    if(oldPass.value==newPass.value){
        alertmessage.style.display="revert";
        alertmessage.style.color="red";
        return false;
    }
    return true;
}
newPass.addEventListener("keydown", ()=>{
    alertmessage.style.display="none";
})