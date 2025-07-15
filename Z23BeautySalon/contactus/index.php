<!DOCTYPE html>
<html>
<head>
	<title>Contact Us</title>
	<link rel="stylesheet" href="../style/webstyles.css">
</head>
<body>
<?php include("../includes/header.php"); ?>
<?php include("../includes/nav.php"); ?>
<h1>Contact Us</h1>
<div id="contact-form">
  <form action="contactPostMessage.php" method="post">
    <div class="form-group" id="salutationInput">
      <b>Salutation:</b><br>
      <input type="radio" id="mr" name="salutation" value="Mr">Mr
      <input type="radio" id="ms" name="salutation" value="Ms"> Ms
      <input type="radio" id="mrs" name="salutation" value="Mrs"> Mrs
      <input type="radio" id="mdm" name="salutation" value="Mdm"> Mdm<br>
      <div class="error"></div>
    </div>
    <div class="form-group" id="enquiryInput">
      <b>Type of Enquiry:</b><br>
      <input type="checkbox" name="enquiry[]" value="General Enquiry"> General Enquiry
      <input type="checkbox" name="enquiry[]" value="Complaints"> Complaints
      <input type="checkbox" name="enquiry[]" value="Suggestions"> Suggestions<br>
      <div class="error"></div>
    </div>
    <div class="form-group" id="nameInput">
      <label for="nam">Name:</label>
      <input type="text" id="nam" name="name">
      <div class="error"></div>
    </div>
    <div class="form-group" id="emailInput">
      <label for="email">E-mail:</label>
      <input type="email" id="email" name="email">
      <div class="error"></div>
    </div>
    <div class="form-group" id="phoneInput">
      <label for="phone">Phone Number:</label>
      <input type="tel" id="phone" name="phone">
      <div class="error"></div>
    </div>
    <div class="form-group" id="subjectInput">
      <label for="message">Subject:</label>
      <textarea id="message" name="message" rows="6"></textarea>
      <div class="error"></div>
    </div>
    <div class="checkbox-group">
      <input type="checkbox" id="subscribe" name="subscribe">
      <label for="subscribe">Subscribe to Newsletter</label>
    </div>
    <br>
    <input type="submit" value="Submit">
  </form>
</div>

<?php include("../includes/footer.php"); ?>
<script src="validation.js"></script>
</body>
</html>