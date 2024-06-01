
window.addEventListener("scroll", () => {
    let reveals = document.querySelectorAll(".reveal");

    for (let i=0 ; i<reveals.length ; i++) {
        let windowHeight = window.innerHeight;
        let revealTop = reveals[i].getBoundingClientRect().top;
        let revealPoint = 110;

        if (revealTop < windowHeight - revealPoint) {
            reveals[i].classList.add("animation-on-scroll");
        } else {
            reveals[i].classList.remove("animation-on-scroll");
        }
    }
});


