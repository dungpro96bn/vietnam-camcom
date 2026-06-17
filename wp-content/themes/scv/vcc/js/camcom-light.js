/* VIETNAM CAMCOM — light landing interactions */
(function () {
  'use strict';
  const reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* navbar scroll */
  const nav = document.querySelector('.nav');
  const onScroll = () => nav.classList.toggle('scrolled', window.scrollY > 20);
  onScroll();
  window.addEventListener('scroll', onScroll, { passive: true });

  /* mobile menu — build a real drawer from existing nav links */
  const mb = document.querySelector('.menu-btn');
  if (mb) {
    const drawer = document.createElement('div');
    drawer.className = 'm-drawer';
    drawer.innerHTML = '<div class="m-scrim"></div><nav class="m-panel" aria-label="Menu di động"></nav>';
    const panel = drawer.querySelector('.m-panel');

    // clone primary links
    const links = document.querySelector('.nav-links');
    if (links) {
      links.querySelectorAll(':scope > a').forEach(a => {
        const c = a.cloneNode(true);
        c.className = a.classList.contains('active') ? 'm-link active' : 'm-link';
        panel.appendChild(c);
      });
      // services dropdown -> group
      const drop = links.querySelector('.nav-drop');
      if (drop) {
        const head = document.createElement('div');
        head.className = 'm-group-title';
        head.textContent = 'Dịch vụ';
        panel.appendChild(head);
        drop.querySelectorAll('.dropdown a').forEach(a => {
          const c = a.cloneNode(true);
          c.className = a.classList.contains('active') ? 'm-sub active' : 'm-sub';
          panel.appendChild(c);
        });
      }
    }
    // CTA
    const cta = document.querySelector('.nav-right .btn');
    if (cta) {
      const c = cta.cloneNode(true);
      c.className = 'btn btn-primary m-cta';
      panel.appendChild(c);
    }
    // language row
    const lang = document.querySelector('.lang');
    if (lang) {
      const row = document.createElement('div');
      row.className = 'm-lang';
      row.appendChild(lang.cloneNode(true));
      panel.appendChild(row);
    }

    document.body.appendChild(drawer);
    const close = () => { drawer.classList.remove('open'); document.body.style.overflow = ''; };
    const open = () => { drawer.classList.add('open'); document.body.style.overflow = 'hidden'; };
    mb.addEventListener('click', open);
    drawer.querySelector('.m-scrim').addEventListener('click', close);
    panel.addEventListener('click', e => { if (e.target.closest('a')) close(); });
    document.addEventListener('keydown', e => { if (e.key === 'Escape') close(); });
    // sync language in drawer
    drawer.querySelectorAll('.lang button').forEach(b => b.addEventListener('click', () => {
      drawer.querySelectorAll('.lang button').forEach(x => x.classList.remove('on'));
      b.classList.add('on');
    }));
  }

  /* language toggle (visual) */
  document.querySelectorAll('.lang button').forEach(b => {
    b.addEventListener('click', () => {
      document.querySelectorAll('.lang button').forEach(x => x.classList.remove('on'));
      b.classList.add('on');
    });
  });

  /* scroll reveal */
  const reveals = document.querySelectorAll('.reveal');
  if (reduce) reveals.forEach(r => r.classList.add('in'));
  else {
    const io = new IntersectionObserver((es) => {
      es.forEach(e => { if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); } });
    }, { threshold: 0.12, rootMargin: '0px 0px -7% 0px' });
    reveals.forEach(r => io.observe(r));
  }

  /* animated counters */
  function fmt(v, dec) { return dec ? v.toFixed(dec) : Math.round(v).toLocaleString('en-US'); }
  function run(el) {
    const target = parseFloat(el.dataset.count);
    const dec = parseInt(el.dataset.dec || '0', 10);
    const pre = el.dataset.prefix || '', suf = el.dataset.suffix || '';
    const dur = 1600, t0 = performance.now();
    (function tick(now) {
      const p = Math.min((now - t0) / dur, 1);
      const e = 1 - Math.pow(1 - p, 3);
      el.innerHTML = pre + fmt(target * e, dec) + suf;
      if (p < 1) requestAnimationFrame(tick);
      else el.innerHTML = pre + fmt(target, dec) + suf;
    })(t0);
  }
  const counters = document.querySelectorAll('[data-count]');
  if (reduce) counters.forEach(el => {
    el.innerHTML = (el.dataset.prefix || '') + fmt(parseFloat(el.dataset.count), parseInt(el.dataset.dec || '0', 10)) + (el.dataset.suffix || '');
  });
  else {
    const cio = new IntersectionObserver((es) => {
      es.forEach(e => { if (e.isIntersecting) { run(e.target); cio.unobserve(e.target); } });
    }, { threshold: 0.6 });
    counters.forEach(el => cio.observe(el));
  }

  /* hero parallax on mouse */
  if (!reduce) {
    const cw = document.querySelector('.circle-wrap');
    const heroSection = document.querySelector('.hero');
    if (cw && heroSection) {
      heroSection.addEventListener('pointermove', (e) => {
        const r = heroSection.getBoundingClientRect();
        const dx = (e.clientX - r.left) / r.width - 0.5;
        const dy = (e.clientY - r.top) / r.height - 0.5;
        cw.style.transform = `translate(${dx * 18}px, ${dy * 18}px)`;
        document.querySelectorAll('.node').forEach((n, i) => {
          const m = (i + 1) * 10;
          n.style.transform = `translate(${dx * m}px, ${dy * m}px)`;
        });
      });
      heroSection.addEventListener('pointerleave', () => {
        cw.style.transform = '';
        document.querySelectorAll('.node').forEach(n => n.style.transform = '');
      });
    }

    /* sparkles around the orbit */
    const cwrap = document.querySelector('.circle-wrap');
    if (cwrap) {
      const N = 5;
      for (let i = 0; i < N; i++) {
        const s = document.createElement('div');
        s.className = 'spark';
        const ang = (i / N) * Math.PI * 2;
        const rad = 38 + Math.random() * 6;
        s.style.left = (50 + Math.cos(ang) * rad) + '%';
        s.style.top = (50 + Math.sin(ang) * rad) + '%';
        s.style.animation = `bob ${4 + Math.random() * 3}s ease-in-out ${Math.random() * 2}s infinite`;
        cwrap.appendChild(s);
      }
    }
  }

  /* sticky section-tabs scrollspy (shared across service/about/company pages) */
  const tabBar = document.querySelector('.svc-tabs');
  if (tabBar) {
    const tabs = [...tabBar.querySelectorAll('a[href^="#"]')];
    const targets = tabs.map(a => {
      const el = document.querySelector(a.getAttribute('href'));
      return el ? (el.classList.contains('anchor') ? (el.parentElement || el) : el) : null;
    });
    const barH = tabBar.getBoundingClientRect().height || 60;
    const spy = () => {
      const line = window.scrollY + barH + 90; // a bit below the sticky bar
      let idx = 0;
      targets.forEach((t, i) => {
        if (!t) return;
        const top = t.getBoundingClientRect().top + window.scrollY;
        if (top <= line) idx = i;
      });
      tabs.forEach((t, i) => t.classList.toggle('active', i === idx));
    };
    spy();
    window.addEventListener('scroll', spy, { passive: true });
    window.addEventListener('resize', spy, { passive: true });
  }
})();

