let forms = document.querySelectorAll('.update-category-form');

forms.forEach(function (form) {
    form.addEventListener('submit', function (event) {
        if (!validateCategoryForm(form)) {
            event.preventDefault(); // Prevent form submission
        }
    });
});

function validateCategoryForm(form) {
    let originalInput = form.querySelector('[name="category_name"]');

    if (!originalInput) {
        console.error("Could not find category_name input in the form.");
        return true; // Allow form submission to proceed
    }

    let originalCategoryName = originalInput.getAttribute('data-original-category-name');
    let currentCategoryName = originalInput.value;

    if (originalCategoryName == currentCategoryName) {
        alert("No change in Category. Update not required.");
        return false; // Prevent form submission
    }

    return true; // Allow form submission
}