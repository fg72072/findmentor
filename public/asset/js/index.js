// Coin section

// var selectedValue=10
function getSelectValue() {
	//  var selectedValue = document.getElementById("Coins").value;
	var selectedValue = $('#Coins option:selected').data('coin');
	var selectedValueSave = $('#Coins option:selected').data('save') / 100;

	document.getElementById('Pkr').innerHTML = `Pkr : ${selectedValue}`;
	document.getElementById('Usd').innerHTML = `Usd : ${selectedValue / 10}`;

	document.getElementById('Pkr_save').innerHTML = `Pkr : ${selectedValue * selectedValueSave}`;
	document.getElementById('Usd_save').innerHTML = `Usd : ${selectedValue / 10 * selectedValueSave}`;
}

var state = false;

function ShowPopUp() {
	$('#myModal').modal();
}
function myFunction() {
	document.getElementById('demo').innerHTML = 'Hello World';
	document.getElementById('myModal').style.display = 'none';
	console.log('hello');
}
function toggle() {
	if (state) {
		document.getElementById('inputHide').setAttribute('type', 'password');
		state = false;
	} else {
		document.getElementById('inputHide').setAttribute('type', 'text');
		state = true;
	}
}

//Multi Form
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
	// if(check == true)
	// {
	//   console.log("hello")
	// }

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
		document.getElementById('popup').style.display = 'inline';
		document.getElementById('nextBtn').style.display = 'none';
	} else {
		document.getElementById('popup').style.display = 'none';
		document.getElementById('nextBtn').innerHTML = 'Next';
		document.getElementById('nextBtn').style.display = 'inline';
	}

	// ... and run a function that displays the correct step indicator:
	fixStepIndicator(n);
}

var bar = 0;

function nextPrev(n) {
	var progress = document.querySelector('.progress-bar');

	if (n == 1) {
		bar = bar + 50;
		progress.style.width = `${bar}%`;
	} else {
		bar = bar - 50;
		progress.style.width = `${bar}%`;
	}
	// This function will figure out which tab to display
	var x = document.getElementsByClassName('tab');
	// Exit the function if any field in the current tab is invalid:
	if (n == 1 && !validateForm()) {
		nextPrev(n - 1);
		return false;
	}
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
	// if (valid) {
	// 	document.getElementsByClassName('step')[currentTab].className += ' finish';
	// }
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
