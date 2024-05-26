document.addEventListener("DOMContentLoaded", function () {
  // Add to Cart
  document.querySelectorAll(".add-to-cart").forEach((button) => {
    button.addEventListener("click", function () {
      const productId = this.dataset.productId;
      addToCart(productId);
    });
  });

  // Update Quantity
  document.querySelectorAll(".cart-item-quantity input").forEach((input) => {
    input.addEventListener("change", function () {
      const productId = this.dataset.productId;
      const quantity = parseInt(this.value, 10);
      updateCartQuantity(productId, quantity);
    });
  });

  // Remove from Cart
  document.querySelectorAll(".remove-from-cart").forEach((button) => {
    button.addEventListener("click", function () {
      const productId = this.dataset.productId;
      removeFromCart(productId);
    });
  });
});

// Functions to manage cart operations
function addToCart(productId) {
  // Add to cart logic
  console.log(`Adding product ${productId} to cart.`);
  // Assuming you have an API endpoint to handle adding to cart
  fetch(`/cart/add/${productId}`, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      "X-CSRF-TOKEN": document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
    },
  })
    .then((response) => response.json())
    .then((data) => {
      console.log("Product added to cart:", data);
      updateCartUI(data);
    })
    .catch((error) => {
      console.error("Error adding to cart:", error);
    });
}

function updateCartQuantity(productId, quantity) {
  // Update cart quantity logic
  console.log(`Updating product ${productId} quantity to ${quantity}.`);
  // Assuming you have an API endpoint to handle updating cart quantity
  fetch(`/cart/update/${productId}`, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      "X-CSRF-TOKEN": document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
    },
    body: JSON.stringify({ quantity: quantity }),
  })
    .then((response) => response.json())
    .then((data) => {
      console.log("Cart quantity updated:", data);
      updateCartUI(data);
    })
    .catch((error) => {
      console.error("Error updating cart quantity:", error);
    });
}

function removeFromCart(productId) {
  // Remove from cart logic
  console.log(`Removing product ${productId} from cart.`);
  // Assuming you have an API endpoint to handle removing from cart
  fetch(`/cart/remove/${productId}`, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      "X-CSRF-TOKEN": document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
    },
  })
    .then((response) => response.json())
    .then((data) => {
      console.log("Product removed from cart:", data);
      updateCartUI(data);
    })
    .catch((error) => {
      console.error("Error removing from cart:", error);
    });
}

function updateCartUI(data) {
  // Logic to update the cart UI based on the response data
  console.log("Updating cart UI with data:", data);
  // Example: Update the cart item count and total price
  document.querySelector(".cart-item-count").textContent = data.itemCount;
  document.querySelector(
    ".cart-total-price"
  ).textContent = `$${data.totalPrice.toFixed(2)}`;

  // Additional logic to update the cart item list, quantities, etc.
  // You may need to re-render the cart items or adjust the UI dynamically
}
