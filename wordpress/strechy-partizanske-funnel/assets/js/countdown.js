/**
 * Strechy Partizánske — 24h denný cyklus + osobná zľava (3 módy)
 * Pracovný deň + meno  → osobná zľava ("Pre Petra")
 * Pracovný deň no name → univerzálna + CTA "pridaj meno"
 * Víkend                → univerzálna víkendová
 *
 * Meno uložené v localStorage.sp_visitor_name (zdieľané across all theme pages).
 */
(function () {
  'use strict';

  var DISC_MAX = 25;
  var DISC_MIN = 5;
  var DAY_SEC  = 86400;
  var NAME_KEY = 'sp_visitor_name';

  var pillEl  = document.getElementById('pillContent');
  var cdEl    = document.getElementById('countdown');
  var pinEl   = document.getElementById('pinPct');
  var pinMeta = document.querySelector('.pin-meta small');

  if (!pillEl && !cdEl && !pinEl) return; // prebar nie je na tejto stránke

  function getName() {
    try {
      var n = (localStorage.getItem(NAME_KEY) || '').trim();
      return n;
    } catch (e) { return ''; }
  }

  function setName(n) {
    try {
      if (n && n.trim()) localStorage.setItem(NAME_KEY, n.trim());
      else localStorage.removeItem(NAME_KEY);
    } catch (e) {}
  }

  function escHtml(s) {
    return String(s).replace(/[&<>"']/g, function (c) {
      return ({ '&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;' })[c];
    });
  }

  function pad2(n) { return String(n).padStart(2, '0'); }

  function tick() {
    var now = new Date();
    var h = now.getHours(), m = now.getMinutes(), s = now.getSeconds();
    var nowSec = h * 3600 + m * 60 + s;
    var p = nowSec / DAY_SEC;
    var dow = now.getDay();
    var isWeekend = dow === 0 || dow === 6;
    var name = getName();
    var time = pad2(h) + ':' + pad2(m);

    if (pillEl) {
      if (isWeekend) {
        pillEl.innerHTML = '🎉 <b>VÍKENDOVÁ AKCIA</b> · pre všetkých · 🕐 ' + time;
      } else if (name) {
        pillEl.innerHTML = '👤 Akcia pre <b>' + escHtml(name) + '</b> · 🕐 ' + time + ' · <a href="#" id="namebtn" class="name-edit">zmeniť meno</a>';
      } else {
        pillEl.innerHTML = '🕐 ' + time + ' · Akcia DNES · <a href="#" id="namebtn" class="name-cta">👋 pridaj meno pre osobnú zľavu</a>';
      }
    }

    if (pinMeta) {
      pinMeta.textContent = isWeekend
        ? 'Víkendová zľava'
        : (name ? 'Pre ' + name.split(' ')[0] : 'Tvoja zľava');
    }

    var pinPos = Math.max(0.06, Math.min(0.94, p));
    document.documentElement.style.setProperty('--p', p.toFixed(4));
    document.documentElement.style.setProperty('--pin', pinPos.toFixed(4));

    var discount = DISC_MAX - p * (DISC_MAX - DISC_MIN);
    if (pinEl) pinEl.textContent = '−' + discount.toFixed(0) + ' %';

    if (cdEl) {
      var rem = DAY_SEC - nowSec;
      cdEl.textContent = pad2(Math.floor(rem / 3600)) + ':' + pad2(Math.floor(rem / 60) % 60) + ':' + pad2(rem % 60);
    }
  }

  document.addEventListener('click', function (e) {
    if (e.target && e.target.id === 'namebtn') {
      e.preventDefault();
      var cur = getName();
      var n = prompt(cur ? 'Zmeniť meno (prázdne = vymazať):' : 'Ako sa voláš? (pre osobnú zľavu)', cur);
      if (n !== null) { setName(n); tick(); }
    }
  });

  tick();
  setInterval(tick, 1000);
})();
