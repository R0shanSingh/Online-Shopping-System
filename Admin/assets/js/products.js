let showAllBtn = document.getElementById('show-all-product-btn');
let displayProducts = document.getElementsByClassName('show-all-products');

let showAllMssgProduct = document.getElementById('show-all-mssg-product');

for (let i=0; i<10; i++) {
    displayProducts[i].style.display = "revert";
    displayProducts[i].style.pointerEvents = "all";
}

showAllBtn.addEventListener("click", ()=> {
    for (let i=10;i<displayProducts.length;i++) {
        displayProducts[i].style.display = "revert";
        displayProducts[i].style.pointerEvents = "all";
    }

    showAllBtn.style.display = "none";
    showAllBtn.style.pointerEvents = "none";
    showAllMssgProduct.style.display = "revert";
});
