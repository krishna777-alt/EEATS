document.querySelectorAll('.increase').forEach(btn => {
  btn.addEventListener('click', () => {
    const quantitySpan = btn.previousElementSibling;
    let count = parseInt(quantitySpan.innerText);
    quantitySpan.innerText = count + 1;
  });
});
document.querySelectorAll('.decrease').forEach(btn => {
  btn.addEventListener('click', () => {
    const quantitySpan = btn.nextElementSibling;
    let count = parseInt(quantitySpan.innerText);
    if (count > 1) quantitySpan.innerText = count - 1;
  });
});
document.querySelectorAll('.remove-btn').forEach(btn => {
  btn.addEventListener('click', () => {
    btn.closest('.cart-item').remove();
  });
});