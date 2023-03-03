// Make counter animation by increasing from 0 to 1000

const increaseCounter = () => {
	const counter = document.getElementById('counter') as HTMLSpanElement;
	let count = 0;

	const timer = setInterval(() => {
		count++;
		counter.innerText = count.toString();
		if (count === 1593) {
			clearInterval(timer);
		}
	}, 0.5);
};

export default increaseCounter;
