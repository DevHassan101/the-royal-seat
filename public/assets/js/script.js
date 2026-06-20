/* mobile nav */
document
  .getElementById("menu-btn")
  .addEventListener("click", () =>
    document.getElementById("nav-list").classList.toggle("active"),
  );
document
  .querySelectorAll("#nav-list a")
  .forEach((a) =>
    a.addEventListener("click", () =>
      document.getElementById("nav-list").classList.remove("active"),
    ),
  );

/* booking tabs */
function switchTab(btn, tabId) {
  document
    .querySelectorAll(".bk-tab")
    .forEach((t) => t.classList.remove("active"));
  document
    .querySelectorAll(".bk-body")
    .forEach((b) => (b.style.display = "none"));
  btn.classList.add("active");
  document.getElementById("tab-" + tabId).style.display = "block";
}

/* set default date & time for all tabs */
(function () {
  const now = new Date();
  const yyyy = now.getFullYear();
  const mm = String(now.getMonth() + 1).padStart(2, "0");
  const dd = String(now.getDate()).padStart(2, "0");
  const dateVal = `${yyyy}-${mm}-${dd}`;
  const hh = String(now.getHours()).padStart(2, "0");
  const min = String(now.getMinutes()).padStart(2, "0");
  const timeVal = `${hh}:${min}`;
  ["r-date", "h-date", "t-date"].forEach((id) => {
    const el = document.getElementById(id);
    if (el) el.value = dateVal;
  });
  ["r-time", "h-time", "t-time"].forEach((id) => {
    const el = document.getElementById(id);
    if (el) el.value = timeVal;
  });
})();

/* typing fade on form inputs */
document.querySelectorAll(".bk-input").forEach((inp) => {
  inp.addEventListener("input", () => {
    inp.classList.remove("typing");
    void inp.offsetWidth;
    inp.classList.add("typing");
  });
});

/* cycle heading words — typewriter effect */
(function () {
  const words = ["CITY TOUR", "RIDES", "HOURLY"];
  const el = document.getElementById("cycleWord");
  if (!el) return;
  let wi = 0,
    charIndex = 0,
    deleting = false;

  function tick() {
    const word = words[wi];
    if (deleting) {
      charIndex--;
      el.textContent = word.slice(0, charIndex);
    } else {
      charIndex++;
      el.textContent = word.slice(0, charIndex);
    }

    let delay = deleting ? 70 : 110;
    if (!deleting && charIndex === word.length) {
      delay = 1800;
      deleting = true;
    } else if (deleting && charIndex === 0) {
      deleting = false;
      wi = (wi + 1) % words.length;
      delay = 350;
    }

    setTimeout(tick, delay);
  }
  tick();
})();

// md-developer-script-starts
const buttons = document.querySelectorAll(".thumb-btn");
const sections = document.querySelectorAll(".fleet-show");

buttons.forEach((button) => {
  button.addEventListener("click", () => {
    buttons.forEach((btn) => {
      btn.classList.remove("active");
    });

    button.classList.add("active");

    const target = button.dataset.target;

    sections.forEach((section) => {
      section.classList.remove("active");
    });

    document.getElementById(target).classList.add("active");
  });
});
// md-developer-script-ends

// hassan-yosuf-developer-script-starts
(function () {
  const track = document.getElementById("destinationSlider");
  const nextBtn = document.querySelector(".next-btn");
  const prevBtn = document.querySelector(".prev-btn");

  // Original cards collect karo, phir prepend + append clones for infinite loop
  const originals = Array.from(track.querySelectorAll(".destination-card"));
  const N = originals.length;

  // Pehle prepend (reversed insert takey order sahi rahe)
  originals.slice().reverse().forEach(c =>
    track.insertBefore(c.cloneNode(true), track.firstChild)
  );
  // Phir append
  originals.forEach(c => track.appendChild(c.cloneNode(true)));

  // idx = N matlab pehla original card (prepended clones ke baad)
  let idx = N;
  let busy = false;

  function cardW() {
    return track.querySelectorAll(".destination-card")[0].offsetWidth + 25;
  }

  function moveTo(pos, animate) {
    track.style.transition = animate ? "transform 0.5s ease" : "none";
    track.style.transform = `translateX(-${pos * cardW()}px)`;
    idx = pos;
  }

  // Page load pe bina animation ke sahi position pe jao
  moveTo(N, false);

  track.addEventListener("transitionend", () => {
    busy = false;
    // Agar appended clone zone mein pahunch gaye, silently original pe wapas
    if (idx >= 2 * N) moveTo(idx - N, false);
    // Agar prepended clone zone mein pahunch gaye, silently original pe wapas
    else if (idx < N) moveTo(idx + N, false);
  });

  function goNext() {
    if (busy) return;
    busy = true;
    moveTo(idx + 1, true);
  }

  function goPrev() {
    if (busy) return;
    busy = true;
    moveTo(idx - 1, true);
  }

  nextBtn.addEventListener("click", goNext);
  prevBtn.addEventListener("click", goPrev);

  // Auto-play: manual click pe timer reset karo
  let timer = setInterval(goNext, 4000);
  [nextBtn, prevBtn].forEach(btn =>
    btn.addEventListener("click", () => {
      clearInterval(timer);
      timer = setInterval(goNext, 4000);
    })
  );

  window.addEventListener("resize", () => moveTo(idx, false));
})();
// hassan-yosuf-developer-script-ends

// review-section-script-starts
(function () {
  const rTrack = document.getElementById("reviewSlider");
  const rNextBtn = document.querySelector(".rev-next-btn");
  const rPrevBtn = document.querySelector(".rev-prev-btn");
  const rWrapper = document.querySelector(".review-wrapper");

  // rev-card-outer clone karo (includes avatar + card together)
  const rOriginals = Array.from(rTrack.querySelectorAll(".rev-card-outer"));
  const rN = rOriginals.length;

  rOriginals.slice().reverse().forEach(c =>
    rTrack.insertBefore(c.cloneNode(true), rTrack.firstChild)
  );
  rOriginals.forEach(c => rTrack.appendChild(c.cloneNode(true)));

  let rIdx = rN;
  let rBusy = false;

  // desktop = 4 cards, mobile = 1 card
  function rSetWidths() {
    const count = window.innerWidth <= 768 ? 1 : 4;
    const w = (rWrapper.offsetWidth - (count - 1) * 25) / count;
    rTrack.querySelectorAll(".rev-card-outer").forEach(c => {
      c.style.width = w + "px";
    });
  }

  function rCardW() {
    return rTrack.querySelectorAll(".rev-card-outer")[0].offsetWidth + 25;
  }

  function rMoveTo(pos, animate) {
    rTrack.style.transition = animate ? "transform 0.5s ease" : "none";
    rTrack.style.transform = `translateX(-${pos * rCardW()}px)`;
    rIdx = pos;
  }

  rSetWidths();
  rMoveTo(rN, false);

  rTrack.addEventListener("transitionend", () => {
    rBusy = false;
    if (rIdx >= 2 * rN) rMoveTo(rIdx - rN, false);
    else if (rIdx < rN) rMoveTo(rIdx + rN, false);
  });

  function rGoNext() {
    if (rBusy) return;
    rBusy = true;
    rMoveTo(rIdx + 1, true);
  }

  function rGoPrev() {
    if (rBusy) return;
    rBusy = true;
    rMoveTo(rIdx - 1, true);
  }

  rNextBtn.addEventListener("click", rGoNext);
  rPrevBtn.addEventListener("click", rGoPrev);

  let rTimer = setInterval(rGoNext, 4500);
  [rNextBtn, rPrevBtn].forEach(btn =>
    btn.addEventListener("click", () => {
      clearInterval(rTimer);
      rTimer = setInterval(rGoNext, 4500);
    })
  );

  window.addEventListener("resize", () => {
    rSetWidths();
    rMoveTo(rIdx, false);
  });
})();
// review-section-script-ends
