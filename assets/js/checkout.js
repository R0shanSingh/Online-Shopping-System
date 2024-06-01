let checkoutForm = document.getElementById("checkout-main-form");

let checkoutAddress = document.getElementById("checkout-address");
let checkoutPhone = document.getElementById("checkout-phone-no");
let checkoutCity = document.getElementById("checkout-city");
let checkoutZip = document.getElementById("checkout-zipcode");
let checkoutState = document.getElementById("checkout-state");

let phonePattern = /^[0-9]{10}$/;
let zipPattern = /^[0-9]{1,10}$/;

checkoutForm.onsubmit = () =>{
    if (!checkoutPhone.value.match(phonePattern) || checkoutPhone.value==""){
        checkoutPhone.style.border= "2px solid red";
    }
    if (checkoutAddress.value==""){
        checkoutAddress.style.border= "2px solid red";
    }
    if (checkoutCity.value==""){
        checkoutCity.style.border= "2px solid red";
    }
    if (!checkoutZip.value.match(zipPattern) || checkoutZip.value==""){
        checkoutZip.style.border= "2px solid red";
    }
    if (checkoutState.value==""){
        checkoutState.style.border= "2px solid red";
    }

    if(checkoutPhone.value.match(phonePattern) && checkoutZip.value.match(zipPattern) && checkoutCity.value!=""&& checkoutAddress.value!="" && checkoutState.value!=""){
        return true;
    }
    else{
        return false;
    }
}

checkoutPhone.addEventListener("keyup", ()=>{
    checkoutPhone.style.border= "2px solid #cacaca";
})
checkoutAddress.addEventListener("keyup", ()=>{
    checkoutAddress.style.border= "2px solid #cacaca";
})
checkoutZip.addEventListener("keyup", ()=>{
    checkoutZip.style.border= "2px solid #cacaca";
})
checkoutCity.addEventListener("keyup", ()=>{
    checkoutCity.style.border= "2px solid #cacaca";
})
checkoutState.addEventListener("keyup", ()=>{
    checkoutState.style.border= "2px solid #cacaca";
})
