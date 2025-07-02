let cart = [];
let total = 0;

function addToCart(name, price) {
    cart.push({ name, price });
    total += price;
    updateCart();
}

function updateCart() {
    const cartList = document.getElementById('cart-list');
    const totalEl = document.getElementById('total');
    cartList.innerHTML = '';
    cart.forEach(item => {
        const li = document.createElement('li');
        li.textContent = `${item.name} - $${item.price.toFixed(2)}`;
        cartList.appendChild(li);
    });
    totalEl.textContent = total.toFixed(2);
}

function submitOrder() {
    if (cart.length === 0) {
        alert("Cart is empty!");
        return false;
    }

    document.getElementById('orderData').value = JSON.stringify({
        items: cart,
        total: total
    });
    return true;
}
