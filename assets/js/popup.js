const popupOverlay = document.querySelector('.popup-close-overlay');
const popupModal = document.querySelector('.confirm-popup');

const confirmPasswordButton = document.querySelector('#delete-account-btn');

const closePopupModal = document.getElementById('close-popup-modal');

confirmPasswordButton.addEventListener("click", ()=>{
    popupOverlay.style.display = "block";
    popupOverlay.style.pointerEvents = "all";
    popupModal.style.display = "flex";
    popupModal.style.pointerEvents = "all";
});

closePopupModal.addEventListener("click", ()=> {
    popupOverlay.style.display = "none";
    popupOverlay.style.pointerEvents = "none";
    popupModal.style.display = "none";
    popupModal.style.pointerEvents = "none";
});

popupOverlay.addEventListener("click", ()=> {
    popupOverlay.style.display = "none";
    popupOverlay.style.pointerEvents = "none";
    popupModal.style.display = "none";
    popupModal.style.pointerEvents = "none";
});