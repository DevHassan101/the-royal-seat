// book-ride-script-starts
let currentStep = 1;
let selectedVehicle = null;

/* read booking context injected by the blade view */
function bookingCtx() {
  const el = document.getElementById("booking-context");
  return el ? el.dataset : {};
}

/* ── STEP NAVIGATION ── */
function goStep(n) {
  document
    .querySelectorAll(".step-panel")
    .forEach((p) => p.classList.remove("active"));
  const panel = document.getElementById("panel" + n);
  if (!panel) return;
  panel.classList.add("active");
  currentStep = n;
  updateStepper(n);
  if (n === 2) populateDetailStep();
  if (n === 3) populatePaymentStep();
  window.scrollTo({ top: 0, behavior: "smooth" });
}

/* ── STEPPER UI ── */
function updateStepper(a) {
  for (let i = 1; i <= 3; i++) {
    const sc = document.getElementById("sc" + i),
      sl = document.getElementById("sl" + i);
    if (!sc) continue;
    if (i < a) {
      sc.className = "step-circle done";
      sc.innerHTML = "✓";
    } else if (i === a) {
      sc.className = "step-circle active";
      sc.innerHTML = i;
      if (sl) sl.style.color = "#1a1a1a";
    } else {
      sc.className = "step-circle todo";
      sc.innerHTML = i;
      if (sl) sl.style.color = "#9ca3af";
    }
  }
  const c1 = document.getElementById("conn1");
  const c2 = document.getElementById("conn2");
  if (c1) c1.className = "step-connector " + (a > 1 ? "done" : "todo");
  if (c2) c2.className = "step-connector " + (a > 2 ? "done" : "todo");
}

/* ── VEHICLE SELECT (reads data-* from the card) ── */
function selectVehicleEl(card) {
  if (!card) return;
  document.querySelectorAll(".vehicle-card").forEach((c) => {
    c.classList.remove("selected");
    const b = c.querySelector(".btn-select");
    if (b) {
      b.classList.remove("selected-btn");
      b.textContent = "Select";
    }
  });
  card.classList.add("selected");
  const b = card.querySelector(".btn-select");
  if (b) {
    b.classList.add("selected-btn");
    b.textContent = "Selected ✓";
  }

  const d = card.dataset;
  selectedVehicle = {
    categoryId: d.categoryId,
    vehicleId: d.vehicleId || null,
    category: d.category,
    model: d.model,
    price: parseFloat(d.price) || 0,
    seats: d.seats || "",
    type: d.type || "",
    trans: d.trans || "",
    img: d.img,
  };
}

/* ── POPULATE STEP 2 BANNER ── */
function populateDetailStep() {
  const v = selectedVehicle;
  if (!v) return;
  setSrc("detail-car-img", v.img);
  setText("detail-car-model", v.model);
  setText("detail-car-name", v.category);
  setText("detail-price", "AED " + v.price.toFixed(2));
  badge("detail-type-badge", v.type);
  badge("detail-trans-badge", v.trans);
  const sb = document.getElementById("detail-seats-badge");
  if (sb) {
    if (v.seats) {
      sb.style.display = "";
      sb.innerHTML = `<svg width="11" height="11" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="color:var(--brand)"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>${v.seats} Seats`;
    } else {
      sb.style.display = "none";
    }
  }
}

/* show a badge only when it has a value, otherwise hide it */
function badge(id, value) {
  const el = document.getElementById(id);
  if (!el) return;
  if (value) {
    el.textContent = value;
    el.style.display = "";
  } else {
    el.style.display = "none";
  }
}

/* ── COUNTER (adults min=1, children min=0) ── */
function changeCount(id, dir) {
  const el = document.getElementById(id + "-count");
  let v = parseInt(el.textContent) + dir;
  if (v < (id === "adults" ? 1 : 0)) v = id === "adults" ? 1 : 0;
  el.textContent = v;
  const sb = document.getElementById("sb-pax");
  if (sb)
    sb.textContent =
      parseInt(document.getElementById("adults-count").textContent) +
      parseInt(document.getElementById("children-count").textContent);
}

/* ── POPULATE PAYMENT STEP ── */
function populatePaymentStep() {
  const v = selectedVehicle;
  if (!v) return;
  const adults = parseInt(document.getElementById("adults-count").textContent);
  const children = parseInt(
    document.getElementById("children-count").textContent,
  );
  const tip = parseFloat(document.getElementById("inp-tip").value) || 0;
  const name = document.getElementById("inp-name").value.trim() || "—";
  const email = document.getElementById("inp-email").value.trim();
  const phone = document.getElementById("inp-phone").value.trim();
  // Vehicle banner
  setSrc("pay-car-img", v.img);
  setText("pay-car-label", v.category + " — " + v.model);
  setText("pay-price", "AED " + v.price.toFixed(2));
  badge("pay-seats-badge", v.seats ? v.seats + " Seats" : "");
  badge("pay-type-badge", v.type);
  badge("pay-trans-badge", v.trans);
  // Passenger summary
  setText("pay-name-line", name);
  const parts = [];
  if (email) parts.push(email);
  if (phone) parts.push("+971 " + phone);
  setText("pay-contact-line", parts.join(" · ") || "—");
  setText(
    "pay-adults-badge",
    adults + (adults === 1 ? " Adult" : " Adults"),
  );
  const cb = document.getElementById("pay-children-badge");
  if (children > 0) {
    cb.textContent = children + (children === 1 ? " Child" : " Children");
    cb.style.display = "inline-flex";
  } else cb.style.display = "none";
  // Prices
  const base = v.price;
  setText("pay-base-fare", "AED " + base.toFixed(2));
  const tr = document.getElementById("tip-row");
  if (tip > 0) {
    setText("pay-tip-amount", "AED " + tip.toFixed(2));
    tr.style.display = "flex";
  } else tr.style.display = "none";
  const total = base + tip;
  setText("pay-total", "AED " + total.toFixed(2));
}

/* ── PAYMENT SELECT ── */
let selectedPayMode = "card";
function selectPay(el) {
  document.querySelectorAll(".pay-option").forEach((p) => {
    p.classList.remove("active");
    const d = p.querySelector("div.w-4");
    if (d) d.innerHTML = "";
  });
  el.classList.add("active");
  selectedPayMode = el.dataset.pay || "card";
  const d = el.querySelector("div.w-4");
  if (d)
    d.innerHTML =
      '<div class="w-2 h-2 rounded-full" style="background:var(--brand)"></div>';
}

/* ── SUBMIT BOOKING → creates a Lead ── */
function submitBooking() {
  const v = selectedVehicle;
  if (!v) {
    alert("Please select a vehicle.");
    return goStep(1);
  }
  const name = document.getElementById("inp-name").value.trim();
  const email = document.getElementById("inp-email").value.trim();
  const phone = document.getElementById("inp-phone").value.trim();
  if (!name || !phone) {
    alert("Please enter your name and mobile number.");
    return goStep(2);
  }
  const terms = document.getElementById("agree-terms");
  if (terms && !terms.checked) {
    alert("Please accept the Terms & Conditions to continue.");
    return;
  }

  const ctx = bookingCtx();
  const adults = parseInt(document.getElementById("adults-count").textContent);
  const children = parseInt(
    document.getElementById("children-count").textContent,
  );
  const tip = parseFloat(document.getElementById("inp-tip").value) || 0;
  const total = v.price + tip;

  let pickupTime = null;
  if (ctx.date) {
    pickupTime = ctx.time ? ctx.date + " " + ctx.time : ctx.date + " 00:00";
  }

  const payload = {
    vehicle_category_id: v.categoryId,
    vehicle_id: v.vehicleId,
    name: name,
    email: email,
    phone: phone,
    booking_date: ctx.date || null,
    pickup_time: pickupTime,
    pickup_location_description: ctx.fromName || null,
    dropoff_location_description: ctx.toName || null,
    base_fare: v.price,
    tips_amount: tip,
    total_amount: total,
    payment_mode: selectedPayMode,
  };

  const btn = document.getElementById("confirm-booking-btn");
  if (btn) {
    btn.disabled = true;
    btn.textContent = "PROCESSING…";
  }

  fetch(ctx.leadUrl, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      Accept: "application/json",
      "X-CSRF-TOKEN": ctx.csrf,
      "X-Requested-With": "XMLHttpRequest",
    },
    body: JSON.stringify(payload),
  })
    .then((r) => r.json().then((data) => ({ ok: r.ok, data })))
    .then(({ ok, data }) => {
      if (!ok || !data.success) {
        throw new Error(data.message || "Could not complete the booking.");
      }
      // Fill modal
      setText("modal-booking-id", "#" + (data.booking_id || "RS-0000"));
      setText("modal-vehicle", v.category + " · " + v.model);
      setText(
        "modal-pax",
        adults +
          (adults === 1 ? " Adult" : " Adults") +
          (children > 0
            ? ", " + children + (children === 1 ? " Child" : " Children")
            : ""),
      );
      setText("modal-total", "AED " + total.toFixed(2));
      document.getElementById("successModal").style.display = "flex";
    })
    .catch((err) => {
      alert(err.message || "Something went wrong. Please try again.");
    })
    .finally(() => {
      if (btn) {
        btn.disabled = false;
        btn.textContent = "CONFIRM BOOKING";
      }
    });
}

/* ── small helpers ── */
function setText(id, text) {
  const el = document.getElementById(id);
  if (el) el.textContent = text;
}
function setSrc(id, src) {
  const el = document.getElementById(id);
  if (el && src) el.src = src;
}

/* ── VEHICLE IMAGE SLIDERS (one per category card) ── */
function initSliders() {
  document.querySelectorAll(".slider-wrapper").forEach((wrap) => {
    const slides = wrap.querySelectorAll(".slide");
    const dots = wrap.querySelectorAll(".dot");
    const nameEl = wrap.querySelector(".car-name");
    if (slides.length <= 1) return;

    let idx = 0;
    const show = (n) => {
      idx = (n + slides.length) % slides.length;
      slides.forEach((s, i) => s.classList.toggle("active", i === idx));
      dots.forEach((d, i) => d.classList.toggle("active", i === idx));
      if (nameEl) nameEl.textContent = slides[idx].dataset.name || "";
    };

    dots.forEach((dot, i) =>
      dot.addEventListener("click", (e) => {
        e.stopPropagation();
        show(i);
      }),
    );

    setInterval(() => show(idx + 1), 3000);
  });
}

/* ── INIT ── */
(function () {
  updateStepper(1);
  const first = document.querySelector(".vehicle-card");
  if (first) selectVehicleEl(first);
  initSliders();
})();
// book-ride-script-ends
