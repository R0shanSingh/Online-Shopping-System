let price = document.getElementsByClassName('cart-price-for-js');
let quantity = document.getElementsByClassName('product-quantity');
let productPrice = document.getElementsByClassName('cart-product-price');

let totalPrice = document.getElementById('cart-total-price-js');

let grandTotal = document.getElementById('cart-grand-total-price-js');

let taxAmount = document.getElementById('tax');

let grand = 0;


for (i=0 ; i<quantity.length ; i++) {
    grand += Number(productPrice[i].value);
}

totalPrice.innerText = grand.toFixed(2);

let tax = Number(totalPrice.innerText) * 0.05; 

taxAmount.innerText = tax.toFixed(2);

grandTotal.innerText = (Number(totalPrice.innerText) + tax).toFixed(2);

let total = 0;

for (i=0; i <quantity.length ; i++) {
    quantity[i].addEventListener("change", () => {
        total = 0;
        for (i=0 ; i<price.length ; i++) {
            price[i].innerText = (quantity[i].value) * productPrice[i].value;
            total += (quantity[i].value) * productPrice[i].value;
        }
        totalPrice.innerText = total.toFixed(2);
        tax = Number(totalPrice.innerText) * 0.05;
        taxAmount.innerText = tax.toFixed(2);
        grandTotal.innerText = (Number(totalPrice.innerText) + tax).toFixed(2);
    });
}
