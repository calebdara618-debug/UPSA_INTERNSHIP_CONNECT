<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>UPSA Internship Connect</title>

    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&family=Poppins:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />

    <!-- CSS Link -->
    <link rel="stylesheet" href="style.css" />
    <style>
      /* Inline styles for the avatar to guarantee it renders cleanly */
      .user-avatar-container {
          display: flex;
          align-items: center;
          gap: 12px;
      }
      .user-avatar {
          width: 40px;
          height: 40px;
          border-radius: 50%;
          background-color: #1a73e8;
          color: white;
          display: flex;
          align-items: center;
          justify-content: center;
          font-weight: bold;
          font-size: 16px;
          text-transform: uppercase;
          box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      }
      .logout-btn {
          text-decoration: none;
          color: #d93025;
          font-weight: 500;
          font-size: 14px;
          transition: opacity 0.2s;
      }
      .logout-btn:hover {
          opacity: 0.8;
      }
    </style>
  </head>

  <body>

<!-- PRELOADER -->
<div id="preloader">

    <div class="loader-content">

        <!-- Website Logo -->
        <img src="Assets/pre_loader-removebg-preview.png" alt="Website Logo" class="loader-logo">

        <!-- Loading Animation -->
        <div class="loader-spinner"></div>

        <h2>WELCOME</h2>

        <p semi-bold>UPSA INTERNSHIP CONNECT</p>

        <div class="loading-text">
            Loading <span>Please wait...</span>
        </div>

    </div>

</div>





    <!-- NAVIGATION BAR -->

    <header>
      <nav class="navbar">
        <div class="logo">
          <img
            src="Assets/GH.jpeg"
            alt="UPSA Logo"
            width="600px"
            height="600px"
          />

          <h2 semi-bold>
            UPSA Internship Connect
            <span>Scholarship with Professionalism</span>
          </h2>
        </div>

        <!-- FIVE NAVIGATION ITEMS -->

        <ul class="nav-links" id="navLinks">
          <li><a href="#home">Home</a></li>

          <li><a href="aboutus.html">About Us</a></li>
          <li><a href="Internship.html">Internships</a></li>
          <li><a href="contactus.html">Contact Us</a></li>
        </ul>

        <!-- RIGHT SIDE: AUTHENTICATION / AVATAR -->
        <div class="nav-buttons">
          <?php if (isset($_SESSION['user_id'])): ?>
              <!-- LOGGED IN STATE: Show Avatar & Logout -->
              <div class="user-avatar-container">
                  <?php 
                      $fullname = $_SESSION['fullname'] ?? 'User';
                      $words = explode(' ', trim($fullname));
                      $initials = strtoupper(substr($words[0], 0, 1) . (isset($words[1]) ? substr($words[1], 0, 1) : ''));
                  ?>
                  <div class="user-avatar" title="<?php echo htmlspecialchars($fullname); ?>">
                      <?php echo $initials; ?>
                  </div>
                  <a href=" ../Backend/config/logout.php" class="logout-btn">Logout</a>
              </div>
          <?php else: ?>
              <!-- LOGGED OUT STATE: Show Login & Sign Up -->
              <a href="login.html" class="login-btn">Login</a>
              <a href="signup.html" class="signup-btn">Sign Up</a>
          <?php endif; ?>
        </div>

        <!-- MOBILE MENU BUTTON -->

        <button
          class="menu-toggle"
          id="menuToggle"
          aria-label="Toggle navigation"
          aria-expanded="false"
        >
          ☰
        </button>
      </nav>
    </header>

    <!-- HERO SECTION -->

    <section class="hero" id="home">
      <div class="hero-content">
        <div class="hero-tag">YOUR CAREER JOURNEY STARTS HERE</div>

        <h1>Connecting UPSA Students to Real-World Opportunities</h1>

        <p>
          Discover internship opportunities, connect with leading organizations
          and gain the professional experience needed to build your future.
        </p>

        <a href="signup.html" class="primary-btn"> Get Started </a>

        <a href="Internship.html" class="secondary-btn"> Explore Opportunities </a>
      </div>
    </section>


     



    <!-- ORGANIZATIONS SECTION -->

    <section class="organizations" id="organizations">
      <h2 class="section-title">Our Industry Partnership</h2>

      <p>
        We aim to collaborate with schools, technology companies, financial
        institutions, telecommunications companies and other organizations
        across Ghana to create meaningful internship opportunities for UPSA
        students.
        We believe that strong industry partnerships create meaningful career opportunities. Through collaboration with leading organizations, technology companies, financial institutions and businesses across Ghana, we connect UPSA students with practical experience, professional mentorship and opportunities to develop industry-relevant skills.

Our mission is to bridge the gap between academic learning and the professional world.
      </p>
    </section>

    <!-- Partner Companies Section -->
    <section class="partners-section">
      <h2>Our Trusted Partners</h2>
      <p>Connecting students with leading organisations.</p>

      <div class="logo2-slider">
        <div class="logo2-track">
          <div class="logo2">
            <img src="Assets/amazon_PNG6-removebg-preview.png" alt="MTN" />
          </div>

          <div class="logo2">
            <img src="Assets/UPSA ICON.webp" alt="Google" />
          </div>

          <div class="logo2">
            <img
              src="Assets/deloitte-logo-removebg-preview.png"
              alt="Microsoft"
            />
          </div>

          <div class="logo2">
            <img src="Assets/Google_logo-removebg-preview.png" alt="Amazon" />
          </div>

          <div class="logo2">
            <img
              src="Assets/microsoft-logo-removebg-preview.png"
              alt="Coca-Cola"
            />
          </div>

          <div class="logo2">
            <img src="Assets/MTN-removebg-preview.png" alt="Deloitte" />
          </div>

          <!-- Duplicate logos for continuous movement -->

          <div class="logo2">
            <img src="Assets/Dara Tech.jpeg" alt="MTN" />
          </div>

          <div class="logo2">
            <img src="Assets/Google_logo-removebg-preview.png" alt="Google" />
          </div>

          <div class="logo2">
            <img
              src="Assets/microsoft-logo-removebg-preview.png"
              alt="Microsoft"
            />
          </div>

          <div class="logo2">
            <img src="Assets/amazon_PNG6-removebg-preview.png" alt="Amazon" />
          </div>

          <div class="logo2">
            <img src="Assets/UPSA ICON.webp" alt="UPSA ICON" />
          </div>

          <div class="logo2">
            <img src="Assets/Dara Tech.jpeg" alt="Deloitte" />
          </div>
        </div>
      </div>
    </section>

    <!-- ABOUT SECTION -->

    <section class="about" id="about">
      <h2 class="section-title">About UPSA Internship Connect</h2>

      <p>
        UPSA Internship Connect is a digital platform designed to bridge the gap
        between university education and professional experience. We connect
        students of the University of Professional Studies, Accra, with
        organizations across Ghana that provide internship opportunities.
      </p>
    </section>



    <section class="hero-section">

    <div class="hero-background"></div>

    <div class="hero-overlay"></div>

    <div class="hero-content">

        <span class="hero-tag">
            <i class="fas fa-graduation-cap"></i>
            YOUR FUTURE, OUR PRIORITY
        </span>

        <h1>
            Turning Students 
            <span>Potential Into Professional  Success</span>
        </h1>

        <p>
            Discover exciting internship opportunities, connect with leading organizations, gain practical experience and develop the skills you need to build a successful career.

From the classroom to the workplace, your journey towards a brighter future starts here.
        </p>

        <div class="hero-buttons">

            <a href="Internship.html" class="hero-btn primary-btn">
                Explore Internships
                <i class="fas fa-arrow-right"></i>
            </a>

            

        </div>

    </div>

</section>



    <!-- STATISTICS SECTION -->

    <section class="stats">
      <div class="stat-box">
        <h2>Students</h2>
<p>Internship Applicants</p>
        <p>Over 1500+</p>
      </div>

      <div class="stat-box">
        <h2>Companies</h2>

        <p>Industry Partners </p>
        <p> Over 100+</p>
      </div>

      <div class="stat-box">
        <h2>Opportunities</h2>

        <p>Career Development</p>
        <p>Over 2000+</p>
      </div>
    </section>

    <!-- INTERNSHIP OPPORTUNITIES -->

    <section class="opportunities" id="internships">
      <h2 class="section-title">Explore Internship Opportunities</h2>

      <p class="subtitle">
        Find opportunities that match your academic programme and career
        interests.
      </p>

      <div class="cards">
        <div class="card">
          <h3>Web Development Intern</h3>

          <p>Organization: Technology Company</p>

          <p>Location: Accra</p>

          <p>Duration: 3 Months</p>

          <a href="login.html">View Details</a>
        </div>

        <div class="card">
          <h3>Networking Intern</h3>

          <p>Organization: Telecommunications Company</p>

          <p>Location: Tema</p>

          <p>Duration: 6 Months</p>

          <a href="login.html">View Details</a>
        </div>

        <div class="card">
          <h3>IT Support Intern</h3>

          <p>Organization: Educational Institution</p>

          <p>Location: Accra</p>

          <p>Duration: 3 Months</p>

          <a href="login.html">View Details</a>
        </div>
      </div>
 
            </a>
            <br>
            <a href="Internship.html" class="car">
                Explore Opportunities
    </section>

    
    

    <!-- CONTACT SECTION -->

    <section class="contact" id="contact">
      <h2 class="section-title">Get in Touch</h2>

      <p>Interested in partnering with UPSA Internship Connect?</p>

      <p>Contact us to explore internship partnership opportunities.</p>

      <a href="contactus.html" class="primary-btn"> Contact Us </a>
    </section>

    <!-- FOOTER -->

    <footer>
      <h3>UPSA Internship Connect</h3>

      <p>Connecting UPSA students to professional opportunities.</p>

      <p>University of Professional Studies, Accra.</p>

      <p>
        &copy; <span id="currentYear"></span>
        UPSA Internship Connect. All Rights Reserved.
      </p>
    </footer>

    <!-- JAVASCRIPT LINK -->

    <script src="app.js"></script>




    <script>
window.addEventListener("load", function () {

    const preloader = document.getElementById("preloader");

    setTimeout(function () {
        preloader.classList.add("hidden");
    }, 1000);

});
</script>
  </body>
</html>