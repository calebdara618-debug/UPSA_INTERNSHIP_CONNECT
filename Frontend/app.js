/* =================================
   MOBILE NAVIGATION
================================= */

// Select the menu button
const menuToggle = document.getElementById("menuToggle");

// Select the navigation links
const navLinks = document.getElementById("navLinks");

// Open and close mobile menu
menuToggle.addEventListener("click", function () {

    navLinks.classList.toggle("active");

    // Update accessibility state
    const isOpen = navLinks.classList.contains("active");

    menuToggle.setAttribute("aria-expanded", isOpen);

    // Change menu icon
    menuToggle.textContent = isOpen ? "✕" : "☰";

});


// Close menu when a navigation link is clicked

const navigationItems = document.querySelectorAll(".nav-links a");

navigationItems.forEach(function (link) {

    link.addEventListener("click", function () {

        navLinks.classList.remove("active");

        menuToggle.setAttribute("aria-expanded", "false");

        menuToggle.textContent = "☰";

    });

});


/* =================================
   AUTOMATIC COPYRIGHT YEAR
================================= */

const currentYear = document.getElementById("currentYear");

currentYear.textContent = new Date().getFullYear();


/* =================================
   CONSOLE MESSAGE
================================= */

console.log("UPSA Internship Connect loaded successfully!");