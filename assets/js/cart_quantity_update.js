let forms = document.querySelectorAll('.update-quantity-form');

forms.forEach(function (form) {
    form.addEventListener('submit', function (event) {
        if (!validateForm(form)) {
            event.preventDefault(); // Prevent form submission
        }
    });
});

function validateForm(form) {
    let originalQuantityInput = form.querySelector('[name="product-quantity"]');

    // if (!originalQuantityInput) {
    //     console.error("Could not find product-quantity input in the form.");
    //     return true; // Allow form submission to proceed
    // }

    let originalQuantity = originalQuantityInput.getAttribute('data-original-quantity');
    let currentQuantity = originalQuantityInput.value;

    if (originalQuantity == currentQuantity) {
        alert("No change in quantity. Update not required.");
        return false; // Prevent form submission
    }

    return true; // Allow form submission
}