const toggleVoteBg = () => {
	for (const btn of document.querySelectorAll('.vote')) {
		btn.addEventListener('click', (event) => {
			event.currentTarget.classList.toggle('on');
		});
	}
};

const toggleUpvote = () => {
	for (const btn of document.querySelectorAll('.upvote')) {
		btn.addEventListener('click', (event) => {
			const upvoteCount = event.currentTarget.nextElementSibling;
			const upvoteCountText = parseInt(upvoteCount.textContent);

			if (btn.classList.contains('on')) {
				upvoteCount.textContent = upvoteCountText + 1;
			} else {
				upvoteCount.textContent = upvoteCountText - 1;
			}
		});
	}
};

const toggleDownvote = () => {
	for (const btn of document.querySelectorAll('.downvote')) {
		btn.addEventListener('click', (event) => {
			const downvoteCount = event.currentTarget.nextElementSibling;
			const downvoteCountText = parseInt(downvoteCount.textContent);

			if (btn.classList.contains('on')) {
				downvoteCount.textContent = downvoteCountText - 1;
			} else {
				downvoteCount.textContent = downvoteCountText + 1;
			}
		});
	}
};

const addAnswer = () => {
	const answerForm = document.querySelector('.answer-form');
	const answerInput = document.querySelector('.answer-input');
	const answerList = document.querySelector('.answers');

	answerForm.addEventListener('submit', (event) => {
		/* <div class="answer">
            <p class="answer-content">This answer is better than the previous one because it has more upvotes</p>
            <div class="votes">
              <span class="vote upvote">
                <svg width="36" height="36">
                  <path d="M2 10h32L18 26 2 10z" fill="currentColor">
                  </path>
                </svg>
              </span>
              <p class="vote-count">0</p>
              <span class="vote downvote">
                <svg width="36" height="36">
                  <path d="M2 10h32L18 26 2 10z" fill="currentColor">
                  </path>
                </svg>
              </span>
              <p class="vote-count">0</p>
            </div>
          </div> */
		// add answer to the above structure
		event.preventDefault();
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

		const downvoteCount = document.createElement('p');
		downvoteCount.classList.add('vote-count');
		downvoteCount.textContent = '0';

		votes.appendChild(upvote);
		votes.appendChild(upvoteCount);
		votes.appendChild(downvote);
		votes.appendChild(downvoteCount);

		answer.appendChild(votes);

		answerList.appendChild(answer);
		answerInput.value = '';
	});
};

toggleVoteBg();
toggleUpvote();
toggleDownvote();
addAnswer();
