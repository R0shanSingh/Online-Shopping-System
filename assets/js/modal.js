// Modal and OverLay

let modal = document.getElementById('modal');
let openModal = document.getElementById('openModal');
let closeModal = document.getElementById('closeModal');
let modalOverlay = document.getElementById('modal-close-overlay');

openModal.addEventListener("click", () => {
    modal.style.display = "flex";
    modalOverlay.style.display = "block";
    modalOverlay.style.pointerEvents = "all";
});

closeModal.addEventListener("click", () => {
    modal.style.display = "none";
    modalOverlay.style.display = "none";
    modalOverlay.style.pointerEvents = "none";
});

modalOverlay.addEventListener("click", () => {
    modalOverlay.style.display = "none";
    modalOverlay.style.pointerEvents = "none";
    modal.style.display = "none";
});

// Mobile Screen Login Signup Modal

let mobileModal = document.getElementById('mobile-login-signup-btn');

mobileModal.addEventListener("click", () => {
    modal.style.display = "flex";
    // modalImage.style.display = "none";
    menu.style.right = "-100%";
    hamburger.classList.replace("fa-xmark", "fa-bars");
    header.style.height = "auto";
    body.scroll = "yes";
    body.style.overflow = "visible";
    modalOverlay.style.display = "block";
    modalOverlay.style.pointerEvents = "all";
});