// SHOW AND HIDE PASSWORD
function togglePassword(id) {
  const input = document.getElementById(id);
  if (input) {
    input.type = input.type === "password" ? "text" : "password";
  }
}

// TOGGLE ACCOUNT TYPE FIELDS (Optional, if you use them)
const userTypeSelect = document.getElementById("userType");
if (userTypeSelect) {
  userTypeSelect.addEventListener("change", function () {
    const organizationFields = document.getElementById("organizationFields");
    if (organizationFields) {
      organizationFields.style.display =
        this.value === "organization" ? "block" : "none";
    }
  });
}
