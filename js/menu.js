function showAddToast(name) {
  const toast = document.createElement('div');
  toast.textContent = `✅ ${name} added to cart!`;
  toast.style.cssText = `
    position: fixed;
    bottom: 2rem;
    left: 50%;
    transform: translateX(-50%);
    background: #27ae60;
    color: white;
    padding: 1rem 2rem;
    border-radius: 8px;
    font-weight: 500;
    z-index: 9999;
    box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    animation: fadeout 2s forwards ease 2s;
  `;
  document.body.appendChild(toast);
  setTimeout(() => toast.remove(), 4000);
}

// Add to cart functionality
document.querySelectorAll('.add-btn').forEach(btn => {
  btn.addEventListener('click', (e) => {
    const card = e.target.closest('.menu-card');
    const name = card.querySelector('h3').innerText;
    showAddToast(name);
  });
});

// Filter by category
const categoryBtns = document.querySelectorAll('.category-btn');
categoryBtns.forEach(btn => {
  btn.addEventListener('click', () => {
    categoryBtns.forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    const cat = btn.dataset.category;
    document.querySelectorAll('.menu-card').forEach(card => {
      card.style.display = cat === 'all' || card.dataset.category === cat ? 'block' : 'none';
    });
  });
});

// Search functionality
const searchInput = document.getElementById('menu-search');
searchInput.addEventListener('input', () => {
  const val = searchInput.value.toLowerCase();
  document.querySelectorAll('.menu-card').forEach(card => {
    const name = card.querySelector('h3').innerText.toLowerCase();
    card.style.display = name.includes(val) ? 'block' : 'none';
  });
});

// Sort by price
const sortSelect = document.getElementById('menu-sort');
sortSelect.addEventListener('change', () => {
  const grid = document.getElementById('menu-grid');
  const cards = Array.from(grid.children);
  const sortType = sortSelect.value;
  if (sortType === 'low-high') {
    cards.sort((a, b) => a.dataset.price - b.dataset.price);
  } else if (sortType === 'high-low') {
    cards.sort((a, b) => b.dataset.price - a.dataset.price);
  }
  grid.innerHTML = '';
  cards.forEach(card => grid.appendChild(card));
});