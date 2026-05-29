<?php include 'header.php'; ?>


  <style>
    :root {
      --orange:      #f97316;
      --orange-dark: #ea6c0a;
      --orange-deep: #c2520a;
      --orange-pale: #ffedd5;
      --orange-light:#fff7ed;
      --text:        #1c1917;
      --text-sub:    #78716c;
      --bg:          #fafaf9;
      --white:       #ffffff;
      --border:      #e7e5e4;
    }


    body {
      font-family: 'Nunito', sans-serif;
      background: var(--bg);
      color: var(--text);
      overflow-x: hidden;
    }

  

    /* ══════════════════════════════════
       SECTION 1 — HERO / ABOUT US
    ══════════════════════════════════ */
    .about-hero {
      background: linear-gradient(135deg, #fff7ed 0%, #fff 55%, #ffedd5 100%);
      padding: 5rem 0 0;
      position: relative;
      overflow: hidden;
    }
    .about-hero::before {
      content: '';
      position: absolute;
      width: 560px; height: 560px; border-radius: 50%;
      background: radial-gradient(circle, rgba(249,115,22,.11) 0%, transparent 70%);
      top: -160px; right: -140px; pointer-events: none;
    }

    .about-badge {
      display: inline-block;
      background: var(--orange-pale);
      color: var(--orange-deep);
      font-size: 1.75rem; font-weight: 800;
      letter-spacing: 2px; text-transform: uppercase;
      padding: .35rem 1rem; border-radius: 50px;
      margin-bottom: 1.1rem;
      animation: fadeUp .5s ease both;
    }

    .about-hero h1 {
      font-family: 'Lora', serif;
      font-size: clamp(3rem, 4.5vw, 4rem);
      font-weight: 600;
      color: var(--text);
      line-height: 1.25;
      margin-bottom: 1.25rem;
      animation: fadeUp .55s .05s ease both;
    }
    .about-hero h1 span { color: var(--orange); font-style: italic; }

    .about-hero p {
      color: var(--text-sub);
      font-size: 1.25rem;
      line-height: 1.8;
      margin-bottom: 1rem;
      animation: fadeUp .6s .1s ease both;
    }

    .about-img-wrap {
      position: relative;
      animation: fadeUp .65s .15s ease both;
    }
    .about-img-wrap img {
      width: 100%;
      border-radius: 24px 24px 0 0;
      object-fit: fill;
      height: 420px;
      box-shadow: 0 20px 60px rgba(249,115,22,.18);
    }
    .about-img-badge {
      position: absolute;
      bottom: 20px; left: 20px;
      background: var(--orange);
      color: #fff;
      padding: .65rem 1.2rem;
      border-radius: 12px;
      font-weight: 800;
      font-size: 1.5rem;
      box-shadow: 0 6px 20px rgba(249,115,22,.4);
    }
    .about-img-badge span { font-size: 1.5rem; display: block; font-weight: 900; }

    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(20px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    /* ══════════════════════════════════
       SECTION 2 — MISSION
    ══════════════════════════════════ */
    .mission-section {
      padding: 5rem 0;
      background: var(--white);
    }

    .section-eyebrow {
      font-size: 3.0rem; font-weight: 800;
      letter-spacing: 2.5px; text-transform: uppercase;
      color: var(--orange); margin-bottom: .55rem;
    }
    .section-heading {
      font-family: 'Lora', serif;
      font-size: clamp(1.6rem, 3.5vw, 2.3rem);
      font-weight: 600;
      color: var(--text);
      margin-bottom: 1.1rem;
      line-height: 1.3;
    }
    .section-heading span { color: var(--orange); font-style: italic; }

    .mission-text {
      color: var(--text-sub);
      font-size: 1.25rem;
      line-height: 1.85;
    }

    .mission-img {
      width: 100%;
      height: 430px;
      object-fit: cover;
      border-radius: 20px;
      box-shadow: 0 16px 48px rgba(249,115,22,.14);
    }

    /* orange accent line */
    .accent-line {
      width: 56px; height: 4px;
      background: var(--orange);
      border-radius: 2px;
      margin-top: 5px;
      margin-bottom: 1.25rem;
    }

    /* ══════════════════════════════════
       SECTION 3 — CORE VALUES
    ══════════════════════════════════ */
    .values-section {
      padding: 5rem 0;
      background: linear-gradient(135deg, #fff7ed 0%, #fafaf9 100%);
    }

    .value-card {
      background: var(--white);
      border: 1.5px solid var(--border);
      border-radius: 20px;
      padding: 2.25rem 1.75rem;
      height: 100%;
      margin-bottom: 5px;
      transition: transform .25s, box-shadow .25s, border-color .25s;
    }
    .value-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 16px 42px rgba(249,115,22,.13);
      border-color: var(--orange);
    }
    .value-icon {
      width: 64px; height: 64px;
      border-radius: 16px;
      background: var(--orange-pale);
      display: flex; align-items: center; justify-content: center;
      font-size: 2.8rem; color: var(--orange);
      margin-bottom: 1.1rem;
      transition: background .25s;
    }
    .value-card:hover .value-icon { background: var(--orange); color: #fff; }
    .value-card h5 { font-weight: 800; font-size: 1.5rem; color: var(--text); margin-bottom: .6rem; }
    .value-card p  { font-size: 1.5rem; color: var(--text-sub); line-height: 1.7; }

    /* ══════════════════════════════════
       SECTION 4 — CHILD-CENTERED
    ══════════════════════════════════ */
    .approach-section {
      padding: 5rem 0;
      background: var(--white);
    }
    .approach-box {
      background: linear-gradient(135deg, var(--orange) 0%, var(--orange-dark) 100%);
      border-radius: 24px;
      padding: 3rem 3.5rem;
      color: #fff;
      position: relative;
      overflow: hidden;
    }
    .approach-box::before {
      content: '"';
      position: absolute;
      font-size: 14rem;
      font-family: 'Lora', serif;
      color: rgba(255,255,255,.1);
      top: -3rem; left: 1.5rem;
      line-height: 1;
      pointer-events: none;
    }
    .approach-box h3 {
      font-family: 'Lora', serif;
      font-size: clamp(1.3rem, 2.5vw, 2.8rem);
      font-weight: 600;
      margin-bottom: 1.1rem;
    }
    .approach-box p {
      font-size: 1.40rem;
      line-height: 1.85;
      opacity: .92;
    }
    .approach-icon {
      width: 56px; height: 56px;
      border-radius: 14px;
      background: rgba(255,255,255,.2);
      display: flex; align-items: center; justify-content: center;
      font-size: 2.6rem; color: #fff;
      margin-bottom: 1.5rem;
    }

    /* ══════════════════════════════════
       SECTION 5 — REGISTRATIONS
    ══════════════════════════════════ */
    .reg-section {
      padding: 5rem 0;
      background: var(--bg);
    }

    .reg-card {
      background: var(--white);
      border: 1.5px solid var(--border);
      border-radius: 20px;
      overflow: hidden;
      height: 100%;
      transition: transform .25s, box-shadow .25s, border-color .25s;
    }
    .reg-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 14px 40px rgba(249,115,22,.13);
      border-color: var(--orange);
    }
    .reg-card img {
      width: 100%;
      height: 210px;
      object-fit: cover;
    }
    .reg-card-body {
      padding: 1.6rem 1.5rem 1.75rem;
    }
    .reg-number-badge {
      display: inline-block;
      background: var(--orange-pale);
      color: var(--orange-deep);
      font-size: 1.75rem; font-weight: 800;
      letter-spacing: .5px;
      padding: .28rem .9rem; border-radius: 50px;
      margin-bottom: .85rem;
    }
    .reg-card-body h5 {
      font-weight: 800; font-size: 1.25rem;
      color: var(--text); margin-bottom: .65rem;
      line-height: 1.5;
    }
    .reg-card-body p {
      font-size: 1.5rem; color: var(--text-sub); line-height: 1.7;
    }
    .reg-card-body .reg-id {
      display: inline-flex; align-items: center; gap: .4rem;
      background: var(--orange);
      color: #fff;
      font-size: 1.3rem; font-weight: 700;
      padding: .3rem .85rem; border-radius: 50px;
      margin-top: .9rem;
    }

    /* ══════════════════════════════════
       SECTION 6 — CERTIFIED BY
    ══════════════════════════════════ */
    .certified-section {
      padding: 5rem 0;
      background: var(--white);
    }

    .cert-list {
      list-style: none;
      padding: 0; margin: 0;
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 1rem;
    }
    .cert-list li {
      display: flex;
      align-items: flex-start;
      gap: 1rem;
      background: var(--bg);
      border: 1.5px solid var(--border);
      border-radius: 14px;
      padding: 1.1rem 1.25rem;
      transition: border-color .2s, box-shadow .2s, transform .2s;
    }
    .cert-list li:hover {
      border-color: var(--orange);
      box-shadow: 0 8px 24px rgba(249,115,22,.1);
      transform: translateY(-3px);
    }
    .cert-icon {
      width: 42px; height: 42px; flex-shrink: 0;
      border-radius: 10px;
      background: var(--orange-pale);
      display: flex; align-items: center; justify-content: center;
      font-size: 1.2rem; color: var(--orange);
    }
    .cert-text {
      font-size: 1.9rem; font-weight: 700; color: var(--text); line-height: 1.4;
    }
    .cert-text small { display: block; font-weight: 600; color: var(--text-sub); font-size: 1.25rem; margin-top: .2rem; }

    /* ISO badge card */
    .iso-card {
      background: linear-gradient(135deg, var(--orange), var(--orange-dark));
      border-radius: 20px;
      padding: 2.5rem 2rem;
      color: #fff;
      text-align: center;
      height: 100%;
    }
    .iso-card .iso-big { font-size: 3rem; font-weight: 900; letter-spacing: -2px; margin-bottom: .3rem; }
    .iso-card p { opacity: .88; font-size: 1.5rem; line-height: 1.7; margin-top: .75rem; }
    .iso-card .reg-id-white {
      display: inline-block;
      background: rgba(255,255,255,.2);
      color: #fff;
      font-size: 1.75rem; font-weight: 700;
      padding: .3rem 1rem; border-radius: 50px;
      margin-top: .85rem;
    }

    /* ── FOOTER ── */
    footer {
      background: #111;
      color: rgba(255,255,255,.5);
      text-align: center;
      padding: 1.25rem;
      font-size: 1.25rem;
    }

    /* DIVIDER */
    .orange-divider {
      height: 4px;
      background: linear-gradient(90deg, var(--orange), transparent);
      border: none;
      margin: 0;
    }
    .msnn{
      display:flex;
      align-items:center;
      gap:.75rem;
      padding:1rem;
      background:var(--orange-light);
      border-radius:12px;
      margin-bottom: 5px;
    }
    @media (min-width:300px) and (max-width: 500px) {
      .mission-img {
     
      height: 212px;
     
    }
    .about-img-wrap img {
   
    height: 221px;
   
}
    }
  </style>




  <!-- ════════════════════════════════════════════
       SECTION 1 — ABOUT US
  ════════════════════════════════════════════ -->
  <section class="about-hero">
    <div class="container">
      <div class="row align-items-end g-5">

        <!-- Text -->
        <div class="col-lg-6 pb-5">
          <div class="about-badge">🏛️ Who We Are</div>
          <h1>About <span>The Galaxy Institute</span> of Information Technology</h1>
          <p>
            The Galaxy Institute of Information Technology (TGIIT) is a <strong>non-profit and charitable trust</strong>. It is a voluntary organization working for the development of literacy and creating awareness among the masses about Science &amp; Technology and striving for their up-liftment in all spheres of life through it.
          </p>
          <p>
            The promoters are in the field of education. The idea of TGIIT is to promote education all over India. TGIIT intends to provide consultancy support to all States in India in the area of educational planning &amp; administration for opening, diversifying and developing existing or new institutions for managing the third millennium.
          </p>
          <p>
            TGIIT is committed to help the country in diagnosing educational and societal needs and requirements in order to define the level of learning to meet the need of its population — helping them establish appropriate targets and derive suitable strategies for implementing policies &amp; programs to meet institution building needs.
          </p>
        </div>

        <!-- Image -->
        <div class="col-lg-6">
          <div class="about-img-wrap">
            <img
              src="assets/images/about.jpeg"
              alt="Education at TGIIT"
            />
            <div class="about-img-badge">
              <span>Est. 2021</span>
              Trusted Institute
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  <hr class="orange-divider"/>

  <!-- ════════════════════════════════════════════
       SECTION 2 — MISSION STATEMENT
  ════════════════════════════════════════════ -->
  <section class="mission-section">
    <div class="container">
      <div class="row align-items-center g-5">

        <!-- Image -->
        <div class="col-lg-5">
          <img
            src="assets/images/our-vision.jpg"
            alt="Mission – TGIIT"
            class="mission-img"
          />
        </div>

        <!-- Text -->
        <div class="col-lg-7">
          <div class="accent-line"></div>
          <p class="section-eyebrow">Our Purpose</p>
          <h2 class="section-heading">Mission <span>Statement</span></h2>
          <p class="mission-text">
            Our mission at The Galaxy Institute of Information Technology is to <strong>develop the unique abilities and potential of each child</strong> by offering an enriched educational program. We strive for excellence through a hands-on approach.
          </p>
          <p class="mission-text mt-3">
            Rich traditions rooted in our innovative curriculum grow <strong>productive, caring, and intellectually curious citizens</strong> who are ready to take on the challenges of tomorrow with confidence and competence.
          </p>

          <!-- Mission highlights -->
          <div class="row g-3 mt-2">
            <div class="col-sm-6">
              <div class=" msnn" >
                <div style="width:40px;height:40px;border-radius:10px;background:var(--orange-pale);display:flex;align-items:center;justify-content:center;color:var(--orange);font: size 1.5em;flex-shrink:0;">
                  <i class="bi bi-lightbulb"></i>
                </div>
                <div style="font-size:1.25rem;font-weight:700;color:var(--text);">Hands-on Learning Approach</div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="msnn " >
                <div style="width:40px;height:40px;border-radius:10px;background:var(--orange-pale);display:flex;align-items:center;justify-content:center;color:var(--orange);font-size:1.5rem;flex-shrink:0;">
                  <i class="bi bi-people"></i>
                </div>
                <div style="font-size:1.25rem;font-weight:700;color:var(--text);">Enriched Educational Programs</div>
              </div>
            </div>
            <div class="col-sm-6 ">
              <div class=" msnn" >
                <div style="width:40px;height:40px;border-radius:10px;background:var(--orange-pale);display:flex;align-items:center;justify-content:center;color:var(--orange);font-size:1.5rem;flex-shrink:0;">
                  <i class="bi bi-star"></i>
                </div>
                <div style="font-size:1.25rem;font-weight:700;color:var(--text);">Excellence in Every Field</div>
              </div>
            </div>
            <div class="col-sm-6 mb-3">
              <div class="msnn" >
                <div style="width:40px;height:40px;border-radius:10px;background:var(--orange-pale);display:flex;align-items:center;justify-content:center;color:var(--orange);font-size:1.5rem;flex-shrink:0;">
                  <i class="bi bi-globe-asia-australia"></i>
                </div>
                <div style="font-size:1.25rem;font-weight:700;color:var(--text);">Nationwide Impact</div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  <hr class="orange-divider"/>

  <!-- ════════════════════════════════════════════
       SECTION 3 — CORE VALUES
  ════════════════════════════════════════════ -->
  <section class="values-section">
    <div class="container">
      <div class="text-center mb-5">
        <div class="accent-line mx-auto"></div>
        <p class="section-eyebrow">What Drives Us</p>
        <h2 class="section-heading">Our Core <span>Values</span></h2>
        <p style="color:var(--text-sub);max-width:540px;margin:0 auto;font-size:1.4rem;line-height:1.7;">
          We have a culture that is modern, relevant, and inspires students to have a brighter future. We are determined in our approach to learning, are creative in our thinking, and bold in our ambitions.
        </p>
      </div>

      <div class="row g-4">
        <div class="col-sm-6 col-lg-3">
          <div class="value-card">
            <div class="value-icon"><i class="bi bi-rocket-takeoff"></i></div>
            <h5>Modern Culture</h5>
            <p>A contemporary and relevant learning environment that resonates with today's students and prepares them for the future.</p>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="value-card">
            <div class="value-icon"><i class="bi bi-brush"></i></div>
            <h5>Creative Thinking</h5>
            <p>We encourage innovative and out-of-the-box thinking that helps students tackle real-world problems with fresh perspectives.</p>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="value-card">
            <div class="value-icon"><i class="bi bi-trophy"></i></div>
            <h5>Bold Ambitions</h5>
            <p>We set high standards and inspire every student to dream big and work with determination to achieve their goals.</p>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="value-card">
            <div class="value-icon"><i class="bi bi-patch-check"></i></div>
            <h5>Determine Approach</h5>
            <p>Steadfast commitment to quality education ensures that every learner reaches their highest potential through our programs.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <hr class="orange-divider"/>

  <!-- ════════════════════════════════════════════
       SECTION 4 — CHILD-CENTERED APPROACH
  ════════════════════════════════════════════ -->
  <section class="approach-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-9">
          <div class="approach-box">
            <div class="approach-icon"><i class="bi bi-heart-pulse"></i></div>
            <h3>Our Child-Centered Educational Approach</h3>
            <p>
              We, at TGIIT, follow a <strong>child-centered educational approach</strong>. We make sure that it is based on scientific observations from birth to adulthood. We believe that a child is naturally curious and is capable of initiating learning in a supportive and thoughtfully prepared environment.
            </p>
            <p class="mt-3" style="opacity:.85;font-size:1.3rem;">
              Every program we offer is designed keeping the learner at the center — nurturing curiosity, building confidence, and enabling every child to realize their unique potential.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <hr class="orange-divider"/>

  <!-- ════════════════════════════════════════════
       SECTION 5 — REGISTRATIONS & MEMBERS
  ════════════════════════════════════════════ -->
  <section class="reg-section">
    <div class="container">
      <div class="text-center mb-5">
        <div class="accent-line mx-auto"></div>
        <p class="section-eyebrow">Officially Recognized</p>
        <h2 class="section-heading">Our Registrations &amp; <span>Members</span></h2>
        <p style="color:var(--text-sub);max-width:500px;margin:0 auto;font-size:1.3rem;line-height:1.7;">
          TGIIT is proud to be officially registered and recognized by multiple government bodies and international organizations.
        </p>
      </div>

      <div class="row g-5">

        <!-- Reg 1: NITI Aayog -->
        <div class="col-md-4" style="margin-bottom: 5px;">
          <div class="reg-card">
            <img
              src="assets/images/niti.png"
              alt="NITI Aayog Registration"
            />
            <div class="reg-card-body">
              <div class="reg-number-badge">🏛️ Government of India</div>
              <h5>Registered under NITI Aayog</h5>
              <p>
                The Galaxy Institute of Information Technology is officially registered under <strong>NITI Aayog, Gov of India</strong> — affirming our commitment to national educational development.
              </p>
              <div class="reg-id">
                <i class="bi bi-shield-check"></i>
                Reg. No: HR/2022/0304320
              </div>
            </div>
          </div>
        </div>

        <!-- Reg 2: MSME -->
        <div class="col-md-4 mb-5" style="margin-bottom: 5px;">
          <div class="reg-card">
            <img
              src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=600&q=80"
              alt="MSME Registration"
            />
            <div class="reg-card-body">
              <div class="reg-number-badge">🏢 Ministry of MSME</div>
              <h5>Registered under MSME, Delhi</h5>
              <p>
                TGIIT is registered under the <strong>Ministry of Micro, Small &amp; Medium Enterprise (MSME)</strong> by the Government of India in Delhi, supporting SME-driven educational growth.
              </p>
              <div class="reg-id">
                <i class="bi bi-shield-check"></i>
                Reg. No: UDYM-DL-02-0053439
              </div>
            </div>
          </div>
        </div>

        <!-- Reg 3: ISO -->
        <div class="col-md-4 mb-5" style="margin-bottom: 5px;">
          <div class="reg-card">
            <img
              src="https://images.unsplash.com/photo-1573165231977-3f0e27806045?w=600&q=80"
              alt="ISO Certification"
            />
            <div class="reg-card-body">
              <div class="reg-number-badge">🌍 International Certification</div>
              <h5>ISO 9001:2015 Certified from London, U.K.</h5>
              <p>
                TGIIT holds the prestigious <strong>ISO 9001:2015 Certification</strong> from London, United Kingdom — a testament to our world-class quality management standards in education.
              </p>
              <div class="reg-id">
                <i class="bi bi-shield-check"></i>
                Reg. No: UQ-20222070122
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  <hr class="orange-divider"/>

  <!-- ════════════════════════════════════════════
       SECTION 6 — ALSO CERTIFIED BY
  ════════════════════════════════════════════ -->
  <section class="certified-section">
    <div class="container">
      <div class="row align-items-start g-5">

        <!-- ISO Highlight Card -->
        <div class="col-lg-3">
          <div class="iso-card">
            <div class="iso-big">ISO</div>
            <div style="font-size:1.1rem;font-weight:800;letter-spacing:.5px;">9001 : 2015</div>
            <p>Internationally certified for Quality Management Systems — recognized globally for educational excellence.</p>
            <div class="reg-id-white">London, U.K. Certified</div>
          </div>
        </div>

        <!-- Certified By List -->
        <div class="col-lg-9">
          <div class="accent-line"></div>
          <p class="section-eyebrow">Recognition</p>
          <h2 class="section-heading mb-4">Also <span>Certified By</span></h2>

          <ul class="cert-list">
            <li>
              <div class="cert-icon"><i class="bi bi-award"></i></div>
              <div class="cert-text">
                National Human Rights Commission
                <small>India</small>
              </div>
            </li>
            <li>
              <div class="cert-icon"><i class="bi bi-eye"></i></div>
              <div class="cert-text">
                Central Vigilance Commission
                <small>Government of India</small>
              </div>
            </li>
            <li>
              <div class="cert-icon"><i class="bi bi-droplet"></i></div>
              <div class="cert-text">
                Department of Chemicals &amp; Petrochemicals
                <small>Government of India</small>
              </div>
            </li>
            <li>
              <div class="cert-icon"><i class="bi bi-gender-female"></i></div>
              <div class="cert-text">
                National Commission for Women
                <small>India</small>
              </div>
            </li>
            <li>
              <div class="cert-icon"><i class="bi bi-heart-pulse"></i></div>
              <div class="cert-text">
                Ministry of Health &amp; Family Welfare
                <small>Government of India</small>
              </div>
            </li>
            <li>
              <div class="cert-icon"><i class="bi bi-flower1"></i></div>
              <div class="cert-text">
                Ministry of Ayush
                <small>Government of India</small>
              </div>
            </li>
            <li>
              <div class="cert-icon"><i class="bi bi-egg-fried"></i></div>
              <div class="cert-text">
                Uttam Poshan, Uttam Jeevan
                <small>National Nutrition Mission</small>
              </div>
            </li>
            <li>
              <div class="cert-icon"><i class="bi bi-globe2"></i></div>
              <div class="cert-text">
                World Health Organisation
                <small>WHO – Global Recognition</small>
              </div>
            </li>
          </ul>
        </div>

      </div>
    </div>
  </section>

  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<?php include 'footer.php'; ?>