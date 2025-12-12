const categoryGrid = document.querySelector(".category-grid");
  const categoryCards = document.querySelectorAll(".category-card");

  categoryCards.forEach(card => {
    card.addEventListener("mouseenter", () => {
      categoryGrid.classList.add("active");
      card.classList.add("hovered");
    });

    card.addEventListener("mouseleave", () => {
      categoryGrid.classList.remove("active");
      card.classList.remove("hovered");
    });
  });


function showToast(message) {
  const toastContainer = document.getElementById('toast');

  const toast = document.createElement('div');
  toast.classList.add('toast');
  toast.innerHTML = `
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
      stroke-width="1.5" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" 
        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25
        a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 
        2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 
        14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 
        .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 
        .75.75 0 0 1 1.5 0Z" />
    </svg>
    ${message}
  `;
  
  toastContainer.appendChild(toast);

  // Remove after animation ends
  setTimeout(() => {
    toast.remove();
  }, 3000);
}

// Attach to buttons
document.querySelectorAll('.add-btn').forEach(btn => {
  btn.addEventListener('click', () => {
    const dishName = btn.closest('.dish-card').querySelector('h3').innerText;
    showToast(`${dishName} added to cart!`);
  });
});

function showCopyToast(code) {
  const toastContainer = document.getElementById('copy-toast');
  
  const toast = document.createElement('div');
  toast.classList.add('toast-copy');
  toast.innerText = `✅ ${code} copied to clipboard!`;

  toastContainer.appendChild(toast);

  // Remove toast after animation
  setTimeout(() => {
    toast.remove();
  }, 2500);
}

document.querySelectorAll('.offer-card').forEach(card => {
  card.addEventListener('click', () => {
    const codeText = card.querySelector('.offer-code').innerText;
    const code = codeText.replace("Use Code: ", "").trim();
    
    navigator.clipboard.writeText(code).then(() => {
      showCopyToast(code);
    });
  });
});


