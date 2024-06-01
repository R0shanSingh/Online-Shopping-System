// Mobile Side bars

let body = document.getElementById('body');

let header = document.getElementById('header');

let hamburger = document.getElementById('hamburger');

let menu = document.getElementById('mobile-navigation');

hamburger.addEventListener("click", () => {
    if (hamburger.classList.contains("fa-bars")) {
        menu.style.right = "0";
        hamburger.classList.replace("fa-bars", "fa-xmark");
        header.style.height = "46px";
        body.scroll = "no";
        body.style.overflow = "hidden";
    } else {
        menu.style.right = "-100%";
        hamburger.classList.replace("fa-xmark", "fa-bars");
        header.style.height = "auto";
        body.scroll = "yes";
        body.style.overflow = "visible";
    }
});

// Mobile Search Bar

let mobileSearchBar = document.getElementById('search-container-2');

let searchButton = document.getElementById('mobile-search');

searchButton.addEventListener("click", () => {
    if (searchButton.classList.contains("fa-magnifying-glass")) {
        mobileSearchBar.style.left = "0";
        hamburger.style.display = "none";
        searchButton.classList.replace("fa-magnifying-glass", "fa-xmark");
        header.style.height = "46px";
        body.scroll = "no";
        body.style.overflow = "hidden";
        menu.style.right = "-100%";
    } else {
        mobileSearchBar.style.left = "-100%";
        hamburger.style.display = "inline";
        searchButton.classList.replace("fa-xmark", "fa-magnifying-glass");
        header.style.height = "auto";
        body.scroll = "yes";
        body.style.overflow = "visible";
        hamburger.classList.replace("fa-xmark", "fa-bars");
    }
});