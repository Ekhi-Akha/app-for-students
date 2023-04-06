const increaseCounter = () => {
	const counter = document.getElementById('counter');
	let count = 0;

	const timer = setInterval(() => {
		if (count < 1550) {
			count += 10;
		} else {
			count++;
		}
		counter.innerText = count.toString();
		if (count === 1593) {
			clearInterval(timer);
		}
	}, 0.0001);
};

export default increaseCounter;
