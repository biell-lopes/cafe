let cart = [];

function addToCart(product, price) {
    cart.push({ product, price });
    updateCart();
}

function updateCart() {
    const cartItems = document.getElementById("cartItems");
    cartItems.innerHTML = "";
    let total = 0;
    
    cart.forEach(item => {
        const li = document.createElement("li");
        li.textContent = `${item.product} - R$ ${item.price}`;
        cartItems.appendChild(li);
        total += item.price;
    });
    
    const totalLi = document.createElement("li");
    totalLi.textContent = `Total: R$ ${total}`;
    cartItems.appendChild(totalLi);
    
    const cartButton = document.querySelector("header nav ul li a");
    cartButton.textContent = `Carrinho (${cart.length})`;
}

function toggleCart() {
    const cartSection = document.getElementById("carrinho");
    cartSection.style.display = cartSection.style.display === "block" ? "none" : "block";
}

function checkout() {
    alert("Finalizando compra...");
    cart = [];
    updateCart();
    toggleCart();
}

document.getElementById("contactForm").addEventListener("submit", function(event) {
    event.preventDefault();
    alert("Mensagem enviada com sucesso!");
});
