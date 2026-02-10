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

//   navbar end 
// button scroll 1
  const btn = document.getElementById("viewCarsBtn")

  btn.addEventListener("click", function (e) {
    e.preventDefault()

    const target = document.querySelector("#car")
    const targetPosition = target.getBoundingClientRect().top + window.pageYOffset
    const startPosition = window.pageYOffset
    const distance = targetPosition - startPosition
    const duration = 900 // smooth + premium
    let start = null

    function animation(currentTime) {
      if (start === null) start = currentTime
      const timeElapsed = currentTime - start
      const run = easeInOutCubic(timeElapsed, startPosition, distance, duration)
      window.scrollTo(0, run)
      if (timeElapsed < duration) requestAnimationFrame(animation)
    }

    function easeInOutCubic(t, b, c, d) {
      t /= d / 2
      if (t < 1) return (c / 2) * t * t * t + b
      t -= 2
      return (c / 2) * (t * t * t + 2) + b
    }

    requestAnimationFrame(animation)
  })

// button scroll 2

const bookBtn = document.getElementById("bookNowBtn");

bookBtn.addEventListener("click", function(e){
    e.preventDefault(); // default jump disable

    const target = document.querySelector("#bookingSection");
    const targetPosition = target.getBoundingClientRect().top + window.pageYOffset;
    const startPosition = window.pageYOffset;
    const distance = targetPosition - startPosition;
    const duration = 900; // 0.9s smooth scroll
    let start = null;

    function animation(currentTime){
        if(start === null) start = currentTime;
        const timeElapsed = currentTime - start;
        const run = easeInOutCubic(timeElapsed, startPosition, distance, duration);
        window.scrollTo(0, run);
        if(timeElapsed < duration) requestAnimationFrame(animation);
    }

    function easeInOutCubic(t, b, c, d){
        t /= d/2;
        if(t < 1) return c/2*t*t*t + b;
        t -= 2;
        return c/2*(t*t*t + 2) + b;
    }

    requestAnimationFrame(animation);
});


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

// modal 
  const modal = document.getElementById("rentModal");
const modalBox = document.getElementById("modalBox");

function openModal(car) {
  // Populate content
  document.getElementById("carName").innerText = car.name;
  document.getElementById("carPrice").innerText = car.price;
  document.getElementById("carImage").src = car.image;
  document.getElementById("carSeats").innerText = car.seats;
  document.getElementById("carTransmission").innerText = car.transmission;
  document.getElementById("carFuel").innerText = car.fuel;

  // Reset classes
  modalBox.classList.remove("scale-100", "opacity-100");
  modalBox.classList.add("scale-95", "opacity-0");

  // Show modal
  modal.classList.remove("hidden");
  modal.classList.add("flex");

  // Allow small delay for transition
  setTimeout(() => {
    modalBox.classList.remove("scale-95", "opacity-0");
    modalBox.classList.add("scale-100", "opacity-100");
  }, 50); // 50ms is enough
}

function closeModal() {
  // Animate scale down + fade out
  modalBox.classList.remove("scale-100", "opacity-100");
  modalBox.classList.add("scale-95", "opacity-0");

  // Wait for transition then hide modal
  setTimeout(() => {
    modal.classList.add("hidden");
    modal.classList.remove("flex");
  }, 400); // must match CSS duration
}

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
