/**
 *
 * @param {string} type
 * @param {string} selector
 * @param {Function} callback
 */
const addGlobalEventListener = (type, selector, callback) => {
	document.addEventListener(type, (e) => {
		if (e.target.matches(selector)) callback(e);
	});
};

const toggleVoteBg = () => {
	addGlobalEventListener('click', '.vote-svg', (event) => {
		console.log(event.target, 1);
		event.target.parentElement.classList.toggle('on');
	});

	addGlobalEventListener('click', '.vote-path', (event) => {
		console.log(event.target, 2);
		event.target.parentElement.parentElement.classList.toggle('on');
	});
};

const toggleUpvote = () => {
	const answers = document.querySelectorAll('.answers');
	answers.forEach((answer) => {
		answer.addEventListener('click', (event) => {
			const classList = event.target.classList;
			if (classList.contains('upvote-svg')) {
				console.log('upvote-svg');
				const upvoteCount = event.target.parentElement.nextElementSibling;
				const upvoteCountText = parseInt(upvoteCount.textContent);

				if (event.target.parentElement.classList.contains('on')) {
					upvoteCount.textContent = upvoteCountText + 1;
				} else {
					upvoteCount.textContent = upvoteCountText - 1;
				}
			} else if (classList.contains('upvote-path')) {
				console.log('upvote-path');
				const upvoteCount =
					event.target.parentElement.parentElement.nextElementSibling;
				const upvoteCountText = parseInt(upvoteCount.textContent);

				if (event.target.parentElement.parentElement.classList.contains('on')) {
					upvoteCount.textContent = upvoteCountText + 1;
				} else {
					upvoteCount.textContent = upvoteCountText - 1;
				}
			}
		});
	});

	const questionFooters = document.querySelectorAll('.question-footer');
	questionFooters.forEach((questionFooter) => {
		questionFooter.addEventListener('click', (event) => {
			const classList = event.target.classList;
			if (classList.contains('upvote-svg')) {
				const upvoteCount = event.target.parentElement.nextElementSibling;
				const upvoteCountText = parseInt(upvoteCount.textContent);

				if (event.target.parentElement.classList.contains('on')) {
					upvoteCount.textContent = upvoteCountText + 1;
				} else {
					upvoteCount.textContent = upvoteCountText - 1;
				}
			} else if (classList.contains('upvote-path')) {
				const upvoteCount =
					event.target.parentElement.parentElement.nextElementSibling;
				const upvoteCountText = parseInt(upvoteCount.textContent);

				if (event.target.parentElement.parentElement.classList.contains('on')) {
					upvoteCount.textContent = upvoteCountText + 1;
				} else {
					upvoteCount.textContent = upvoteCountText - 1;
				}
			}
		});
	});
};

const toggleDownvote = () => {
	const answers = document.querySelectorAll('.answers');
	answers.forEach((answer) => {
		answer.addEventListener('click', (event) => {
			const classList = event.target.classList;
			if (classList.contains('downvote-svg')) {
				const downvoteCount = event.target.parentElement.nextElementSibling;
				const downvoteCountText = parseInt(downvoteCount.textContent);

				if (event.target.parentElement.classList.contains('on')) {
					downvoteCount.textContent = downvoteCountText - 1;
				} else {
					downvoteCount.textContent = downvoteCountText + 1;
				}
			} else if (classList.contains('downvote-path')) {
				const downvoteCount =
					event.target.parentElement.parentElement.nextElementSibling;
				const downvoteCountText = parseInt(downvoteCount.textContent);

				if (event.target.parentElement.parentElement.classList.contains('on')) {
					downvoteCount.textContent = downvoteCountText - 1;
				} else {
					downvoteCount.textContent = downvoteCountText + 1;
				}
			}
		});
	});

	const questionFooters = document.querySelectorAll('.question-footer');
	questionFooters.forEach((questionFooter) => {
		questionFooter.addEventListener('click', (event) => {
			const classList = event.target.classList;
			if (classList.contains('downvote-svg')) {
				const downvoteCount = event.target.parentElement.nextElementSibling;
				const downvoteCountText = parseInt(downvoteCount.textContent);

				if (event.target.parentElement.classList.contains('on')) {
					downvoteCount.textContent = downvoteCountText - 1;
				} else {
					downvoteCount.textContent = downvoteCountText + 1;
				}
			} else if (classList.contains('downvote-path')) {
				const downvoteCount =
					event.target.parentElement.parentElement.nextElementSibling;
				const downvoteCountText = parseInt(downvoteCount.textContent);

				if (event.target.parentElement.parentElement.classList.contains('on')) {
					downvoteCount.textContent = downvoteCountText - 1;
				} else {
					downvoteCount.textContent = downvoteCountText + 1;
				}
			}
		});
	});
};

const addAnswer = async () => {
	const answerForms = document.querySelectorAll('.answer-form');

	answerForms.forEach(async (answerForm) => {
		// get article container id
		const questionId = answerForm.parentElement.parentElement.id;
		answerForm.addEventListener('submit', async (event) => {
			event.preventDefault();
			const answerInput = event.target.children[0];
			if (answerInput.value === '') return;

			const answerList = event.target.previousElementSibling;
			const answer = document.createElement('div');

			answer.classList.add('answer');
			const answerContent = document.createElement('p');
			answerContent.classList.add('answer-content');

			answerContent.textContent = answerInput.value;
			answer.appendChild(answerContent);

			const votes = document.createElement('div');
			votes.classList.add('votes');

			const upvote = document.createElement('span');
			upvote.classList.add('vote', 'upvote');
			const upvoteSvg = document.createElementNS(
				'http://www.w3.org/2000/svg',
				'svg'
			);
			upvoteSvg.setAttribute('width', '36');
			upvoteSvg.setAttribute('height', '36');
			const upvotePath = document.createElementNS(
				'http://www.w3.org/2000/svg',
				'path'
			);
			upvotePath.setAttribute('d', 'M2 10h32L18 26 2 10z');
			upvotePath.setAttribute('fill', 'currentColor');
			upvoteSvg.appendChild(upvotePath);
			upvote.appendChild(upvoteSvg);

			const upvoteCount = document.createElement('p');
			upvoteCount.classList.add('vote-count');
			upvoteCount.textContent = '0';

			const downvote = document.createElement('span');
			downvote.classList.add('vote', 'downvote');
			const downvoteSvg = document.createElementNS(
				'http://www.w3.org/2000/svg',
				'svg'
			);
			downvoteSvg.setAttribute('width', '36');
			downvoteSvg.setAttribute('height', '36');
			const downvotePath = document.createElementNS(
				'http://www.w3.org/2000/svg',
				'path'
			);
			downvotePath.setAttribute('d', 'M2 10h32L18 26 2 10z');
			downvotePath.setAttribute('fill', 'currentColor');
			downvoteSvg.appendChild(downvotePath);
			downvote.appendChild(downvoteSvg);

			downvotePath.classList.add('vote-path');
			upvotePath.classList.add('vote-path');

			upvoteSvg.classList.add('vote-svg');
			downvoteSvg.classList.add('vote-svg');

			upvotePath.classList.add('upvote-path');
			downvotePath.classList.add('downvote-path');

			upvoteSvg.classList.add('upvote-svg');
			downvoteSvg.classList.add('downvote-svg');

			const downvoteCount = document.createElement('p');
			downvoteCount.classList.add('vote-count');
			downvoteCount.textContent = '0';

			votes.appendChild(upvote);
			votes.appendChild(upvoteCount);
			votes.appendChild(downvote);
			votes.appendChild(downvoteCount);

			answer.appendChild(votes);

			answerList.insertAdjacentElement('afterend', answer);

			const res = await fetch(
				'http://localhost/app-for-students/api/add_answer.php',
				{
					method: 'POST',
					body: JSON.stringify({
						answer: answerInput.value,
						question_id: questionId,
					}),
					headers: {
						'Content-Type': 'application/json',
					},
				}
			);
			const newAnswer = await res.json();
			const lastAnswer = answerForm.previousElementSibling;
			lastAnswer.setAttribute('id', newAnswer.id);
			answerInput.value = '';
		});
	});
};

const findStudents = () => {
	const searchInput = document.getElementById('search');
	searchInput.addEventListener('keyup', (event) => {
		fetch('http://localhost/app-for-students/api/get_students.php')
			.then((response) => response.json())
			.then((students) => {
				let filteredStudents = students.filter((student) => {
					return student.username
						.toLowerCase()
						.includes(event.target.value.toLowerCase());
				});

				filteredStudents = filteredStudents.slice(0, 5);

				const studentsList = document.querySelector('.students-list');

				studentsList.innerHTML = '';
				filteredStudents.forEach((student) => {
					const studentLink = document.createElement('a');
					studentLink.setAttribute('href', `student.php?id=${student.id}`);
					studentLink.textContent = student.username;
					studentsList.appendChild(studentLink);

					const studentLi = document.createElement('li');
					studentLi.appendChild(studentLink);
					studentsList.appendChild(studentLi);
				});
			});
	});
};

const addQuestion = async () => {
	const questionForm = document.querySelector('.question-form');

	questionForm.addEventListener('submit', async (event) => {
		event.preventDefault();
		const questionInput = event.target.children[1];
		if (questionInput.value === '') return;
		const res = await fetch(
			'http://localhost/app-for-students/api/add_question.php',
			{
				method: 'POST',
				body: JSON.stringify({
					question: questionInput.value,
				}),
				headers: {
					'Content-Type': 'application/json',
				},
			}
		);

		const newQuestion = await res.json();
		const question = document.createElement('article');
		question.classList.add('question');

		const questionHeader = document.createElement('div');
		questionHeader.classList.add('question-header');

		const subject = document.createElement('h2');
		// subject.textContent = `Subject: ${newQuestion.subject}`;
		subject.textContent = 'Subject: ';

		const subjectLink = document.createElement('a');
		subjectLink.setAttribute('href', `#`);

		// subjectLink.textContent = newQuestion.subject;
		subjectLink.textContent = 'Mathematics';

		subject.appendChild(subjectLink);

		const questionTitle = document.createElement('h3');
		questionTitle.textContent = newQuestion.title;

		const questionDetails = document.createElement('p');
		questionDetails.classList.add('details');

		const questionDetailsSmall = document.createElement('small');
		const questionDetailsEm = document.createElement('em');
		const questionDetailsB = document.createElement('b');
		// questionDetailsB.textContent = newQuestion.username;
		questionDetailsB.textContent = 'John';

		questionDetailsEm.textContent = ' on ';
		questionDetailsEm.appendChild(questionDetailsB);
		questionDetailsEm.textContent += newQuestion.created_at;

		questionDetailsSmall.appendChild(questionDetailsEm);
		questionDetails.appendChild(questionDetailsSmall);

		questionHeader.appendChild(subject);
		questionHeader.appendChild(questionTitle);
		questionHeader.appendChild(questionDetails);

		const questionBody = document.createElement('div');
		questionBody.classList.add('question-body');

		const questionContent = document.createElement('p');
		questionContent.classList.add('question-content');
		questionContent.textContent = newQuestion.question;

		questionBody.appendChild(questionContent);

		const questionFooter = document.createElement('div');
		questionFooter.classList.add('question-footer');

		const votes = document.createElement('div');
		votes.classList.add('votes');

		const upvote = document.createElement('span');
		upvote.classList.add('vote', 'upvote');

		const upvoteSvg = document.createElementNS(
			'http://www.w3.org/2000/svg',
			'svg'
		);
		upvoteSvg.setAttribute('width', '36');
		upvoteSvg.setAttribute('height', '36');
		upvoteSvg.classList.add('vote-svg', 'upvote-svg');

		const upvotePath = document.createElementNS(
			'http://www.w3.org/2000/svg',
			'path'
		);
		upvotePath.setAttribute('d', 'M2 10h32L18 26 2 10z');
		upvotePath.setAttribute('fill', 'currentColor');
		upvotePath.classList.add('vote-path', 'upvote-path');

		upvoteSvg.appendChild(upvotePath);
		upvote.appendChild(upvoteSvg);

		const upvoteCount = document.createElement('p');
		upvoteCount.classList.add('vote-count');
		upvoteCount.textContent = '0';

		const downvote = document.createElement('span');
		downvote.classList.add('vote', 'downvote');

		const downvoteSvg = document.createElementNS(
			'http://www.w3.org/2000/svg',
			'svg'
		);
		downvoteSvg.setAttribute('width', '36');
		downvoteSvg.setAttribute('height', '36');
		downvoteSvg.classList.add('vote-svg', 'downvote-svg');

		const downvotePath = document.createElementNS(
			'http://www.w3.org/2000/svg',
			'path'
		);
		downvotePath.setAttribute('d', 'M2 10h32L18 26 2 10z');

		downvotePath.setAttribute('fill', 'currentColor');
		downvotePath.classList.add('vote-path', 'downvote-path');

		downvoteSvg.appendChild(downvotePath);
		downvote.appendChild(downvoteSvg);

		const downvoteCount = document.createElement('p');
		downvoteCount.classList.add('vote-count');
		downvoteCount.textContent = '0';

		votes.appendChild(upvote);
		votes.appendChild(upvoteCount);
		votes.appendChild(downvote);
		votes.appendChild(downvoteCount);

		questionFooter.appendChild(votes);

		const answers = document.createElement('div');
		answers.classList.add('answers');

		const answersHeader = document.createElement('h4');
		answersHeader.textContent = 'Answers';

		const answerForm = document.createElement('form');
		answerForm.classList.add('answer-form');
		answerForm.setAttribute('action', '/login');

		const answerInput = document.createElement('input');
		answerInput.classList.add('answer-input');
		answerInput.setAttribute('type', 'text');
		answerInput.setAttribute('placeholder', 'Answer the question');

		const answerButton = document.createElement('button');
		answerButton.setAttribute('type', 'submit');
		answerButton.textContent = 'Answer';

		answerForm.appendChild(answerInput);
		answerForm.appendChild(answerButton);

		answers.appendChild(answersHeader);
		answers.appendChild(answerForm);

		questionFooter.appendChild(answers);

		question.appendChild(questionHeader);
		question.appendChild(questionBody);
		question.appendChild(questionFooter);

		const main = document.querySelector('main');
		main.insertBefore(question, main.children[1]);

		questionInput.value = '';
	});
};

toggleVoteBg();
toggleUpvote();
toggleDownvote();
addAnswer();
findStudents();
addQuestion();
