<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sign In - TGIIT</title>
	<link rel="icon" href="assets/images/logo1.png" type="image">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet"/>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"/>

  <style>
    :root {
      --primary:       #5b6af4;
      --primary-dark:  #4655e8;
      --primary-light: #eef0ff;
      --text-main:     #2d3558;
      --text-sub:      #6b7280;
      --border:        #d1d5f5;
      --bg:            #f5f6ff;
      --card-bg:       #ffffff;
      --shadow:        0 8px 32px rgba(91, 106, 244, 0.10);
    }

    *, *::before, *::after { box-sizing: border-box; }

    body {
      font-family: 'DM Sans', sans-serif;
      background: var(--bg);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      margin: 0;
      padding: 1rem;
    }

    /* ── Card ── */
    .signin-card {
      background: var(--card-bg);
      border-radius: 20px;
      box-shadow: var(--shadow);
      padding: 2.5rem 2.25rem 2rem;
      width: 100%;
      max-width: 480px;
      animation: fadeUp .5s ease both;
    }

    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(24px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    /* ── Heading ── */
    .signin-card h1 {
      font-size: 1.75rem;
      font-weight: 700;
      color: var(--text-main);
      margin-bottom: .35rem;
      letter-spacing: -.4px;
    }

    .signin-card p.subtitle {
      color: var(--text-sub);
      font-size: .95rem;
      margin-bottom: 2rem;
    }

    /* ── Labels ── */
    label.form-label {
      font-weight: 600;
      font-size: .875rem;
      color: var(--text-main);
      margin-bottom: .45rem;
    }

    /* ── Inputs ── */
    .form-control {
      border: 1.5px solid var(--border);
      border-radius: 10px;
      padding: .72rem 1rem;
      font-size: .95rem;
      color: var(--text-main);
      background: #fafbff;
      transition: border-color .2s, box-shadow .2s;
    }

    .form-control::placeholder { color: #b0b8d8; }

    .form-control:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 3.5px rgba(91,106,244,.14);
      background: #fff;
      outline: none;
    }

    /* ── Password wrapper ── */
    .password-wrapper {
      position: relative;
    }

    .password-wrapper .form-control {
      padding-right: 2.8rem;
    }

    .toggle-pw {
      position: absolute;
      right: .9rem;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      color: var(--primary);
      cursor: pointer;
      padding: 0;
      font-size: 1.1rem;
      line-height: 1;
      transition: color .2s;
    }

    .toggle-pw:hover { color: var(--primary-dark); }

    /* ── Button ── */
    .btn-signin {
      background: var(--primary);
      color: #fff;
      font-weight: 600;
      font-size: 1rem;
      letter-spacing: .01em;
      border: none;
      border-radius: 10px;
      padding: .78rem;
      width: 100%;
      margin-top: .25rem;
      transition: background .2s, transform .15s, box-shadow .2s;
      box-shadow: 0 4px 18px rgba(91,106,244,.28);
    }

    .btn-signin:hover {
      background: var(--primary-dark);
      transform: translateY(-1px);
      box-shadow: 0 6px 22px rgba(91,106,244,.38);
    }

    .btn-signin:active {
      transform: translateY(0);
    }

    /* ── Footer ── */
    footer {
      margin-top: 2.25rem;
      text-align: center;
      width: 100%;
      max-width: 480px;
      animation: fadeUp .6s .1s ease both;
    }

    .footer-links {
      display: flex;
      justify-content: center;
      gap: 2rem;
      flex-wrap: wrap;
      margin-bottom: .8rem;
    }

    .footer-links a {
      color: var(--primary);
      text-decoration: none;
      font-size: .875rem;
      font-weight: 500;
      transition: color .2s;
    }

    .footer-links a:hover { color: var(--primary-dark); text-decoration: underline; }

    .footer-copy {
      color: var(--text-sub);
      font-size: .8rem;
      line-height: 1.55;
    }
  </style>
</head>
<body>

  <!-- ── Sign-In Card ── -->
    <div class="container mt-5">

    <div class="signin-card mx-auto" style="max-width:400px;">

      <h1>Sign-In</h1>

      <p class="subtitle">
        Access the panel using your email and password.
      </p>

      <div id="message"></div>

      <form id="loginForm">

        <div class="mb-3">

          <label class="form-label">Email</label>

          <input
            type="email"
            id="emailInput"
            name="email"
            class="form-control"
            placeholder="Enter your email address">

        </div>

        <div class="mb-4">

          <label class="form-label">Password</label>

          <div class="password-wrapper position-relative">

            <input
              type="password"
              id="passwordInput"
              name="password"
              class="form-control"
              placeholder="Enter your password">

            <button
              class="btn position-absolute top-50 end-0 translate-middle-y"
              type="button"
              id="togglePw">

              <i class="bi bi-eye" id="eyeIcon"></i>

            </button>

          </div>

        </div>

        <button class="btn btn-warning w-100" type="submit" id="loginBtn">
          Sign in
        </button>

      </form>

    </div>

  </div>

  <!-- Bootstrap JS -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
  <script>

    // Password Toggle

    const togglePw = document.getElementById('togglePw');

    const passwordInput = document.getElementById('passwordInput');

    const eyeIcon = document.getElementById('eyeIcon');

    togglePw.addEventListener('click', () => {

      if (passwordInput.type === 'password') {

        passwordInput.type = 'text';

        eyeIcon.classList.remove('bi-eye');

        eyeIcon.classList.add('bi-eye-slash');

      } else {

        passwordInput.type = 'password';

        eyeIcon.classList.remove('bi-eye-slash');

        eyeIcon.classList.add('bi-eye');

      }

    });


    // Login AJAX

    const loginForm = document.getElementById('loginForm');

    loginForm.addEventListener('submit', async function (e) {

      e.preventDefault();

      const email = document.getElementById('emailInput').value.trim();

      const password = document.getElementById('passwordInput').value.trim();

      const message = document.getElementById('message');

      const loginBtn = document.getElementById('loginBtn');

      // Validation

      if (email === '' || password === '') {

        message.innerHTML = `
          <div class="alert alert-danger">
            All fields are required
          </div>
        `;

        return;

      }

      // Loading

      loginBtn.disabled = true;

      loginBtn.innerHTML = 'Please wait...';

      try {

        const response = await fetch('db/login.php', {

          method: 'POST',

          headers: {
            'Content-Type': 'application/json'
          },

          body: JSON.stringify({
            email: email,
            password: password
          })

        });

        const data = await response.json();

        // Success

        if (data.status === 'success') {

          message.innerHTML = `
            <div class="alert alert-success">
              ${data.message}
            </div>
          `;

          setTimeout(() => {

            window.location.href = data.redirect;

          }, 1000);

        } else {

          message.innerHTML = `
            <div class="alert alert-danger">
              ${data.message}
            </div>
          `;

        }

      } catch (error) {

        message.innerHTML = `
          <div class="alert alert-danger">
            Something went wrong
          </div>
        `;

      }

      loginBtn.disabled = false;

      loginBtn.innerHTML = 'Sign in';

    });

  </script>

  <!-- ── Footer ── -->
  <footer>
    <!-- <div class="footer-links">
      <a href="#">GO To Website</a>
      <a href="#">Help Through Chat</a>
      <a href="#">Help Through Call</a>
    </div> -->
    <p class="footer-copy">© 2026 Galaxy Institute of Vocational Education. All Rights Reserved.</p>
  </footer>


  <!-- <script>
    // Toggle password visibility
    const toggleBtn = document.getElementById('togglePw');
    const pwInput   = document.getElementById('passwordInput');
    const eyeIcon   = document.getElementById('eyeIcon');

    toggleBtn.addEventListener('click', () => {
      const isPassword = pwInput.type === 'password';
      pwInput.type = isPassword ? 'text' : 'password';
      eyeIcon.className = isPassword ? 'bi bi-eye-slash' : 'bi bi-eye';
    });
  </script> -->

</body>
</html>