const form = document.querySelector('#form');
const usernameInput = document.querySelector('#username');
const emailInput = document.querySelector('#email');
const passwordInput = document.querySelector('#password');
const password2Input = document.querySelector('#password2');


function showError(input, message) {
  const errorDiv = input.nextElementSibling;
  errorDiv.textContent = message;
  errorDiv.classList.add('error');
  input.setAttribute('aria-invalid', 'true');
}


function showSuccess(input) {
  const errorDiv = input.nextElementSibling;
  errorDiv.textContent = '';
  errorDiv.classList.remove('error');
  input.setAttribute('aria-invalid', 'false');
}


function checkUsername() {
  const username = usernameInput.value.trim();
  if (username === '') {
    showError(usernameInput, 'Username is required.');
  } else if (username.length < 3) {
    showError(usernameInput, 'Username must be at least 3 characters.');
  } else {
    showSuccess(usernameInput);
  }
}


function checkEmail() {
  const email = emailInput.value.trim();
  if (email === '') {
    showError(emailInput, 'Email is required.');
  } else if (!/\S+@\S+\.\S+/.test(email)) {
    showError(emailInput, 'Email is not valid.');
  } else {
    showSuccess(emailInput);
  }
}


function checkPassword() {
  const password = passwordInput.value.trim();
  if (password === '') {
    showError(passwordInput, 'Password is required.');
  } else if (password.length < 6) {
    showError(passwordInput, 'Password must be at least 6 characters.');
  } else {
    showSuccess(passwordInput);
  }
}


function checkPasswordMatch() {
  const password = passwordInput.value.trim();
  const password2 = password2Input.value.trim();
  if (password2 === '') {
    showError(password2Input, 'Please confirm your password.');
  } else if (password !== password2) {
    showError(password2Input, 'Passwords do not match.');
  } else {
    showSuccess(password2Input);
  }
}


usernameInput.addEventListener('input', checkUsername);
emailInput.addEventListener('input', checkEmail);
passwordInput.addEventListener('input', checkPassword);
password2Input.addEventListener('input', checkPasswordMatch);

form.addEventListener('submit', (event) => {
  event.preventDefault();
  checkUsername();
  checkEmail();
  checkPassword();
  checkPasswordMatch();
});