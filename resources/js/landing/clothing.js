import Toastify from "toastify-js";

let csrfToken = "";

function Main() {
    
    try {
        getAllQuantityNumberFromShoppingCart();
    } catch (error) {
        console.error(error);
    }
    const addToCartButtons = document.querySelectorAll(".addToCartButton");
    csrfToken = document.querySelector('[name="csrf-token"]').content;

    try {
        addToCartButtons.forEach((button) => {
            button.addEventListener("click", onAddCart);
        });
    } catch (error) {
        console.error(error);
    }
    
}
async function onAddCart(event) {
    console.log("entramo");

    const response = await fetch("cart/add-to-cart", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrfToken,
        },
        body: JSON.stringify({ id: `${event.target.getAttribute("data-id")}` }),
    });

    const data = await response.json();

    if (data.success) {
        Toastify({
            text: `${data.message}`,
            duration: 3000,
            // destination: "https://github.com/apvarun/toastify-js",
            close: false,
            gravity: "bottom", // `top` or `bottom`
            position: "right", // `left`, `center` or `right`
            stopOnFocus: false, // Prevents dismissing of toast on hover
            style: {
                padding: "10px 30px",
                zIndex: 1000,
                right: "10px",
                position: "fixed",
                color: "white",
                fontWeight: "800",
                fontSize: "1.2rem",
                borderBottom: "solid #01f523 3px",
                background: "black",
            },
        }).showToast();
        getAllQuantityNumberFromShoppingCart();
    } else {
        Toastify({
            text: `${data.message || "Error"}`,
            duration: 3000,
            // destination: "https://github.com/apvarun/toastify-js",
            close: false,
            gravity: "bottom", // `top` or `bottom`
            position: "right", // `left`, `center` or `right`
            stopOnFocus: false, // Prevents dismissing of toast on hover
            style: {
                padding: "10px 30px",
                zIndex: 1000,
                right: "10px",
                position: "fixed",
                color: "white",
                fontWeight: "800",
                fontSize: "1.5rem",
                borderBottom: "solid red 3px",
                background: "linear-gradient(to right, gray, black)",
            },
        }).showToast();
    }
}

async function getAllQuantityNumberFromShoppingCart(){
    const contadorItemsCarrito = document.querySelector('#ShoppingCartCounter')
    const response = await fetch("cart/get-quantity-cart", {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrfToken,
        },
    });

    const data = await response.json();

    // console.log(data);
    
    contadorItemsCarrito.textContent = data.data
}

addEventListener("DOMContentLoaded", Main);
