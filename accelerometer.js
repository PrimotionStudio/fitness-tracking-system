let interval;
let stepCount = 0;
let speed = 0;
let timeStep = 0; // Keep track of the time steps

const maxPoints = 10; // Limit the graph to display the last 10 points

const ctx = document.getElementById('accelerometerChart').getContext('2d');
let accelerometerChart = new Chart(ctx, {
	type: 'line',
	data: {
		labels: [], // Time labels, updated dynamically
		datasets: [
			{
				label: 'X-Axis',
				borderColor: 'rgba(255, 99, 132, 1)',
				backgroundColor: 'rgba(255, 99, 132, 0.2)',
				data: [],
			},
			{
				label: 'Y-Axis',
				borderColor: 'rgba(54, 162, 235, 1)',
				backgroundColor: 'rgba(54, 162, 235, 0.2)',
				data: [],
			},
			{
				label: 'Z-Axis',
				borderColor: 'rgba(75, 192, 192, 1)',
				backgroundColor: 'rgba(75, 192, 192, 0.2)',
				data: [],
			},
		],
	},
	options: {
		responsive: true,
		scales: {
			x: {
				title: {
					display: true,
					text: 'Time (seconds)',
				},
			},
			y: {
				title: {
					display: true,
					text: 'Acceleration (m/s²)',
				},
			},
		},
	},
});

// Function to simulate accelerometer data
function simulateAccelerometer() {
	// Generate random accelerometer values
	const x = (Math.random() * 2 - 1).toFixed(2);
	const y = (Math.random() * 2 - 1).toFixed(2);
	const z = (Math.random() * 2 - 1).toFixed(2);

	const alpha = (Math.random() * 360).toFixed(2);
	const beta = (Math.random() * 180 - 90).toFixed(2);
	const gamma = (Math.random() * 180 - 90).toFixed(2);

	// Update step count and speed
	stepCount += Math.random() < 0.2 ? 1 : 0; // Random step increment
	speed = (Math.random() * 2).toFixed(2); // Random speed between 0 and 2 m/s

	// Update the UI with the new values
	document.getElementById('xValue').innerText = x;
	document.getElementById('yValue').innerText = y;
	document.getElementById('zValue').innerText = z;
	document.getElementById('stepCount').innerText = stepCount;
	document.getElementById('alphaValue').innerText = alpha;
	document.getElementById('betaValue').innerText = beta;
	document.getElementById('gammaValue').innerText = gamma;
	document.getElementById('speedValue').innerText = speed;

	// Update the time step and push new data to the graph
	timeStep++;

	// Add new values for the X, Y, Z axes
	accelerometerChart.data.labels.push(timeStep);
	accelerometerChart.data.datasets[0].data.push(x);
	accelerometerChart.data.datasets[1].data.push(y);
	accelerometerChart.data.datasets[2].data.push(z);

	// Keep only the last 20 points
	if (accelerometerChart.data.labels.length > maxPoints) {
		accelerometerChart.data.labels.shift();
		accelerometerChart.data.datasets[0].data.shift();
		accelerometerChart.data.datasets[1].data.shift();
		accelerometerChart.data.datasets[2].data.shift();
	}
	accelerometerChart.update();
	clearInterval(interval);
	interval = null;
	interval = setInterval(simulateAccelerometer, 1000);
}

// JavaScript function to send a POST request
function sendFitnessData(stepCount, averageSpeed) {
	// Data to be sent in the POST request
	const formData = new FormData();
	formData.append('step_count', stepCount);
	formData.append('average_speed', averageSpeed);

	// Send the POST request
	fetch('func/save_steps', {
		// Replace with your PHP route URL
		method: 'POST',
		body: formData, // Automatically sets Content-Type to 'multipart/form-data'
	})
		.then((response) => console.log(response.text())) // Change to .json() if expecting JSON response
		.then((data) => {
			console.log('Success:', data);
		})
		.catch((error) => {
			console.error('Error:', error);
		});
}

// Start and stop the accelerometer simulation
document.getElementById('toggleButton').addEventListener('click', function () {
	if (interval) {
		sendFitnessData(stepCount, speed);
		clearInterval(interval);
		interval = null;
		this.innerText = 'Start Accelerometer';
	} else {
		interval = setInterval(simulateAccelerometer, 1000); // Update every second
		this.innerText = 'Stop Accelerometer';
	}
});
