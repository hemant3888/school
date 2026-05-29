  
    /* ── CLOCK ── */
    function tick() {
      const n = new Date();
     
      document.getElementById('live-date').textContent = n.toLocaleDateString('en-IN', {
        weekday: 'short',
        day: 'numeric',
        month: 'short',
        year: 'numeric'
      });
    }
    tick();
    setInterval(tick, 1000);

  

    /* ── PAGE SWITCH ── */
    // function showPage(p) {
    //   document.getElementById('page-dashboard').style.display = p === 'dashboard' ? 'block' : 'none';
    //   document.getElementById('page-profile').style.display = p === 'profile' ? 'block' : 'none';
    //   document.querySelector('.tbar-title').textContent = p === 'profile' ? 'My Profile' : 'Dashboard';
    // }

    /* ── SIDEBAR TOGGLE ── */
    const sidebar = document.getElementById('sidebar');
    const mainEl = document.getElementById('main');
    const overlay = document.getElementById('overlay');
    const toggleBtn = document.getElementById('toggleBtn');
    let desktopOpen = true;
    const isMob = () => window.innerWidth <= 991;

    toggleBtn.addEventListener('click', () => {
      if (isMob()) {
        sidebar.classList.toggle('mob-open');
        overlay.classList.toggle('show');
      } else {
        desktopOpen = !desktopOpen;
        sidebar.classList.toggle('collapsed');
        mainEl.classList.toggle('expanded');
      }
    });
    overlay.addEventListener('click', () => {
      sidebar.classList.remove('mob-open');
      overlay.classList.remove('show');
    });

    /* ── SIDEBAR NAV ── */
    // document.querySelectorAll('.nav-link').forEach(a => {
    //   a.addEventListener('click', function(e) {
    //     e.preventDefault();
    //     document.querySelectorAll('.nav-link').forEach(x => x.classList.remove('active'));
    //     this.classList.add('active');
    //     const pg = this.dataset.page;
    //     showPage(pg);
    //     // sync bottom nav
    //     document.querySelectorAll('.bn-item').forEach(b => {
    //       b.classList.toggle('active', b.dataset.page === pg && b.onclick === null || false);
    //     });
    //     if (isMob()) {
    //       sidebar.classList.remove('mob-open');
    //       overlay.classList.remove('show');
    //     }
    //   });
    // });

    /* ── BOTTOM NAV ── */
    function bnNav(el, pg) {
      document.querySelectorAll('.bn-item').forEach(b => b.classList.remove('active'));
      el.classList.add('active');
      showPage(pg);
    }

  

    /* ── TOAST ── */
    function showToast(msg, type) {
      const toast = document.getElementById('toast');
      document.getElementById('toast-msg').textContent = msg;
      document.getElementById('toast-icon').className = type === 'err' ? 'bi bi-x-circle-fill' : 'bi bi-check-circle-fill';
      toast.className = 'toast show' + (type === 'err' ? ' err' : '');
      clearTimeout(toast._t);
      toast._t = setTimeout(() => toast.className = 'toast', 3500);
    }

    /* ── RESIZE HANDLER ── */
    window.addEventListener('resize', () => {
      if (!isMob()) {
        sidebar.classList.remove('mob-open');
        overlay.classList.remove('show');
      }
    });
 