const loginForm = document.querySelector("#login-form");
const usernameInput = document.querySelector("#username");
const passwordInput = document.querySelector("#password");

usernameInput.addEventListener("input", (event) => {
  const username = event.target.value.trim();
  if (username === "") {
    showError(usernameInput, "Username is required.");
    usernameInput.setAttribute("aria-invalid", true);
  } else if (username.length < 3) {
    showError(usernameInput, "Username must be at least 3 characters.");
    usernameInput.setAttribute("aria-invalid", true);
  } else {
    clearError(usernameInput);
    usernameInput.setAttribute("aria-invalid", false);
  }
});

passwordInput.addEventListener("input", (event) => {
  const password = event.target.value.trim();
  if (password === "") {
    showError(passwordInput, "Password is required.");
    passwordInput.setAttribute("aria-invalid", true);
  } else if (password.length < 6) {
    showError(passwordInput, "Password must be at least 6 characters.");
    passwordInput.setAttribute("aria-invalid", true);
  } else if (!/\d/.test(password)) {
    showError(passwordInput, "Password must contain at least one number.");
    passwordInput.setAttribute("aria-invalid", true);
  } else {
    clearError(passwordInput);
    passwordInput.setAttribute("aria-invalid", false);
  }
});

function showError(input, message) {
  const errorSpan = input.nextElementSibling;
  errorSpan.textContent = message;
  input.classList.add("error");
}

function clearError(input) {
  const errorSpan = input.nextElementSibling;
  errorSpan.textContent = "";
  input.classList.remove("error");
}

function clearErrors() {
  const errorSpans = document.querySelectorAll(".error-message");
  errorSpans.forEach((error) => (error.textContent = ""));
  const inputs = document.querySelectorAll(".input-control input");
  inputs.forEach((input) => {
    input.classList.remove("error");
    input.setAttribute("aria-invalid", false);
  });
}
