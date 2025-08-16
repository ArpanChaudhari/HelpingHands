

// FAQ Toggle
function toggleFAQ(clicked) {
  const currentItem = clicked.parentElement;
  const isActive = currentItem.classList.contains("active");

  // Close all
  document.querySelectorAll('.faq-item').forEach(item => {
    item.classList.remove('active');
  });

  // Open clicked one if it was not already active
  if (!isActive) {
    currentItem.classList.add("active");
  }
}

