let warning_btn = document.querySelectorAll('.add_to_cart_warning');
        
warning_btn.forEach(function(element) {
    element.addEventListener('click', ()=>{
        warningPopUp();
    });
});

function warningPopUp() {
    let warning = document.querySelector('.warning');
    warning.style.display = "block";

    let modal = document.getElementById('modal');
    let modalOverlay = document.getElementById('modal-close-overlay');
    modal.style.display = "flex";
    modalOverlay.style.display = "block";
    modalOverlay.style.pointerEvents = "all";

    setTimeout(()=>{
        warning.style.display = "none";
    }, 2000);
}