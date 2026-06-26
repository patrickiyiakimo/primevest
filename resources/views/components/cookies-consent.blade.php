<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cookie Consent · Pro Modal</title>
  <style>
    /* --- global reset & base --- */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      background: #f2f4f8;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 1rem;
    }

    /* demo card – just to show context */
    .demo-card {
      background: white;
      padding: 2.5rem 2rem;
      border-radius: 2rem;
      box-shadow: 0 20px 40px -12px rgba(0,0,0,0.15);
      max-width: 480px;
      text-align: center;
    }
    .demo-card h1 {
      font-weight: 600;
      font-size: 1.8rem;
      color: #1e1e2f;
      letter-spacing: -0.02em;
    }
    .demo-card p {
      color: #5a5a7a;
      margin: 0.5rem 0 1.5rem;
      line-height: 1.5;
    }
    .demo-card .badge {
      display: inline-block;
      background: #eef2ff;
      color: #4f46e5;
      font-size: 0.7rem;
      font-weight: 600;
      padding: 0.25rem 0.9rem;
      border-radius: 40px;
    }

    /* --- COOKIE MODAL (professional, compact, pop animation) --- */
    #cookies-consent {
      position: fixed;
      inset: 0;
      z-index: 9999;
      display: none;          /* hidden by default, shown via JS */
      align-items: center;
      justify-content: center;
      padding: 1rem;
      /* backdrop + overlay are handled by pseudo + bg */
    }

    /* backdrop – smooth fade */
    .cookies-overlay {
      position: absolute;
      inset: 0;
      background: rgba(0, 0, 0, 0.35);
      backdrop-filter: blur(3px);
      -webkit-backdrop-filter: blur(3px);
      transition: opacity 0.25s ease;
    }

    /* modal card – compact, clean, pop animation */
    .cookies-card {
      position: relative;
      background: #ffffff;
      max-width: 400px;
      width: 100%;
      border-radius: 24px;
      box-shadow: 0 30px 60px -20px rgba(0, 0, 0, 0.4), 0 8px 24px -6px rgba(0,0,0,0.1);
      padding: 1.75rem 1.75rem 1.5rem;
      transition: transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1), opacity 0.3s ease;
      transform: scale(0.92) translateY(12px);
      opacity: 0;
      /* will be toggled via JS class */
    }

    /* open state – pop & fade in */
    .cookies-card.open {
      transform: scale(1) translateY(0);
      opacity: 1;
    }

    /* top accent line – subtle */
    .cookies-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 1.75rem;
      right: 1.75rem;
      height: 3px;
      background: linear-gradient(90deg, #dc2626, #b91c1c);
      border-radius: 0 0 4px 4px;
    }

    /* close button (×) */
    .cookies-close {
      position: absolute;
      top: 1rem;
      right: 1.2rem;
      background: transparent;
      border: none;
      color: #9ca3af;
      font-size: 1.4rem;
      line-height: 1;
      cursor: pointer;
      transition: color 0.15s;
      padding: 0.2rem 0.4rem;
      border-radius: 8px;
    }
    .cookies-close:hover {
      color: #1f2937;
      background: #f3f4f6;
    }

    /* icon */
    .cookies-icon {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 52px;
      height: 52px;
      background: #fef2f2;
      border-radius: 18px;
      margin-bottom: 1rem;
    }
    .cookies-icon svg {
      width: 28px;
      height: 28px;
      color: #dc2626;
    }

    .cookies-title {
      font-size: 1.3rem;
      font-weight: 650;
      color: #0b0b1a;
      letter-spacing: -0.02em;
      margin-bottom: 0.2rem;
    }
    .cookies-sub {
      font-size: 0.8rem;
      color: #6b7280;
      margin-bottom: 1.25rem;
      font-weight: 450;
    }

    .cookies-description {
      background: #f9fafb;
      border-radius: 16px;
      padding: 0.85rem 1rem;
      margin-bottom: 1.25rem;
      font-size: 0.85rem;
      line-height: 1.5;
      color: #374151;
      border: 1px solid #f0f0f0;
    }

    /* preferences list – compact */
    .pref-list {
      display: flex;
      flex-direction: column;
      gap: 0.65rem;
      margin-bottom: 1.5rem;
    }

    .pref-item {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0.3rem 0.1rem;
      border-bottom: 1px solid #f1f3f5;
    }
    .pref-item:last-of-type {
      border-bottom: none;
    }

    .pref-left {
      display: flex;
      align-items: center;
      gap: 0.7rem;
    }
    .pref-left .badge-icon {
      width: 28px;
      height: 28px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #eef2ff;
      color: #4f46e5;
    }
    .pref-left .badge-icon.green {
      background: #e6f7e6;
      color: #15803d;
    }
    .pref-left .badge-icon.blue {
      background: #e0f2fe;
      color: #2563eb;
    }
    .pref-left .badge-icon.purple {
      background: #f3e8ff;
      color: #7c3aed;
    }

    .pref-info {
      display: flex;
      flex-direction: column;
    }
    .pref-info .name {
      font-size: 0.8rem;
      font-weight: 600;
      color: #1e1e2f;
      line-height: 1.2;
    }
    .pref-info .desc {
      font-size: 0.65rem;
      color: #8b8ba3;
      letter-spacing: 0.01em;
    }

    .pref-badge {
      background: #e6f7e6;
      color: #15803d;
      font-size: 0.6rem;
      font-weight: 600;
      padding: 0.15rem 0.7rem;
      border-radius: 40px;
      letter-spacing: 0.02em;
      white-space: nowrap;
    }

    /* toggle switch – refined */
    .toggle {
      position: relative;
      width: 34px;
      height: 20px;
      flex-shrink: 0;
    }
    .toggle input {
      opacity: 0;
      width: 0;
      height: 0;
    }
    .toggle .slider {
      position: absolute;
      cursor: pointer;
      inset: 0;
      background: #d1d5db;
      border-radius: 40px;
      transition: background 0.2s;
    }
    .toggle .slider::before {
      content: '';
      position: absolute;
      height: 14px;
      width: 14px;
      left: 3px;
      bottom: 3px;
      background: white;
      border-radius: 50%;
      transition: transform 0.2s;
      box-shadow: 0 1px 3px rgba(0,0,0,0.15);
    }
    .toggle input:checked + .slider {
      background: #dc2626;
    }
    .toggle input:checked + .slider::before {
      transform: translateX(14px);
    }

    /* buttons */
    .actions {
      display: flex;
      flex-direction: column;
      gap: 0.6rem;
      margin-top: 0.25rem;
    }
    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      font-weight: 600;
      font-size: 0.9rem;
      padding: 0.7rem 1rem;
      border-radius: 14px;
      border: none;
      cursor: pointer;
      transition: all 0.15s;
      width: 100%;
      background: white;
      color: #1f2937;
      border: 1.5px solid #e5e7eb;
    }
    .btn-primary {
      background: #dc2626;
      border: 1.5px solid #dc2626;
      color: white;
      box-shadow: 0 4px 8px -2px rgba(220, 38, 38, 0.25);
    }
    .btn-primary:hover {
      background: #b91c1c;
      border-color: #b91c1c;
      transform: translateY(-1px);
      box-shadow: 0 8px 16px -4px rgba(220, 38, 38, 0.3);
    }
    .btn-secondary {
      background: white;
      border: 1.5px solid #e5e7eb;
    }
    .btn-secondary:hover {
      background: #f9fafb;
      border-color: #d1d5db;
    }

    .footer-link {
      text-align: center;
      margin-top: 1rem;
    }
    .footer-link a {
      font-size: 0.7rem;
      color: #9ca3af;
      text-decoration: none;
      transition: color 0.15s;
      font-weight: 500;
    }
    .footer-link a:hover {
      color: #dc2626;
      text-decoration: underline;
    }

    /* toast */
    #toast-container {
      position: fixed;
      top: 1.5rem;
      right: 1.5rem;
      z-index: 99999;
      display: flex;
      flex-direction: column;
      gap: 0.5rem;
      pointer-events: none;
    }
    .toast {
      background: #1f2937;
      color: white;
      padding: 0.6rem 1.2rem;
      border-radius: 40px;
      font-size: 0.8rem;
      font-weight: 500;
      box-shadow: 0 8px 20px -6px rgba(0,0,0,0.25);
      display: flex;
      align-items: center;
      gap: 0.5rem;
      pointer-events: auto;
      transform: translateX(0);
      opacity: 1;
      transition: all 0.25s ease;
    }
    .toast.success {
      background: #15803d;
    }
    .toast.info {
      background: #2563eb;
    }
    .toast.out {
      opacity: 0;
      transform: translateX(40px);
    }

    /* responsive */
    @media (max-width: 440px) {
      .cookies-card {
        padding: 1.5rem 1.25rem;
      }
      .cookies-title {
        font-size: 1.2rem;
      }
    }
  </style>
</head>
<body>

  <!-- demo page content -->
  <div class="demo-card">
    <span class="badge">🍪 cookie consent</span>
    <h1>Professional modal</h1>
    <p>Compact · Pop animation · Clean design</p>
    <div style="font-size:0.8rem; color:#888; margin-top:0.25rem;">↓ modal will appear after 1s</div>
  </div>

  <!-- ========== COOKIE MODAL ========== -->
  <div id="cookies-consent" role="dialog" aria-modal="true" aria-label="Cookie consent">
    <!-- overlay (backdrop) -->
    <div class="cookies-overlay" id="cookies-backdrop"></div>

    <!-- modal card -->
    <div class="cookies-card" id="cookies-modal">
      <!-- close (×) -->
      <button class="cookies-close" id="decline-cookies" aria-label="Decline cookies and close">
        ✕
      </button>


      <h2 class="cookies-title">Privacy &amp; cookies</h2>
      <p class="cookies-sub">We value your trust</p>

      <div class="cookies-description">
        We use cookies to improve your experience, analyse traffic and personalise content.
      </div>

     

      <!-- actions -->
      <div class="actions">
        <button class="btn btn-primary" id="accept-cookies">Accept all cookies</button>
        <button class="btn btn-secondary" id="decline-cookies">Decline all cookies</button>
      </div>

      <div class="footer-link">
        <a href="/privacy-policy">Read our privacy policy</a>
      </div>
    </div>
  </div>

  <script>
    (function() {
      "use strict";

      // ----- DOM refs -----
      const modalWrap = document.getElementById('cookies-consent');
      const modalCard = document.getElementById('cookies-modal');
      const backdrop = document.getElementById('cookies-backdrop');
      const acceptBtn = document.getElementById('accept-cookies');
      const declineBtn = document.getElementById('decline-cookies');
      const savePrefsBtn = document.getElementById('save-preferences');
      const analyticsCheck = document.getElementById('analytics-cookies');
      const marketingCheck = document.getElementById('marketing-cookies');

      // ----- helpers -----
      function hasConsent() {
        return localStorage.getItem('cookies_consent') === 'accepted';
      }
      function hasDeclined() {
        return localStorage.getItem('cookies_consent') === 'declined';
      }
      function hasPreferences() {
        return localStorage.getItem('cookies_preferences') !== null;
      }

      // show modal with pop animation
      function showModal() {
        if (!modalWrap) return;
        modalWrap.style.display = 'flex';
        // force reflow for animation
        void modalWrap.offsetHeight;
        // add open class to card (pop + fade)
        if (modalCard) {
          modalCard.classList.add('open');
        }
        // backdrop fade is automatic via css
      }

      function hideModal() {
        if (modalCard) {
          modalCard.classList.remove('open');
        }
        // wait for animation then hide
        setTimeout(() => {
          if (modalWrap) {
            modalWrap.style.display = 'none';
          }
        }, 320);
      }

      // toast
      function showToast(message, type = 'info') {
        let container = document.getElementById('toast-container');
        if (!container) {
          container = document.createElement('div');
          container.id = 'toast-container';
          document.body.appendChild(container);
        }
        const toast = document.createElement('div');
        toast.className = `toast ${type === 'success' ? 'success' : 'info'}`;
        toast.innerHTML = `<span>${message}</span>`;
        container.appendChild(toast);
        setTimeout(() => {
          toast.classList.add('out');
          setTimeout(() => toast.remove(), 300);
        }, 2800);
      }

      // ----- cookie functions (mock) -----
      function enableAnalytics() { console.log('[Analytics] enabled'); }
      function disableAnalytics() { console.log('[Analytics] disabled'); }
      function enableMarketing() { console.log('[Marketing] enabled'); }
      function disableMarketing() { console.log('[Marketing] disabled'); }

      function applyPreferences(prefs) {
        const a = prefs?.analytics ?? false;
        const m = prefs?.marketing ?? false;
        if (a) enableAnalytics(); else disableAnalytics();
        if (m) enableMarketing(); else disableMarketing();
      }

      // ----- actions -----
      function acceptAll() {
        localStorage.setItem('cookies_consent', 'accepted');
        const prefs = { analytics: true, marketing: true };
        localStorage.setItem('cookies_preferences', JSON.stringify(prefs));
        // update checkboxes (UI)
        if (analyticsCheck) analyticsCheck.checked = true;
        if (marketingCheck) marketingCheck.checked = true;
        applyPreferences(prefs);
        hideModal();
        showToast('All cookies accepted', 'success');
      }

      function declineAll() {
        localStorage.setItem('cookies_consent', 'declined');
        const prefs = { analytics: false, marketing: false };
        localStorage.setItem('cookies_preferences', JSON.stringify(prefs));
        if (analyticsCheck) analyticsCheck.checked = false;
        if (marketingCheck) marketingCheck.checked = false;
        applyPreferences(prefs);
        hideModal();
        showToast('Non‑essential cookies declined', 'info');
      }

      function savePreferences() {
        const analytics = analyticsCheck?.checked || false;
        const marketing = marketingCheck?.checked || false;
        const prefs = { analytics, marketing };
        localStorage.setItem('cookies_consent', 'preferences');
        localStorage.setItem('cookies_preferences', JSON.stringify(prefs));
        applyPreferences(prefs);
        hideModal();
        showToast('Preferences saved', 'info');
      }

      // load saved preferences into UI
      function loadPrefsIntoUI() {
        const raw = localStorage.getItem('cookies_preferences');
        if (!raw) return;
        try {
          const prefs = JSON.parse(raw);
          if (analyticsCheck) analyticsCheck.checked = prefs.analytics || false;
          if (marketingCheck) marketingCheck.checked = prefs.marketing || false;
        } catch (_) {}
      }

      // ----- init -----
      document.addEventListener('DOMContentLoaded', function() {
        loadPrefsIntoUI();

        // if consent already given or declined or prefs saved → do not show
        if (hasConsent() || hasDeclined() || hasPreferences()) {
          // but we still apply stored preferences
          const raw = localStorage.getItem('cookies_preferences');
          if (raw) {
            try {
              const prefs = JSON.parse(raw);
              applyPreferences(prefs);
            } catch (_) {}
          }
          return; // never show
        }

        // show modal after 1s with pop effect
        setTimeout(() => {
          showModal();
        }, 1000);

        // ----- event listeners -----
        if (acceptBtn) acceptBtn.addEventListener('click', acceptAll);
        if (declineBtn) declineBtn.addEventListener('click', declineAll);
        if (savePrefsBtn) savePrefsBtn.addEventListener('click', savePreferences);
        if (backdrop) backdrop.addEventListener('click', declineAll); // click outside = decline

        // close button (×) also declines
        const closeBtn = document.querySelector('.cookies-close');
        if (closeBtn) closeBtn.addEventListener('click', declineAll);

        // keyboard: escape = decline
        document.addEventListener('keydown', function(e) {
          if (e.key === 'Escape' && modalWrap && modalWrap.style.display === 'flex') {
            declineAll();
          }
        });
      });

    })();
  </script>

</body>
</html>