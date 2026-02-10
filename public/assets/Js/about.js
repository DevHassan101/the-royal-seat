 // navbar 
  const navbar = document.getElementById('navbar');
  const menuBtn = document.getElementById('menuBtn');
  const mobileMenu = document.getElementById('mobileMenu');
  const navLinks = document.querySelectorAll('.nav-link');

  // Navbar color change on scroll (BLACK)
  window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
      navbar.classList.add('bg-black', 'shadow-lg');
      navbar.classList.remove('bg-transparent');

      navLinks.forEach(link => {
        link.classList.add('text-white');
        link.classList.remove('text-black');
      });

      menuBtn.classList.add('text-white');
      menuBtn.classList.remove('text-black');
    } else {
      navbar.classList.remove('bg-black', 'shadow-lg');
      navbar.classList.add('bg-transparent');

      navLinks.forEach(link => {
        link.classList.add('text-white');
        link.classList.remove('text-black');
      });

      menuBtn.classList.add('text-white');
      menuBtn.classList.remove('text-black');
    }
  });

  // Mobile menu smooth toggle
  let isOpen = false;

  menuBtn.addEventListener('click', () => {
    isOpen = !isOpen;

    if (isOpen) {
      mobileMenu.classList.remove('max-h-0', 'opacity-0');
      mobileMenu.classList.add('max-h-96', 'opacity-100');
    } else {
      mobileMenu.classList.add('max-h-0', 'opacity-0');
      mobileMenu.classList.remove('max-h-96', 'opacity-100');
    }
  });

  // navbar end 
const cards = document.querySelectorAll('.card-dynamic-border');

cards.forEach(card => {
  const top = card.querySelector('.border-top');
  const bottom = card.querySelector('.border-bottom');
  const left = card.querySelector('.border-left');
  const right = card.querySelector('.border-right');

  card.addEventListener('mousemove', e => {
    const rect = card.getBoundingClientRect();
    const x = e.clientX - rect.left; // mouse X inside card
    const y = e.clientY - rect.top;  // mouse Y inside card

    const w = rect.width;
    const h = rect.height;

    // Smoothly scale borders based on distance to edge
    const topWidth = (1 - y / h) * 100;
    const bottomWidth = (y / h) * 100;
    const leftHeight = (1 - x / w) * 100;
    const rightHeight = (x / w) * 100;

    top.style.width = `${topWidth}%`;
    bottom.style.width = `${bottomWidth}%`;
    left.style.height = `${leftHeight}%`;
    right.style.height = `${rightHeight}%`;
  });

  card.addEventListener('mouseleave', () => {
    top.style.width = '0%';
    bottom.style.width = '0%';
    left.style.height = '0%';
    right.style.height = '0%';
  });
});

//  counting 
  const counters = document.querySelectorAll('.counter');
  const statsSection = document.getElementById('stats');
  let hasAnimated = false; // ek hi dafa chale

  const startCounters = () => {
    counters.forEach(counter => {
      const target = +counter.dataset.target;
      let count = 0;
      const speed = 200;

      const updateCounter = () => {
        const increment = Math.ceil(target / speed);

        if (count < target) {
          count += increment;
          counter.innerText = count > target ? target : count;
          requestAnimationFrame(updateCounter);
        } else {
          counter.innerText = target;
        }
      };

      updateCounter();
    });
  };

  const observer = new IntersectionObserver(
    entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting && !hasAnimated) {
          hasAnimated = true;
          startCounters();
          observer.disconnect(); // dobara na chale
        }
      });
    },
    {
      threshold: 0.5 // 🔥 50% visible = aadhi screen
    }
  );

  observer.observe(statsSection);

    // Booking Car 
 
      const carType = document.getElementById('carType');
      const pickupDate = document.getElementById('pickupDate');
      const returnDate = document.getElementById('returnDate');
      const totalPrice = document.getElementById('totalPrice');
      const form = document.getElementById('bookingForm');

      function calculatePrice() {
        if (!pickupDate.value || !returnDate.value) return;

        const start = new Date(pickupDate.value);
        const end = new Date(returnDate.value);
        const days = Math.max((end - start) / (1000 * 60 * 60 * 24), 1);

        const pricePerDay = parseInt(carType.value);
        totalPrice.innerText = `$${days * pricePerDay}`;
      }

      pickupDate.addEventListener('change', calculatePrice);
      returnDate.addEventListener('change', calculatePrice);
      carType.addEventListener('change', calculatePrice);

      form.addEventListener('submit', e => {
        e.preventDefault();
        alert('Booking confirmed! Our team will contact you shortly.');
        form.reset();
        totalPrice.innerText = '$0';
      });
 
