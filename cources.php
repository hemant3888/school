<?php include 'header.php'; ?>
<style>
  :root {
    --orange: #f97316;
    --orange-dark: #ea6c0a;
    --orange-deep: #c2520a;
    --orange-light: #fff7ed;
    --orange-pale: #ffedd5;
    --text: #1c1917;
    --text-sub: #78716c;
    --bg: #fafaf9;
    --border: #e7e5e4;
  }

  /* body { font-family: 'Nunito', sans-serif; background: var(--bg); color: var(--text); overflow-x: hidden; } */



  /* HERO */
  .hero-section {
    background: linear-gradient(135deg, #fff7ed 0%, #fff 60%, #ffedd5 100%);
    text-align: center;
    padding: 5rem 1.5rem 4rem;
    position: relative;
    overflow: hidden;
  }

  .hero-section::before {
    content: '';
    position: absolute;
    width: 520px;
    height: 520px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(249, 115, 22, .13) 0%, transparent 70%);
    top: -140px;
    right: -120px;
    pointer-events: none;
  }

  .hero-section::after {
    content: '';
    position: absolute;
    width: 360px;
    height: 360px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(249, 115, 22, .10) 0%, transparent 70%);
    bottom: -100px;
    left: -80px;
    pointer-events: none;
  }

  .hero-badge {
    display: inline-block;
    background: var(--orange-pale);
    color: var(--orange-deep);
    font-size: 1.78rem;
    font-weight: 800;
    letter-spacing: 2px;
    text-transform: uppercase;
    padding: .35rem 1rem;
    border-radius: 50px;
    margin-bottom: 1.25rem;
    animation: fadeDown .5s ease both;
  }

  .hero-section h1 {
    font-family: 'Lora', serif;
    font-size: clamp(2rem, 5vw, 3.4rem);
    font-weight: 600;
    color: var(--text);
    line-height: 1.2;
    margin-bottom: 1rem;
    animation: fadeDown .55s .05s ease both;
  }

  .hero-section h1 span {
    color: var(--orange);
    font-style: italic;
  }

  .hero-section>p {
    color: var(--text-sub);
    font-size: 1.5rem;
    max-width: 520px;
    margin: 0 auto 2rem;
    line-height: 1.7;
    animation: fadeDown .6s .1s ease both;
  }

  .hero-search {
    display: flex;
    max-width: 440px;
    margin: 0 auto;
    background: #fff;
    border: 1.5px solid var(--border);
    border-radius: 50px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(249, 115, 22, .12);
    animation: fadeDown .65s .15s ease both;
  }

  .hero-search input {
    border: none;
    outline: none;
    padding: .75rem 1.25rem;
    flex: 1;
    font-family: 'Nunito', sans-serif;
    font-size: 1.0rem;
    background: transparent;
    color: var(--text);
  }

  .hero-search button {
    background: var(--orange);
    color: #fff;
    border: none;
    padding: .75rem 1.4rem;
    font-weight: 700;
    font-size: 1.0rem;
    cursor: pointer;
    transition: background .2s;
  }

  .hero-search button:hover {
    background: var(--orange-dark);
  }

  @keyframes fadeDown {
    from {
      opacity: 0;
      transform: translateY(-18px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  /* DEPT SLIDER SECTION */
  .dept-section {
    padding: 4.5rem 0 4rem;
    background: var(--bg);
  }

  .section-label {
    text-align: center;
    font-size: 1.78rem;
    font-weight: 800;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: var(--orange);
    margin-bottom: .5rem;
  }

  .section-title {
    text-align: center;
    font-family: 'Lora', serif;
    font-size: clamp(1.6rem, 3.5vw, 2.4rem);
    font-weight: 600;
    color: var(--text);
    margin-bottom: .6rem;
  }

  .section-sub {
    text-align: center;
    color: var(--text-sub);
    font-size: 1.5rem;
    max-width: 480px;
    margin: 0 auto 2.5rem;
    line-height: 1.65;
  }

  .slider-outer {
    position: relative;
    padding: 0 3rem;
  }

  .slider-track-wrap {
    overflow: hidden;
    padding: 1rem .25rem 1.5rem;
  }

  .slider-track {
    display: flex;
    gap: 1.25rem;
    transition: transform .45s cubic-bezier(.4, 0, .2, 1);
  }

  /* Department Card */
  .dept-card {
    flex: 0 0 calc(25% - 1rem);
    background: #fff;
    border: 1.5px solid var(--border);
    border-radius: 20px;
    padding: 2.25rem 1.5rem 1.75rem;
    text-align: center;
    transition: transform .25s, box-shadow .25s, border-color .25s;
  }

  .dept-card:hover {
    transform: translateY(-7px);
    box-shadow: 0 18px 40px rgba(249, 115, 22, .15);
    border-color: var(--orange);
  }

  .dept-icon-wrap {
    width: 76px;
    height: 76px;
    border-radius: 20px;
    background: var(--orange-pale);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.1rem;
    transition: background .25s;
  }

  .dept-card:hover .dept-icon-wrap {
    background: var(--orange);
  }

  .dept-card:hover .dept-icon-wrap i {
    color: #fff;
  }

  .dept-icon-wrap i {
    font-size: 4rem;
    color: var(--orange);
    transition: color .25s;
  }

  .dept-name {
    font-size: 2.05rem;
    font-weight: 800;
    color: var(--text);
    margin-bottom: .5rem;
  }

  .dept-count {
    margin-bottom: 1.35rem;
  }

  .dept-count span {
    display: inline-block;
    background: var(--orange-pale);
    color: var(--orange-deep);
    padding: .22rem .85rem;
    border-radius: 50px;
    font-size: 1.5rem;
    font-weight: 700;
  }

  .btn-view-all {
    display: inline-block;
    background: var(--orange);
    color: #fff;
    font-weight: 700;
    font-size: 1.0rem;
    padding: .55rem 1.35rem;
    border-radius: 50px;
    border: none;
    cursor: pointer;
    text-decoration: none;
    transition: background .2s, transform .15s, box-shadow .2s;
    box-shadow: 0 4px 14px rgba(249, 115, 22, .25);
  }

  .btn-view-all:hover {
    background: var(--orange-dark);
    transform: translateY(-1px);
    box-shadow: 0 6px 18px rgba(249, 115, 22, .35);
    color: #fff;
  }

  /* Arrows */
  .slider-arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-60%);
    width: 46px;
    height: 46px;
    border-radius: 50%;
    background: #fff;
    border: 1.5px solid var(--border);
    color: var(--text);
    font-size: 1.1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    z-index: 10;
    box-shadow: 0 4px 14px rgba(0, 0, 0, .1);
    transition: background .2s, border-color .2s, color .2s;
  }

  .slider-arrow:hover {
    background: var(--orange);
    border-color: var(--orange);
    color: #fff;
  }

  .slider-arrow.left {
    left: 0;
  }

  .slider-arrow.right {
    right: 0;
  }

  /* Dots */
  .slider-dots {
    display: flex;
    justify-content: center;
    gap: .45rem;
    margin-top: .75rem;
  }

  .dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: var(--border);
    cursor: pointer;
    transition: background .2s, width .25s;
  }

  .dot.active {
    background: var(--orange);
    width: 22px;
    border-radius: 50px;
  }

  /* WHY SECTION */
  .why-section {
    background: linear-gradient(135deg, #fff7ed, #fff);
    padding: 5rem 1.5rem;
  }

  .why-card {
    text-align: center;
    padding: 2rem 1.5rem;
    border-radius: 16px;
    background: #fff;
    border: 1px solid var(--border);
    height: 100%;
    transition: transform .2s, box-shadow .2s;
    margin-bottom: 5px;
  }

  .why-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 32px rgba(249, 115, 22, .12);
  }

  .why-icon {
    width: 64px;
    height: 64px;
    border-radius: 16px;
    background: var(--orange-pale);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.1rem;
    color: var(--orange);
    font-size: 1.75rem;
  }

  .why-card h5 {
    font-weight: 800;
    font-size: 1.5rem;
    color: var(--text);
    margin-bottom: .5rem;
  }

  .why-card p {
    font-size: 1.25rem;
    color: var(--text-sub);
    line-height: 1.6;
  }

  /* STATS */
  .stats-section {
    background: var(--orange);
    padding: 4rem 1.5rem;
  }

  .stat-item {
    text-align: center;
  }

  .stat-number {
    font-size: clamp(2.2rem, 5vw, 3.2rem);
    font-weight: 900;
    color: #fff;
    line-height: 1;
    margin-bottom: .35rem;
  }

  .stat-label {
    font-size: 1.5rem;
    font-weight: 600;
    color: rgba(255, 255, 255, .8);
  }

  /* CTA */
  .cta-section {
    background: var(--text);
    padding: 5rem 1.5rem;
    text-align: center;
    position: relative;
    overflow: hidden;
  }

  .cta-section::before {
    content: '';
    position: absolute;
    width: 400px;
    height: 400px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(249, 115, 22, .18) 0%, transparent 70%);
    top: -100px;
    left: -80px;
    pointer-events: none;
  }

  .cta-section h2 {
    font-family: 'Lora', serif;
    font-size: clamp(1.75rem, 4vw, 2.8rem);
    font-weight: 600;
    color: #fff;
    margin-bottom: 1rem;
  }

  .cta-section h2 span {
    color: var(--orange);
    font-style: italic;
  }

  .cta-section p {
    color: rgba(255, 255, 255, .65);
    font-size: 1.5rem;
    max-width: 460px;
    margin: 0 auto 2rem;
    line-height: 1.7;
  }

  .btn-cta-primary {
    background: var(--orange);
    color: #fff;
    font-weight: 800;
    font-size: 1rem;
    padding: .85rem 2.2rem;
    border-radius: 50px;
    border: none;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    margin: .4rem;
    transition: background .2s, transform .2s;
    box-shadow: 0 6px 22px rgba(249, 115, 22, .35);
  }

  .btn-cta-primary:hover {
    background: var(--orange-dark);
    transform: translateY(-2px);
    color: #fff;
  }

  .btn-cta-outline {
    background: transparent;
    color: #fff;
    font-weight: 700;
    font-size: 1rem;
    padding: .82rem 2.2rem;
    border-radius: 50px;
    border: 2px solid rgba(255, 255, 255, .35);
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    margin: .4rem;
    transition: border-color .2s, background .2s;
  }

  .btn-cta-outline:hover {
    border-color: #fff;
    background: rgba(255, 255, 255, .08);
    color: #fff;
  }



  @media (max-width:991px) {
    .dept-card {
      flex: 0 0 calc(33.33% - .85rem);
    }
  }

  @media (max-width:767px) {
    .dept-card {
      flex: 0 0 calc(50% - .65rem);
    }

    .slider-outer {
      padding: 0 2.5rem;
    }
  }

  @media (max-width:480px) {
    .dept-card {
      flex: 0 0 calc(85%);
    }

    .slider-arrow {
      width: 30px;
      height: 30px;
    }
  }
</style>




<!-- SECTION 1: HERO -->
<section class="hero-section">
  <div class="hero-badge">📚 Explore All Departments</div>
  <h1>Discover Our <span>Courses</span><br />Built for Your Future</h1>
  <p>Choose from a wide range of vocational & professional courses designed to help you grow, learn, and succeed in your career.</p>
  <div class="hero-search">
    <input type="text" placeholder="Search courses, departments..." />
    <button><i class="bi bi-search me-1"></i> Search</button>
  </div>
</section>

<!-- SECTION 2: DEPARTMENT SLIDER -->
<section class="dept-section">
  <p class="section-label">Browse by Department</p>
  <h2 class="section-title">Our Departments</h2>
  <p class="section-sub">Click "View All Courses" on any department to see all available courses in that field.</p>

  <div class="container">
    <div class="slider-outer">
      <button class="slider-arrow left" id="prevBtn"><i class="bi bi-chevron-left"></i></button>

      <div class="slider-track-wrap">
        <div class="slider-track" id="sliderTrack">

          <?php
          include 'includes/config.php';
          $department_query = mysqli_query($conn, "

                    SELECT * FROM department
                    ORDER BY depart_name ASC

                ");

          while ($department = mysqli_fetch_assoc($department_query)) {

            $department_id = $department['id'];

            /* COURSE COUNT */

            $course_count_query = mysqli_query($conn, "

                        SELECT COUNT(*) as total_course
                        FROM course
                        WHERE depart_id='$department_id'

                    ");

            $course_count = mysqli_fetch_assoc($course_count_query);

            /* URL FRIENDLY NAME */

            $slug = strtolower(str_replace(' ', '-', $department['depart_name']));

          ?>
            <div class="dept-card">
              <div class="dept-icon-wrap"><i class="bi bi-mortarboard-fill"></i></div>
              <div class="dept-name"> <?php echo $department['depart_name']; ?></div>
              <div class="dept-count"><span> <?php echo $course_count['total_course']; ?> Courses</span></div>
              <a href="course-detail.php?department=<?php echo urlencode($department['depart_name']); ?>" class="btn-view-all">View All Courses →</a>
            </div>


          <?php } ?>
        </div>
      </div>

      <button class="slider-arrow right" id="nextBtn"><i class="bi bi-chevron-right"></i></button>
    </div>
    <div class="slider-dots" id="sliderDots"></div>
  </div>
</section>

<!-- SECTION 3: WHY CHOOSE US -->
<section class="why-section">
  <div class="container">
    <p class="section-label">Why Galaxy Institute?</p>
    <h2 class="section-title">What Makes Us Different</h2>
    <p class="section-sub">We are committed to providing quality education with real-world skills that matter.</p>
    <div class="row g-4 mt-1">
      <div class="col-sm-6 col-lg-3">
        <div class="why-card">
          <div class="why-icon"><i class="bi bi-person-check"></i></div>
          <h5>Expert Faculty</h5>
          <p>Learn from experienced professionals with industry expertise and teaching excellence.</p>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="why-card">
          <div class="why-icon"><i class="bi bi-briefcase"></i></div>
          <h5>Job Placement</h5>
          <p>We assist students with job placement support and career counselling after course completion.</p>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="why-card">
          <div class="why-icon"><i class="bi bi-currency-rupee"></i></div>
          <h5>Affordable Fees</h5>
          <p>Quality education at pocket-friendly prices. EMI and scholarship options also available.</p>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="why-card">
          <div class="why-icon"><i class="bi bi-calendar2-check"></i></div>
          <h5>Flexible Timing</h5>
          <p>Morning and evening batches available. Learn at your own pace with flexible scheduling.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- SECTION 4: STATS -->
<section class="stats-section">
  <div class="container">
    <div class="row align-items-center text-center g-4">
      <div class="col-6 col-md-3">
        <div class="stat-item">
          <div class="stat-number">500+</div>
          <div class="stat-label">Students Enrolled</div>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="stat-item">
          <div class="stat-number">20+</div>
          <div class="stat-label">Courses Available</div>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="stat-item">
          <div class="stat-number">5+</div>
          <div class="stat-label">Years Experience</div>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="stat-item">
          <div class="stat-number">90%</div>
          <div class="stat-label">Placement Rate</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- SECTION 5: CTA -->
<section class="cta-section">
  <div class="container position-relative" style="z-index:1;">
    <h2>Ready to Start Your <span>Journey?</span></h2>
    <p>Join hundreds of students who have transformed their careers with Om Institute. Enroll today and take the first step!</p>
    <!-- <a href="#" class="btn-cta-primary">🎓 Enroll Now</a>
      <a href="#" class="btn-cta-outline">📞 Contact Us</a> -->
  </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const track = document.getElementById('sliderTrack');
  const cards = Array.from(track.querySelectorAll('.dept-card'));
  const dotsWrap = document.getElementById('sliderDots');
  const prevBtn = document.getElementById('prevBtn');
  const nextBtn = document.getElementById('nextBtn');
  let current = 0;

  function getVisible() {
    const w = window.innerWidth;
    if (w < 480) return 1;
    if (w < 768) return 2;
    if (w < 992) return 3;
    return 4;
  }

  function totalSlides() {
    return Math.ceil(cards.length / getVisible());
  }

  function buildDots() {
    dotsWrap.innerHTML = '';
    for (let i = 0; i < totalSlides(); i++) {
      const d = document.createElement('div');
      d.className = 'dot' + (i === current ? ' active' : '');
      d.addEventListener('click', () => goTo(i));
      dotsWrap.appendChild(d);
    }
  }

  function goTo(idx) {
    current = Math.max(0, Math.min(idx, totalSlides() - 1));
    const gap = 20;
    const cardW = cards[0].offsetWidth + gap;
    track.style.transform = `translateX(-${current * getVisible() * cardW}px)`;
    document.querySelectorAll('.dot').forEach((d, i) => d.classList.toggle('active', i === current));
  }

  prevBtn.addEventListener('click', () => goTo(current - 1));
  nextBtn.addEventListener('click', () => goTo(current + 1));
  window.addEventListener('resize', () => {
    current = 0;
    buildDots();
    goTo(0);
  });
  buildDots();
</script>
<?php include 'footer.php';   ?>