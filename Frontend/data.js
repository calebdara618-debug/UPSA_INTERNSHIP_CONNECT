// 1. Initialize EmailJS with your Public Key
(function() {
    emailjs.init({
        publicKey: "YOUR_PUBLIC_KEY", // Replace with your actual EmailJS Public Key
    });
})();

document.addEventListener("DOMContentLoaded", () => {
    const signupForm = document.getElementById("signupForm");
    const accountTypeSelect = document.getElementById("accountType");
    const studentFields = document.getElementById("studentFields");
    const organizationFields = document.getElementById("organizationFields");
    const messageDisplay = document.getElementById("message");

    // Dynamic field toggle based on Account Type selection
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

    // Handle Form Submission
    if (signupForm) {
        signupForm.addEventListener("submit", function(event) {
            event.preventDefault();

            const accountType = accountTypeSelect.value;
            const fullName = document.getElementById("fullName").value.trim();
            const email = document.getElementById("email").value.trim();
            const password = document.getElementById("password").value;
            const confirmPassword = document.getElementById("confirmPassword").value;

            // Password matching validation
            if (password !== confirmPassword) {
                messageDisplay.style.color = "red";
                messageDisplay.textContent = "Passwords do not match. Please check and try again.";
                return;
            }

            // Student specific field validation
            if (accountType === "student") {
                const indexNumber = document.getElementById("indexNumber").value.trim();
                const programme = document.getElementById("programme").value;
                const level = document.getElementById("level").value;

                if (!indexNumber || !programme || !level) {
                    messageDisplay.style.color = "red";
                    messageDisplay.textContent = "Please fill in all student details correctly.";
                    return;
                }
            }

            messageDisplay.style.color = "blue";
            messageDisplay.textContent = "Creating your account and sending confirmation email...";

            // Parameters matching your email template variables
            const templateParams = {
                to_name: fullName,
                to_email: email,
                account_type: accountType,
                message: "Your UPSA Internship Connect account has been successfully created!"
            };

            // 2. Call the EmailJS API to send the email
            emailjs.send("YOUR_SERVICE_ID", "YOUR_TEMPLATE_ID", templateParams)
                .then((response) => {
                    console.log('SUCCESS!', response.status, response.text);
                    messageDisplay.style.color = "green";
                    messageDisplay.textContent = "Account successfully created! A confirmation email has been sent.";
                    
                    // Reset form and fields
                    signupForm.reset();
                    if(studentFields) studentFields.style.display = "none";
                    if(organizationFields) organizationFields.style.display = "none";

                    // Optional redirect to login after success
                    setTimeout(() => {
                        window.location.href = "login.html";
                    }, 2500);

                }, (error) => {
                    console.log('FAILED...', error);
                    messageDisplay.style.color = "red";
                    messageDisplay.textContent = "Account created, but failed to send confirmation email. Please try logging in.";
                });
        });
    }
});

// Password visibility toggle function referenced in HTML
function togglePassword(fieldId) {
    const passwordInput = document.getElementById(fieldId);
    if (passwordInput) {
        passwordInput.type = passwordInput.type === "password" ? "text" : "password";
    }
}