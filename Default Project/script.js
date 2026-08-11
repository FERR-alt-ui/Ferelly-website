/* ===== PARTICLE BACKGROUND (Grid + Stars monokrom) ===== */
const canvas = document.getElementById('bg');
if (canvas) {
  const ctx = canvas.getContext('2d');
  let W, H;

  function resize() {
    W = canvas.width = window.innerWidth;
    H = canvas.height = window.innerHeight;
  }
  resize();
  window.addEventListener('resize', resize);

  const stars = [];
  const COLORS = ['#ffffff', '#d0d0d8', '#9a9aa3'];

  for (let i = 0; i < 90; i++) {
    stars.push({
      x: Math.random() * window.innerWidth,
      y: Math.random() * window.innerHeight,
      r: Math.random() * 1.6 + 0.3,
      c: COLORS[Math.floor(Math.random() * COLORS.length)],
      tw: Math.random() * Math.PI * 2
    });
  }

  let frame = 0;

  function drawGrid() {
    ctx.strokeStyle = 'rgba(255,255,255,0.06)';
    ctx.lineWidth = 1;
    const gap = 46;
    ctx.beginPath();
    for (let x = 0; x < W; x += gap) {
      ctx.moveTo(x, 0);
      ctx.lineTo(x, H);
    }
    for (let y = 0; y < H; y += gap) {
      ctx.moveTo(0, y);
      ctx.lineTo(W, y);
    }
    ctx.stroke();
  }

  function drawStars() {
    for (const s of stars) {
      s.tw += 0.05;
      const alpha = 0.4 + Math.abs(Math.sin(s.tw)) * 0.6;
      ctx.globalAlpha = alpha;
      ctx.fillStyle = s.c;
      ctx.beginPath();
      ctx.arc(s.x, s.y, s.r, 0, Math.PI * 2);
      ctx.fill();
    }
    ctx.globalAlpha = 1;
  }

  function drawScanline() {
    const y = (frame % H);
    ctx.fillStyle = 'rgba(255,255,255,0.03)';
    ctx.fillRect(0, y, W, 3);
  }

  function animate() {
    frame++;
    ctx.clearRect(0, 0, W, H);
    drawGrid();
    drawStars();
    drawScanline();
    requestAnimationFrame(animate);
  }
  animate();
}

/* ===== TYPING EFFECT (hanya di index.html) ===== */
const typedEl = document.getElementById('typed');
if (typedEl) {
  const phrases = [
    'Full-Stack Developer',
    'Game Enthusiast',
    'UI/UX Designer',
    'Code & Style Lover',
    'Problem Solver'
  ];
  let pi = 0, ci = 0, deleting = false;

  function type() {
    const current = phrases[pi];
    typedEl.textContent = current.slice(0, ci);
    let delay = deleting ? 40 : 90;
    if (!deleting && ci === current.length) {
      delay = 1600;
      deleting = true;
    } else if (deleting && ci === 0) {
      deleting = false;
      pi = (pi + 1) % phrases.length;
      delay = 400;
    }
    ci += deleting ? -1 : 1;
    setTimeout(type, delay);
  }
  type();
}

/* ===== HUD BARS (HP berkurang saat scroll, XP bertambah) ===== */
const hpBar = document.getElementById('hpBar');
const xpBar = document.getElementById('xpBar');
if (hpBar && xpBar) {
  let hp = 100, xp = 0;

  function updateBars() {
    if (hp < 30) {
      hpBar.style.background = 'linear-gradient(90deg,#8f8f99,#35353d)';
      hpBar.style.boxShadow = 'none';
    } else {
      hpBar.style.background = '';
      hpBar.style.boxShadow = '';
    }
    hpBar.style.width = hp + '%';
    xpBar.style.width = xp + '%';
  }
  updateBars();

  window.addEventListener('scroll', () => {
    const max = document.documentElement.scrollHeight - window.innerHeight;
    const p = max > 0 ? window.scrollY / max : 0;
    hp = Math.max(15, Math.round(100 - p * 85));
    xp = Math.min(100, Math.round(p * 100));
    updateBars();
  });
}

/* ===== JAM & TANGGAL WIB (Asia/Jakarta) ===== */
const clockEl = document.getElementById('routeClock');
const dateEl = document.getElementById('routeDate');
if (clockEl || dateEl) {
  const fmtTime = new Intl.DateTimeFormat('id-ID', {
    timeZone: 'Asia/Jakarta',
    hour: '2-digit', minute: '2-digit', second: '2-digit',
    hour12: false
  });
  const fmtDate = new Intl.DateTimeFormat('id-ID', {
    timeZone: 'Asia/Jakarta',
    weekday: 'long', day: 'numeric', month: 'long', year: 'numeric'
  });
  function tick() {
    const now = new Date();
    if (clockEl) clockEl.textContent = fmtTime.format(now) + ' WIB';
    if (dateEl) dateEl.textContent = fmtDate.format(now);
  }
  tick();
  setInterval(tick, 1000);
}

/* ===== SCROLL REVEAL (dengan pengaman: konten selalu tampil) ===== */
const revealEls = document.querySelectorAll('.section, .about-card, .project-card, .skill');

function forceRevealAll() {
  revealEls.forEach((el) => el.classList.add('reveal', 'visible'));
}

if ('IntersectionObserver' in window) {
  revealEls.forEach((el) => el.classList.add('reveal'));
  const io = new IntersectionObserver((entries) => {
    entries.forEach((e) => {
      if (e.isIntersecting) {
        e.target.classList.add('visible');
        io.unobserve(e.target);
      }
    });
  }, { threshold: 0.12 });
  revealEls.forEach((el) => io.observe(el));
  setTimeout(forceRevealAll, 3000);
} else {
  forceRevealAll();
}

/* ===== FORM (hanya di contact.html) ===== */
const contactForm = document.getElementById('contactForm');
if (contactForm) {
  contactForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const btn = e.target.querySelector('button');
    const original = btn.textContent;
    btn.textContent = '✓ MESSAGE SENT!';
    btn.style.background = '#fff';
    btn.style.color = '#000';
    setTimeout(() => {
      btn.textContent = original;
      btn.style.background = '';
      btn.style.color = '';
      e.target.reset();
    }, 2500);
  });
}
