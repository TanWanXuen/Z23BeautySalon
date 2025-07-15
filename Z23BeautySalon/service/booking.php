<!DOCTYPE html>
<html>
<head>
	<title>Checkout</title>
	<link rel="stylesheet" href="../style/webstyles.css">

</head>
<body>
	<?php include("../includes/header.php"); ?>
	<?php include("../includes/nav.php"); ?>

	<!-- Service booking form -->
	<div class="serviceContainer">
		<h1>Service Booking</h1>
		<form id="serviceBookingForm" class="checkout-form" action="servicePostMessage.php" method="post">
			<div class="form-group">
				<label for="bookingName">Name:</label>
				<input type="text" id="bookingName" name="name">
				<div id="bookingNameError" class="error"></div>
			</div>
			<div class="form-group">
				<label for="bookingEmail">E-mail:</label>
				<input type="email" id="bookingEmail" name="email">
				<div id="bookingEmailError" class="error"></div>
			</div>
			<div class="form-group">
				<label for="bookingPhone">Phone Number:</label>
				<input type="tel" id="bookingPhone" name="phone">
				<div id="bookingPhoneError" class="error"></div>
			</div>
			<div class="form-group">
				<label for="numPax">Number of pax:</label>
				<input type="number" id="numPax" name="numPax" min="1" max="5" value="1">
				<div id="numPaxError" class="error"></div>
			</div>
		   
			<div class="form-group">
				<label for="serviceType"><b>Service Type:</b></label>
					<ul class="no-bullets"><i><b>HAIR:</b></i><br>
					<li><input type="checkbox" name="serviceType[]" value="Hair Cut"> Hair Cut </li>
					<li><input type="checkbox" name="serviceType[]" value="Hair Coloring"> Hair Coloring </li>
					<li><input type="checkbox" name="serviceType[]" value="Hair Treatment"> Hair Treatment </li></ul>
					<ul class="no-bullets"><i><b>FACIAL:</b></i><br>
					<li><input type="checkbox" name="serviceType[]" value="Classic Facial"> Classic Facial </li>
					<li><input type="checkbox" name="serviceType[]" value="Acne Facial"> Acne Facial </li>
					<li><input type="checkbox" name="serviceType[]" value="HydraFacial"> HydraFacial </li>
					<li><input type="checkbox" name="serviceType[]" value="Brightening Facial"> Brightening Facial </li>
					<li><input type="checkbox" name="serviceType[]" value="HydraBrightening Facial"> HydraBrightening Facial </li>
					<li><input type="checkbox" name="serviceType[]" value="AntiAging Facial"> AntiAging Facial </li></ul>
					<ul class="no-bullets"><i><b>MANICURES/PEDICURES:</b></i><br>
					<li><input type="checkbox" name="serviceType[]" value="Manicures"> Manicures </li>
					<li><input type="checkbox" name="serviceType[]" value="Pedicures"> Pedicures </li>
					<li><input type="checkbox" name="serviceType[]" value="Manicures And Pedicures"> Manicures And Pedicures</li></ul>
					<ul class="no-bullets"><i><b>MASSAGE:</b></i><br>
					<li><input type="checkbox" name="serviceType[]" value="Foot Massage"> Foot Massage </li>
					<li><input type="checkbox" name="serviceType[]" value="Back Massage"> Back Massage </li>
					<li><input type="checkbox" name="serviceType[]" value="Head Massage"> Head Massage </li></ul>
					<div id="serviceTypeError" class="error"></div>
			</div>
			
			<br>
			<div class="form-group">
				<label for="bookingDate">Preferred Date:</label>
				<!-- Set the default value -->
				<?php
					// Check if the date is submitted and not empty
					$defaultDate = isset($_POST['booking-date']) ? $_POST['booking-date'] : '';

					// Get the current date
					$currentDate = date("Y-m-d");
				?>
				<input type="date" id="bookingDate" name="booking-date" value="<?php echo $defaultDate; ?>" min="<?php echo $currentDate; ?>">
				<!-- Error message display -->
				<div id="bookingDateError" class="error"></div>
			</div>

			<div class="form-group">
				<label for="time">Preferred Time:</label>
				<select id="time" name="time">
					<option value="" selected disabled>Please choose a time</option>
					<option value="9:00 AM">9:00am</option>
					<option value="10:00 AM">10:00am</option>
					<option value="11:00 AM">11:00am</option>
					<option value="12:00 PM">12:00pm</option>
					<option value="1:00 PM">1:00pm</option>
					<option value="2:00 PM">2:00pm</option>
					<option value="3:00 PM">3:00pm</option>
					<option value="4:00 PM">4:00pm</option>
					<option value="5:00 PM">5:00pm</option>
					<option value="6:00 PM">6:00pm</option>
					<option value="7:00 PM">7:00pm</option>
				</select>
				<div id="timeError" class="error"></div>
			</div>
			<div class="form-group">
				<label for="bookingMessage">Additional Message:</label>
				<textarea id="bookingMessage" name="booking-message" rows="3" cols="3"></textarea>
			</div>
			<div class="button-container">
				<input type="button" value="Confirm" class="styled-button" onclick="validateAndSubmit()">
			</div>
			</div>
		</form>
	</div>
	<script>
		function validateAndSubmit() {
			var isValid = validationForm();
			if (!isValid) {
				return; // Prevent form submission if validation fails
			}
			// Display alert message
			window.alert("Thank you for choosing us.\nNote that no change can be made. \nFeel free to contact us if you wish to make any changes!");
			
			// Form submission logic here
			document.getElementById("serviceBookingForm").submit();
		}

		function validationForm() {
			var isValid = true;
			var form = document.getElementById('serviceBookingForm');
			
			// Clear previous error messages
			document.querySelectorAll('.error').forEach(function (error) {
				error.textContent = '';
			});

			// Validate name
			if (form['bookingName'].value.trim() === '') {
				document.getElementById('bookingNameError').textContent = 'Name is required.';
				isValid = false;
			}

			// Validate email
			if (form['bookingEmail'].value.trim() === '') {
				document.getElementById('bookingEmailError').textContent = 'Email is required.';
				isValid = false;
			} else if (!(/^\S+@\S+\.\S+$/.test(form['bookingEmail'].value))) {
				document.getElementById('bookingEmailError').textContent = 'Email is not valid.';
				isValid = false;
			}

			// Validate phone number
			if (form['bookingPhone'].value.trim() === '') {
				document.getElementById('bookingPhoneError').textContent = 'Phone number is required.';
				isValid = false;
			} else if (!/^\d+$/.test(form['bookingPhone'].value)) {
				document.getElementById('bookingPhoneError').textContent = 'Phone number must be numeric.';
				isValid = false;
			}
			
			// Validate number of pax
			var numPax = parseInt(form['numPax'].value);
			if (isNaN(numPax) || numPax < 1 || numPax > 5) {
				document.getElementById('numPaxError').textContent = 'Number of pax must be between 1 and 5.';
				isValid = false;
			}

			// Validate service type
			var serviceTypes = form.querySelectorAll('input[name="serviceType[]"]:checked');
			if (serviceTypes.length === 0) {
				document.getElementById('serviceTypeError').textContent = 'Please select at least one service type.';
				isValid = false;
			}

			// Validate preferred date
			var bookingDateInput = document.getElementById('bookingDate');
			var bookingDateValue = bookingDateInput.value.trim();

			if (bookingDateValue === '') {
				document.getElementById('bookingDateError').textContent = 'Preferred date is required.';
				isValid = false;
			} else {
				// Convert the selected date string to a Date object
				var selectedDate = new Date(bookingDateValue);
				
				// Get today's date
				var currentDate = new Date();

				// Compare the selected date with today's date
				if (selectedDate <= currentDate) {
					document.getElementById('bookingDateError').textContent = 'Please select a valid date.';
					isValid = false;
				} else {
					// Clear any previous error messages
					document.getElementById('bookingDateError').textContent = '';
				}
			}

			// Validate preferred time
			if (form['time'].value.trim() === '') {
				document.getElementById('timeError').textContent = 'Preferred time is required.';
				isValid = false;
			}
			
			return isValid;
		}
	</script>
</body>
</html>
