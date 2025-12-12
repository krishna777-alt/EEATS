
const qtyCount = document.getElementById('qty-count');
const decreaseBtn = document.getElementById('decrease');
const increaseBtn = document.getElementById('increase');
const addToCartBtn = document.querySelector('.add-to-cart');
const cartMessage = document.getElementById('cart-message');

let qty = 1;

decreaseBtn.addEventListener('click', () => {
  if (qty > 1) {
    qty--;
    qtyCount.textContent = qty;
  }
});

increaseBtn.addEventListener('click', () => {
  qty++;
  qtyCount.textContent = qty;
});

addToCartBtn.addEventListener('click', () => {
  cartMessage.textContent = `✔️ Added ${qty} item${qty > 1 ? 's' : ''} to cart successfully!`;
  cartMessage.style.display = 'block';
  setTimeout(() => {
    cartMessage.style.display = 'none';
  }, 3000);
});
