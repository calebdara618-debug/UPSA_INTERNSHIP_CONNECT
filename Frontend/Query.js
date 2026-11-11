// 1. Initialize EmailJS with your Public Key
// (Get this free key from https://www.emailjs.com/)
(function() {
    emailjs.init({
        publicKey: "YOUR_PUBLIC_KEY",
    });
})();

document.addEventListener("DOMContentLoaded", () => {
    const signupForm = document.getElementById("signupForm");
    const accountTypeSelect = document.getElementById("accountType");
    const studentFields = document.getElementById("studentFields");
    const organizationFields = document.getElementById("organizationFields");
    const messageDisplay = document.getElementById("message");

    // Dynamic fields toggle based on Account Type selection
    if (accountTypeSelect) {
        accountTypeSelect.addEventListener("change", function() {
            if (this.value === "student") {
                studentFields.style.display = "block";
                organizationFields.style.display = "none";
            } else if (this.value === "organization") {
                organizationFields.style.display = "block";
                studentFields.style.display = "none";
            } else {
                studentFields.style.display = "none";
                organizationFields.style.display = "none";
            }
        });
    }

    // Handle Signup Form Submission
    if (signupForm) {
        signupForm.addEventListener("submit", function(event) {
            event.preventDefault();

            const accountType = accountTypeSelect.value;
            const fullName = document.getElementById("fullName").value.trim();
            const email = document.getElementById("email").value.trim();
            const password = document.getElementById("password").value;
            const confirmPassword = document.getElementById("confirmPassword").value;

            // 1. Validate Password Match
            if (password !== confirmPassword) {
                messageDisplay.style.color = "red";
                messageDisplay.textContent = "Passwords do not match. Please check and try again.";
                return;
            }

            // 2. Validate Student-specific field if student is chosen
            if (accountType === "student") {
                const indexNumber = document.getElementById("indexNumber").value.trim();
                const programme = document.getElementById("programme").value;
                const level = document.getElementById("level").value;

                if (!indexNumber || !programme || !level) {
                    messageDisplay.style.color = "red";
                    messageDisplay.textContent = "Please fill in all required student details correctly.";
                    return;
                }
            }

            messageDisplay.style.color = "blue";
            messageDisplay.textContent = "Creating your account and sending confirmation email...";

            // Parameters passed to your EmailJS template
            const templateParams = {
                to_name: fullName,
                to_email: email,
                account_type: accountType,
                message: "Your UPSA Internship Connect account has been successfully created!"
            };

            // 3. Send email via EmailJS API
            // Replace "YOUR_SERVICE_ID" and "YOUR_TEMPLATE_ID" with your actual EmailJS IDs
            emailjs.send("YOUR_SERVICE_ID", "YOUR_TEMPLATE_ID", templateParams)
                .then((response) => {
                    console.log('SUCCESS!', response.status, response.text);
                    messageDisplay.style.color = "green";
                    messageDisplay.textContent = "Account successfully created! A confirmation email has been sent.";
                    
                    // Optional: Redirect to login page after 2 seconds
                    setTimeout(() => {
                        window.location.href = "login.html";
                    }, 2500);

                }, (error) => {
                    console.log('FAILED...', error);
                    messageDisplay.style.color = "red";
                    messageDisplay.textContent = "Account created, but failed to send the confirmation email. Please try logging in.";
                });
        });
    }
});

// Password visibility toggle function linked in your HTML buttons
function togglePassword(fieldId) {
    const passwordInput = document.getElementById(fieldId);
    if (passwordInput) {
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    }
}