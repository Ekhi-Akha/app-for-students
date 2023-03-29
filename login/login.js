const loginForm = document.querySelector("#login-form");
const usernameInput = document.querySelector("#username");
const passwordInput = document.querySelector("#password");

loginForm.addEventListener("submit", (event) => {
  event.preventDefault();
  clearErrors();

  const username = usernameInput.value.trim();
  const password = passwordInput.value.trim();

  // Validate username
  if (username === "") {
    showError(usernameInput, "Username is required.");
  } else if (username.length < 3) {
    showError(usernameInput, "Username must be at least 3 characters.");
  }

  // Validate password
  if (password === "") {
    showError(passwordInput, "Password is required.");
  } else if (password.length < 6) {
    showError(passwordInput, "Password must be at least 6 characters.");
  } else if (!/\d/.test(password)) {
    showError(passwordInput, "Password must contain at least one number.");
  }

  // If there are no errors, submit the form
  if (document.querySelectorAll(".error-message").length === 0) {
    loginForm.submit();
  }
});

function showError(input, message) {
  const errorSpan = input.nextElementSibling;
  errorSpan.textContent = message;
  input.classList.add("error");
}

function clearErrors() {
  const errorSpans = document.querySelectorAll(".error-message");
  errorSpans.forEach((error) => (error.textContent = ""));
  const inputs = document.querySelectorAll(".input-control input");
  inputs.forEach((input) => input.classList.remove("error"));
}
