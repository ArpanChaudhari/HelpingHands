
// impact animation
document.addEventListener('DOMContentLoaded', () => {
  const counters = document.querySelectorAll('.count');
  let triggered = false;

  const animateCount = () => {
    counters.forEach(counter => {
      const target = +counter.getAttribute('data-target');
      let count = 0;
      const duration = 2000; // All counters finish in 2 seconds
      const steps = 60; // Number of frames (60 fps)
      const increment = target / steps;

      const updateCount = () => {
        count += increment;
        if (count < target) {
          counter.innerText = Math.floor(count).toLocaleString();
          requestAnimationFrame(updateCount);
        } else {
          counter.innerText = target.toLocaleString();
        }
      };

      updateCount();
    });
  };

  const checkScroll = () => {
    const section = document.querySelector('.impact-stats');
    if (!section) return;

    const sectionTop = section.getBoundingClientRect().top;
    if (sectionTop < window.innerHeight - 100 && !triggered) {
      triggered = true;
      animateCount();
    }
  };

  window.addEventListener('scroll', checkScroll);
  checkScroll();
});
