// book-ride-script-starts
let currentStep = 1;
let selectedVehicle = {
  model: "Chevrolet Malibu",
  price: "AED 113.14",
  name: "Comfort",
  seats: "4",
  type: "Sedan",
  trans: "Automatic",
  img: "https://images.unsplash.com/photo-1555215695-3004980ad54e?auto=format&fit=crop&w=300&q=80",
};

/* ── STEP NAVIGATION ── */
function goStep(n) {
  document
    .querySelectorAll(".step-panel")
    .forEach((p) => p.classList.remove("active"));
  document.getElementById("panel" + n).classList.add("active");
  currentStep = n;
  updateStepper(n);
  if (n === 3) populatePaymentStep();
  window.scrollTo({ top: 0, behavior: "smooth" });
}

/* ── STEPPER UI ── */
function updateStepper(a) {
  for (let i = 1; i <= 3; i++) {
    const sc = document.getElementById("sc" + i),
      sl = document.getElementById("sl" + i);
    if (i < a) {
      sc.className = "step-circle done";
      sc.innerHTML = "✓";
    } else if (i === a) {
      sc.className = "step-circle active";
      sc.innerHTML = i;
      sl.style.color = "#1a1a1a";
    } else {
      sc.className = "step-circle todo";
      sc.innerHTML = i;
      sl.style.color = "#9ca3af";
    }
  }
  document.getElementById("conn1").className =
    "step-connector " + (a > 1 ? "done" : "todo");
  document.getElementById("conn2").className =
    "step-connector " + (a > 2 ? "done" : "todo");
}

/* ── VEHICLE SELECT ── */
function selectVehicle(card, model, price, name, seats, type, trans, img) {
  document.querySelectorAll(".vehicle-card").forEach((c) => {
    c.classList.remove("selected");
    const b = c.querySelector(".btn-select");
    if (b) {
      b.classList.remove("selected-btn");
      b.textContent = "Select";
      b.onclick = null;
    }
  });
  card.classList.add("selected");
  const b = card.querySelector(".btn-select");
  if (b) {
    b.classList.add("selected-btn");
    b.textContent = "Selected ✓";
    b.onclick = (e) => {
      e.stopPropagation();
      goStep(2);
    };
  }
  selectedVehicle = { model, price, name, seats, type, trans, img };
  document.getElementById("detail-car-img").src = img;
  document.getElementById("detail-car-model").textContent = model;
  document.getElementById("detail-car-name").textContent = name;
  document.getElementById("detail-price").textContent = price;
  document.getElementById("detail-type-badge").textContent = type;
  document.getElementById("detail-trans-badge").textContent = trans;
  document.getElementById("detail-seats-badge").innerHTML =
    `<svg width="11" height="11" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="color:var(--brand)"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>${seats} Seats`;
  setTimeout(() => goStep(2), 200);
}

/* ── COUNTER (adults min=1, children min=0) ── */
function changeCount(id, dir) {
  const el = document.getElementById(id + "-count");
  let v = parseInt(el.textContent) + dir;
  if (v < (id === "adults" ? 1 : 0)) v = id === "adults" ? 1 : 0;
  el.textContent = v;
  document.getElementById("sb-pax").textContent =
    parseInt(document.getElementById("adults-count").textContent) +
    parseInt(document.getElementById("children-count").textContent);
}

/* ── POPULATE PAYMENT STEP ── */
function populatePaymentStep() {
  const v = selectedVehicle;
  const adults = parseInt(document.getElementById("adults-count").textContent);
  const children = parseInt(
    document.getElementById("children-count").textContent,
  );
  const tip = parseFloat(document.getElementById("inp-tip").value) || 0;
  const name = document.getElementById("inp-name").value.trim() || "—";
  const email = document.getElementById("inp-email").value.trim();
  const phone = document.getElementById("inp-phone").value.trim();
  // Vehicle banner
  document.getElementById("pay-car-img").src = v.img;
  document.getElementById("pay-car-label").textContent =
    v.name + " — " + v.model;
  document.getElementById("pay-price").textContent = v.price;
  document.getElementById("pay-seats-badge").textContent = v.seats + " Seats";
  document.getElementById("pay-type-badge").textContent = v.type;
  document.getElementById("pay-trans-badge").textContent = v.trans;
  // Passenger summary
  document.getElementById("pay-name-line").textContent = name;
  const parts = [];
  if (email) parts.push(email);
  if (phone) parts.push("+971 " + phone);
  document.getElementById("pay-contact-line").textContent =
    parts.join(" · ") || "—";
  document.getElementById("pay-adults-badge").textContent =
    adults + (adults === 1 ? " Adult" : " Adults");
  const cb = document.getElementById("pay-children-badge");
  if (children > 0) {
    cb.textContent = children + (children === 1 ? " Child" : " Children");
    cb.style.display = "inline-flex";
  } else cb.style.display = "none";
  // Prices
  const base = parseFloat(v.price.replace("AED ", "")) || 0;
  document.getElementById("pay-base-fare").textContent =
    "AED " + base.toFixed(2);
  const tr = document.getElementById("tip-row");
  if (tip > 0) {
    document.getElementById("pay-tip-amount").textContent =
      "AED " + tip.toFixed(2);
    tr.style.display = "flex";
  } else tr.style.display = "none";
  const total = base + tip;
  document.getElementById("pay-total").textContent = "AED " + total.toFixed(2);
  // Modal
  document.getElementById("modal-vehicle").textContent =
    v.name + " · " + v.model;
  document.getElementById("modal-pax").textContent =
    adults +
    (adults === 1 ? " Adult" : " Adults") +
    (children > 0
      ? ", " + children + (children === 1 ? " Child" : " Children")
      : "");
  document.getElementById("modal-total").textContent =
    "AED " + total.toFixed(2);
}

/* ── PAYMENT SELECT ── */
function selectPay(el) {
  document.querySelectorAll(".pay-option").forEach((p) => {
    p.classList.remove("active");
    const d = p.querySelector("div.w-4");
    if (d) d.innerHTML = "";
  });
  el.classList.add("active");
  const d = el.querySelector("div.w-4");
  if (d)
    d.innerHTML =
      '<div class="w-2 h-2 rounded-full" style="background:var(--brand)"></div>';
}

/* ── CONFIRM ── */
function showConfirm() {
  document.getElementById("successModal").style.display = "flex";
}

updateStepper(1);
// book-ride-script-ends

// car-categories-slider-starts
const cars = ["Chevrolet Malibu", "BMW 3 Series", "Audi A4", "Porsche 911"];
let current = 0;
const slides = document.querySelectorAll(".slide");
const dots = document.querySelectorAll(".dot");
const carName = document.getElementById("carName");

function goTo(index) {
  slides[current].classList.remove("active");
  dots[current].classList.remove("active");
  current = index;
  slides[current].classList.add("active");
  dots[current].classList.add("active");
  carName.textContent = cars[current];
}

setInterval(() => goTo((current + 1) % cars.length), 2500);
// car-categories-slider-ends
