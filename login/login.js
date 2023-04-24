const form = document.querySelector('form');
const emailInput = document.querySelector('input[name="email"]');
const passwordInput = document.querySelector('input[name="password"]');
const rememberCheckbox = document.querySelector('#remember');
const loginButton = document.querySelector('button[type="submit"]');

const inputs = document.querySelectorAll('input');
inputs.forEach((input) => {
	input.addEventListener('blur', () => {
		if (input.value.trim() === '') {
			input.setAttribute('aria-invalid', 'true');
		}
	});
});

function showError(input, message) {
	input.setAttribute('aria-invalid', 'true');
	const errorContainer = input.parentElement.querySelector('.error-message');
	if (errorContainer) {
		errorContainer.textContent = message;
		errorContainer.style.display = 'block';
	}
}

function showSuccess(input) {
	input.setAttribute('aria-invalid', 'false');
	const errorContainer = input.parentElement.querySelector('.error-message');
	if (errorContainer) {
		errorContainer.style.display = 'none';
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
	} else if (password.length < 8) {
		showError(passwordInput, 'Password must be at least 8 characters.');
	} else {
		showSuccess(passwordInput);
	}
}

emailInput.addEventListener('input', checkEmail);
passwordInput.addEventListener('input', checkPassword);

form.addEventListener('submit', (event) => {
	event.preventDefault();
	checkEmail();
	checkPassword();

	loginButton.setAttribute('aria-busy', 'true');

	setTimeout(() => {
		if (
			emailInput.getAttribute('aria-invalid') === 'true' ||
			passwordInput.getAttribute('aria-invalid') === 'true'
		) {
			return;
		}
		form.submit();
	}, 1000);
});

// // script to fill form with dummy data
// const dummyData = {
// 	email: Math.random().toString(36).substring(2) + '@example.com',
// 	username: Math.random().toString(36).substring(2),
// 	password: '12345678',
// 	passwordConfirmation: '12345678',
// };

// const username = document.getElementById('username');
// const email = document.getElementById('email');
// const password = document.getElementById('password');
// const passwordConfirmation = document.getElementById('passwordConfirmation');

// const fillForm = () => {
// 	username.value = dummyData.username;
// 	email.value = dummyData.email;
// 	password.value = dummyData.password;
// 	passwordConfirmation.value = dummyData.passwordConfirmation;
// };

// fillForm()
