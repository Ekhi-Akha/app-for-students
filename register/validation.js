const form = document.querySelector('#form');
const usernameInput = document.querySelector('#username');
const emailInput = document.querySelector('#email');
const passwordInput = document.querySelector('#password');
const passwordConfirmationInput = document.querySelector(
	'#passwordConfirmation'
);
const educationalLevelSelect = document.querySelector('#educational-level');
const registerButton = document.querySelector('input[type="submit"]');

const inputs = document.querySelectorAll('input');
inputs.forEach((input) => {
	input.addEventListener('blur', () => {
		if (input.value.trim() === '') {
			input.setAttribute('aria-invalid', 'true');
		}
	});
});

educationalLevelSelect.addEventListener('blur', () => {
	if (educationalLevelSelect.value === 'nothing') {
		educationalLevelSelect.setAttribute('aria-invalid', 'true');
	}
});

function showError(input) {
	input.setAttribute('aria-invalid', 'true');
}

function showSuccess(input) {
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
	} else if (password.length < 8) {
		showError(passwordInput, 'Password must be at least 8 characters.');
	} else {
		showSuccess(passwordInput);
	}
}

function checkPasswordMatch() {
	const password = passwordInput.value.trim();
	const passwordConfirmation = passwordConfirmationInput.value.trim();
	if (passwordConfirmation === '') {
		showError(passwordConfirmationInput, 'Please confirm your password.');
	} else if (password !== passwordConfirmation) {
		showError(passwordConfirmationInput, 'Passwords do not match.');
	} else {
		showSuccess(passwordConfirmationInput);
	}
}

function checkEducationalLevel() {
	if (educationalLevelSelect.value !== 'nothing') {
		showSuccess(educationalLevelSelect);
	}
}

usernameInput.addEventListener('input', checkUsername);
emailInput.addEventListener('input', checkEmail);
passwordInput.addEventListener('input', checkPassword);
passwordConfirmationInput.addEventListener('input', checkPasswordMatch);
educationalLevelSelect.addEventListener('input', checkEducationalLevel);

function submitForm(form) {
	const submitFormFunction = Object.getPrototypeOf(form).submit;
	submitFormFunction.call(form);
}

// form.addEventListener('submit', (event) => {
// 	event.preventDefault();
// 	checkUsername();
// 	checkEmail();
// 	checkPassword();
// 	checkPasswordMatch();

// 	if (
// 		usernameInput.getAttribute('aria-invalid') === 'false' &&
// 		emailInput.getAttribute('aria-invalid') === 'false' &&
// 		passwordInput.getAttribute('aria-invalid') === 'false' &&
// 		passwordConfirmationInput.getAttribute('aria-invalid') === 'false'
// 	) {
// 		submitForm(form);
// 	}

// 	// 	// registerButton.setAttribute('aria-busy', 'true');
// 	// 	setTimeout(() => {
// 	// 		if (
// 	// 			usernameInput.getAttribute('aria-invalid') === 'false' &&
// 	// 			emailInput.getAttribute('aria-invalid') === 'false' &&
// 	// 			passwordInput.getAttribute('aria-invalid') === 'false' &&
// 	// 			passwordConfirmationInput.getAttribute('aria-invalid') === 'false' &&
// 	// 			educationalLevelSelect.getAttribute('aria-invalid') === 'false'
// 	// 		) {
// 	// 			submitForm(form);
// 	// 		}
// 	// 	}, 1000);
// });
