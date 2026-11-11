document
  .getElementById("signupForm")
  .addEventListener("submit", async function (e) {
    e.preventDefault();

    const messageEl = document.getElementById("message");
    messageEl.textContent = "Creating your account...";
    messageEl.style.color = "#000";

    // FormData automatically collects every input, select, and checkbox in the form
    const formData = new FormData(this);

    try {
      const response = await fetch("../Backend/config/signup.php", {
        method: "POST",
        body: formData, // Sends all fields seamlessly as standard form data
      });

      const result = await response.json();

      if (result.success) {
        messageEl.textContent = "Registration successful! Redirecting...";
        messageEl.style.color = "green";
        // Redirect to dashboard on success
        setTimeout(() => {
          window.location.href = result.redirect;
        }, 1000);
      } else {
        messageEl.textContent = result.message;
        messageEl.style.color = "red";
      }
    } catch (error) {
      console.error("Error:", error);
      messageEl.textContent = "An unexpected error occurred. Please try again.";
      messageEl.style.color = "red";
    }
  });
