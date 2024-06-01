const view_orders_button = document.getElementById('view-orders-btn');
const add_category_button = document.getElementById('add-category-btn');
const add_product_button = document.getElementById('add-product-btn');
const view_queries_button = document.getElementById('view-queries-btn');
const manage_category_button = document.getElementById('manage-category-btn');
const manage_product_button = document.getElementById('manage-product-btn');

const view_orders = document.getElementById('view-orders');
const add_category = document.getElementById('add-category');
const add_product = document.getElementById('add-product');
const view_queries = document.getElementById('view-queries');
const manage_category = document.getElementById('manage-category');
const manage_product = document.getElementById('manage-product');

view_orders_button.addEventListener("click", ()=> {
    view_orders_button.style.color = "#fff";
    view_orders_button.style.backgroundColor = "#9155FD";
    add_category_button.style.color = "#9155FD";
    add_category_button.style.backgroundColor = "#fff";
    add_product_button.style.color = "#9155FD";
    add_product_button.style.backgroundColor = "#fff";
    view_queries_button.style.color = "#9155FD";
    view_queries_button.style.backgroundColor = "#fff";
    manage_category_button.style.color = "#9155FD";
    manage_category_button.style.backgroundColor = "#fff";

    view_orders.style.display = "block";
    view_orders.style.pointerEvents = "all";

    add_category.style.display = "none";
    add_category.style.pointerEvents = "none";

    add_product.style.display = "none";
    add_product.style.pointerEvents = "none";

    view_queries.style.display = "none";
    view_queries.style.pointerEvents = "none";

    manage_category.style.display = "none";
    manage_category.style.pointerEvents = "none";

    manage_product.style.display = "none";
    manage_product.style.pointerEvents = "none";
});

add_category_button.addEventListener("click", ()=> {
    view_orders_button.style.color = "#9155FD";
    view_orders_button.style.backgroundColor = "#fff";
    add_category_button.style.color = "#fff";
    add_category_button.style.backgroundColor = "#9155FD";
    add_product_button.style.color = "#9155FD";
    add_product_button.style.backgroundColor = "#fff";
    view_queries_button.style.color = "#9155FD";
    view_queries_button.style.backgroundColor = "#fff";
    manage_category_button.style.color = "#9155FD";
    manage_category_button.style.backgroundColor = "#fff";
    manage_product_button.style.color = "#9155FD";
    manage_product_button.style.backgroundColor = "#fff";

    add_category.style.display = "flex";
    add_category.style.flexDirection = "column";
    // add_category.style.justifyContent = "center";
    add_category.style.alignItems = "center";
    add_category.style.pointerEvents = "all";

    view_orders.style.display = "none";
    view_orders.style.pointerEvents = "none";

    add_product.style.display = "none";
    add_product.style.pointerEvents = "none";

    view_queries.style.display = "none";
    view_queries.style.pointerEvents = "none";
    
    manage_category.style.display = "none";
    manage_category.style.pointerEvents = "none";
    
    manage_product.style.display = "none";
    manage_product.style.pointerEvents = "none";
});

add_product_button.addEventListener("click", ()=> {
    view_orders_button.style.color = "#9155FD";
    view_orders_button.style.backgroundColor = "#fff";
    add_category_button.style.color = "#9155FD";
    add_category_button.style.backgroundColor = "#fff";
    add_product_button.style.color = "#fff";
    add_product_button.style.backgroundColor = "#9155FD";
    view_queries_button.style.color = "#9155FD";
    view_queries_button.style.backgroundColor = "#fff";
    manage_category_button.style.color = "#9155FD";
    manage_category_button.style.backgroundColor = "#fff";
    manage_product_button.style.color = "#9155FD";
    manage_product_button.style.backgroundColor = "#fff";

    add_product.style.display = "block";
    add_product.style.pointerEvents = "all";

    view_orders.style.display = "none";
    view_orders.style.pointerEvents = "none";

    add_category.style.display = "none";
    add_category.style.pointerEvents = "none";

    view_queries.style.display = "none";
    view_queries.style.pointerEvents = "none";

    manage_category.style.display = "none";
    manage_category.style.pointerEvents = "none";

    manage_product.style.display = "none";
    manage_product.style.pointerEvents = "none";
});

view_queries_button.addEventListener("click", ()=> {
    view_orders_button.style.color = "#9155FD";
    view_orders_button.style.backgroundColor = "#fff";
    add_category_button.style.color = "#9155FD";
    add_category_button.style.backgroundColor = "#fff";
    add_product_button.style.color = "#9155FD";
    add_product_button.style.backgroundColor = "#fff";
    view_queries_button.style.color = "#fff";
    view_queries_button.style.backgroundColor = "#9155FD";
    manage_category_button.style.color = "#9155FD";
    manage_category_button.style.backgroundColor = "#fff";
    manage_product_button.style.color = "#9155FD";
    manage_product_button.style.backgroundColor = "#fff";

    view_queries.style.display = "flex";
    view_queries.style.flexDirection = "column";
    view_queries.style.justifyContent = "start";
    view_queries.style.alignItems = "center";
    view_queries.style.gap = "2.5rem";
    view_queries.style.pointerEvents = "all";


    view_orders.style.display = "none";
    view_orders.style.pointerEvents = "none";

    add_category.style.display = "none";
    add_category.style.pointerEvents = "none";

    add_product.style.display = "none";
    add_product.style.pointerEvents = "none";

    manage_category.style.display = "none";
    manage_category.style.pointerEvents = "none";
    
    manage_product.style.display = "none";
    manage_product.style.pointerEvents = "none";
});

manage_category_button.addEventListener("click", ()=>{
    view_orders_button.style.color = "#9155FD";
    view_orders_button.style.backgroundColor = "#fff";
    add_category_button.style.color = "#9155FD";
    add_category_button.style.backgroundColor = "#fff";
    add_product_button.style.color = "#9155FD";
    add_product_button.style.backgroundColor = "#fff";
    view_queries_button.style.color = "#9155FD";
    view_queries_button.style.backgroundColor = "#fff";
    manage_category_button.style.color = "#fff";
    manage_category_button.style.backgroundColor = "#9155FD";
    manage_product_button.style.color = "#9155FD";
    manage_product_button.style.backgroundColor = "#fff";

    manage_category.style.display = "block";
    manage_category.style.pointerEvents = "all";

    view_queries.style.display = "none";
    view_queries.style.pointerEvents = "none";

    view_orders.style.display = "none";
    view_orders.style.pointerEvents = "none";

    add_category.style.display = "none";
    add_category.style.pointerEvents = "none";

    add_product.style.display = "none";
    add_product.style.pointerEvents = "none";
    
    manage_product.style.display = "none";
    manage_product.style.pointerEvents = "none";
});

manage_product_button.addEventListener("click", ()=>{
    view_orders_button.style.color = "#9155FD";
    view_orders_button.style.backgroundColor = "#fff";
    add_category_button.style.color = "#9155FD";
    add_category_button.style.backgroundColor = "#fff";
    add_product_button.style.color = "#9155FD";
    add_product_button.style.backgroundColor = "#fff";
    view_queries_button.style.color = "#9155FD";
    view_queries_button.style.backgroundColor = "#fff";
    manage_category_button.style.color = "#9155FD";
    manage_category_button.style.backgroundColor = "#fff";
    manage_product_button.style.color = "#fff";
    manage_product_button.style.backgroundColor = "#9155FD";

    manage_product.style.display = "block";
    manage_product.style.pointerEvents = "all";

    view_queries.style.display = "none";
    view_queries.style.pointerEvents = "none";

    view_orders.style.display = "none";
    view_orders.style.pointerEvents = "none";

    add_category.style.display = "none";
    add_category.style.pointerEvents = "none";

    add_product.style.display = "none";
    add_product.style.pointerEvents = "none";

    manage_category.style.display = "none";
    manage_category.style.pointerEvents = "none";
});