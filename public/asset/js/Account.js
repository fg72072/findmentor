var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
	// This function will display the specified tab of the form ...
	var x = document.getElementsByClassName('tab');
	x[n].style.display = 'block';
	// ... and fix the Previous/Next buttons:
	if (n == 0) {
		document.getElementById('prevBtn').style.display = 'none';
	} else {
		document.getElementById('prevBtn').style.display = 'inline';
	}
	if (n == x.length - 1) {
		document.getElementById('nextBtn').innerHTML = 'Submit';
	} else {
		document.getElementById('nextBtn').innerHTML = 'Next';
	}
	// ... and run a function that displays the correct step indicator:
	fixStepIndicator(n);
}
var bar = 0;

function nextPrev(n) {
	var progress = document.querySelector('.progress-bar');

	if (n == 1) {
		bar = bar + 12;
		progress.style.width = `${bar}%`;
	} else {
		bar = bar - 12;
		progress.style.width = `${bar}%`;
	}
	// This function will figure out which tab to display
	var x = document.getElementsByClassName('tab');
	// Exit the function if any field in the current tab is invalid:
	// if (n == 1 && !validateForm()) return false;
	// Hide the current tab:
	x[currentTab].style.display = 'none';
	// Increase or decrease the current tab by 1:
	currentTab = currentTab + n;
	// if you have reached the end of the form... :
	if (currentTab >= x.length) {
		//...the form gets submitted:
		document.getElementById('regForm').submit();
		return false;
	}
	// Otherwise, display the correct tab:
	showTab(currentTab);
}

function validateForm() {
	// This function deals with validation of the form fields
	var x,
		y,
		i,
		valid = true;
	x = document.getElementsByClassName('tab');
	y = x[currentTab].getElementsByTagName('input');
	// A loop that checks every input field in the current tab:
	for (i = 0; i < y.length; i++) {
		// If a field is empty...
		if (y[i].value == '') {
			// add an "invalid" class to the field:
			y[i].className += ' invalid';
			// and set the current valid status to false:
			valid = false;
		}
	}
	// If the valid status is true, mark the step as finished and valid:
	if (valid) {
		document.getElementsByClassName('step')[currentTab].className += ' finish';
	}
	return valid; // return the valid status
}

function fixStepIndicator(n) {
	// This function removes the "active" class of all steps...
	var i,
		x = document.getElementsByClassName('step');
	for (i = 0; i < x.length; i++) {
		x[i].className = x[i].className.replace(' active', '');
	}
	//... and adds the "active" class to the current step:
	x[n].className += ' active';
}

//location fetching
var loc = document.querySelector('.loc');

const successLookUp = (position) => {
	const { latitude, longitude } = position.coords;
	var abc = fetch(
		`https://api.opencagedata.com/geocode/v1/json?q=${latitude}+${longitude}&key=457e63d9bb3747df982c9fecfd5520ed`
	).then((response) => response.json());
	// .then(console.log)
	abc
		.then((data) => {
			// console.log(data.results[0].formatted)
			// loc.textContent(data.results[0].formatted)
			// loc.innerHTML(data.results[0].formatted)
			// document.getElementById("p1").innerHTML = "New text!";
			document.querySelector('.loc').placeholder = data.results[0].formatted;
		})
		.catch((error) => {
			console.log(error);
		});
};

// console.log(abc)

var map = document.querySelector('.map');

// map.addEventListener("click",function(e){

// navigator.geolocation.getCurrentPosition(successLookUp,console.log)

// })
