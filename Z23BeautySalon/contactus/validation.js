// Select the HTML elements needed for validation
const form = document.querySelector('form');
const salutationInput = document.getElementById('salutationInput');
const nameInput = document.getElementById('nam');
const emailInput = document.getElementById('email');
const phoneInput = document.getElementById('phone');
const enquiryInput = document.getElementById('enquiryInput');
const subjectInput = document.getElementById('subjectInput');

// Add event listener to the form for submission
form.addEventListener('submit', function(event) {
  event.preventDefault();
  const errors = [];

  // Validate the salutation type input field
  if (!salutationInput.querySelector('input[type="radio"]:checked')) {
    errors.push('Please select a salutation');
    salutationInput.lastElementChild.innerHTML = 'Please select a salutation';
    salutationInput.lastElementChild.style.color = 'red'; // set color to red
  } else {
    salutationInput.lastElementChild.innerHTML = '';
  }

  // Validate the name input field
  if (nameInput.value.trim() === '') {
    errors.push('Please enter your name');
    nameInput.nextElementSibling.innerHTML = 'Please enter your name';
    nameInput.nextElementSibling.style.color = 'red'; // set color to red
  } else {
    nameInput.nextElementSibling.innerHTML = '';
  }

  // Validate the email input field
  if (emailInput.value.trim() === '') {
    errors.push('Please enter your email address');
    emailInput.nextElementSibling.innerHTML = 'Please enter your email address';
    emailInput.nextElementSibling.style.color = 'red'; // set color to red
  } else if (!isValidEmail(emailInput.value.trim())) {
    errors.push('Please enter a valid email address');
    emailInput.nextElementSibling.innerHTML = 'Please enter a valid email address';
    emailInput.nextElementSibling.style.color = 'red'; // set color to red
  } else {
    emailInput.nextElementSibling.innerHTML = '';
  }

  // Validate the phone number input field for 9-11 digits
  if (phoneInput.value.trim() === '') {
    errors.push('Please enter your phone number');
    phoneInput.nextElementSibling.innerHTML = 'Please enter your phone number';
    phoneInput.nextElementSibling.style.color = 'red'; // set color to red
  } else if (!/^\d{9,11}$/.test(phoneInput.value.trim())) {
    errors.push('Please enter a valid phone number with 9 to 11 digits');
    phoneInput.nextElementSibling.innerHTML = 'Please enter a valid phone number with 9 to 11 digits';
    phoneInput.nextElementSibling.style.color = 'red'; // set color to red
  } else {
    phoneInput.nextElementSibling.innerHTML = '';
  }

  // Validate the enquiry type input field
  if (!enquiryInput.querySelector('input[type="checkbox"]:checked')) {
    errors.push('Please select at least one type of enquiry');
    enquiryInput.lastElementChild.innerHTML = 'Please select at least one type of enquiry';
    enquiryInput.lastElementChild.style.color = 'red'; // set color to red
  } else {
    enquiryInput.lastElementChild.innerHTML = '';
  }

  // Validate the subject input field
  if (subjectInput.querySelector('textarea').value.trim() === '') {
    errors.push('Please enter your message');
    subjectInput.lastElementChild.innerHTML = 'Please enter your message';
    subjectInput.lastElementChild.style.color = 'red'; // set color to red
  } else {
    subjectInput.lastElementChild.innerHTML = '';
  }

  // Submit the form if there are no errors
  if (errors.length === 0) {
    form.submit();
  }
});

// Function to validate email using a regular expression
function isValidEmail(email) {
  const emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
  return emailRegex.test(email);
}