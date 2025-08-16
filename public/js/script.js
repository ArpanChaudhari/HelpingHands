

var swiper = new Swiper(".mySwiper", {
  slidesPerView: 1,
  spaceBetween: 30,
  loop: true,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
    pauseOnMouseEnter: true,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
    overflow: "hidden",
    dynamicBullets: true,

  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    640: { slidesPerView: 1.2 },
    768: { slidesPerView: 2, spaceBetween: 25 },
    1024: { slidesPerView: 3, spaceBetween: 30 }
  }
});





window.onload = () => {
  showTab('donor');
};

function showTab(type) {
  // Hide both sections
  document.getElementById("donor-content").classList.add("hidden");
  document.getElementById("volunteer-content").classList.add("hidden");

  // Show the selected section
  if (type === "donor") {
    document.getElementById("donor-content").classList.remove("hidden");
  } else if (type === "volunteer") {
    document.getElementById("volunteer-content").classList.remove("hidden");
  }

  // Remove 'active' class from all tab buttons
  document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));

  // Add 'active' to the clicked button
  if (type === "donor") {
    document.querySelector('.tab-btn:nth-child(1)').classList.add('active');
  } else if (type === "volunteer") {
    document.querySelector('.tab-btn:nth-child(2)').classList.add('active');
  }
}


document.addEventListener('DOMContentLoaded', () => {
  const counters = document.querySelectorAll('.count');
  let triggered = false;

  const animateCount = () => {
    counters.forEach(counter => {
      const target = +counter.getAttribute('data-target');
      let count = 0;

      // Custom speed based on target
      const duration = 1000; // total animation time (ms)
      const stepTime = Math.max(Math.floor(duration / target), 50); // at least 50ms for small numbers

      const updateCount = () => {
        const increment = Math.ceil(target / (duration / stepTime));
        count += increment;

        if (count < target) {
          counter.innerText = count;
          setTimeout(updateCount, stepTime);
        } else {
          counter.innerText = target;
        }
      };

      updateCount();
    });
  };

  const checkScroll = () => {
    const section = document.querySelector('.impact-section');
    const sectionTop = section.getBoundingClientRect().top;
    if (sectionTop < window.innerHeight - 100 && !triggered) {
      triggered = true;
      animateCount();
    }
  };

  window.addEventListener('scroll', checkScroll);
  checkScroll(); // in case it's already visible
});


// Back to Top Button
const btn = document.getElementById('backToTop');
const fill = document.getElementById('scrollFill');

window.addEventListener('scroll', () => {
  const scrollY = window.scrollY;
  const docHeight = document.documentElement.scrollHeight - window.innerHeight;
  const scrollPercent = (scrollY / docHeight) * 100;

  // Show/hide button
  btn.style.display = scrollY > 300 ? 'flex' : 'none';

  // Update fill height (max 100%)
  fill.style.height = `${Math.min(100, scrollPercent)}%`;
});