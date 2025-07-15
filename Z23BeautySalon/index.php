<!DOCTYPE html>
<html>
<head>
	<title>Z23 Beauty Salon</title>
	<link rel="stylesheet" href="style/webstyles.css">
</head>
<body>
<?php include('includes/header.php'); ?>
<?php include('includes/nav.php'); ?>

<div class="login-container">
	<?php include("users/login.php")?>
</div>
<br>

<?php
    // Check if welcome message is set in session
    if(isset($_SESSION['welcome_message'])){
        echo "<h1>" . $_SESSION['welcome_message'] . "</h1>";
        // Unset the welcome message after displaying it to avoid displaying it again
        unset($_SESSION['welcome_message']);
    }
?>

<div class="aboutUs">
	<div class="overlay">
	<h3>ABOUT US:</h3>
	<p>Your beauty is our priority. We started small as a family back in 2001 with the goal of allowing everyone to become the best versions of themselves.</p>
	<h3>OUR VISION:</h3>
	<p>To help everybody channel their inner beauty and transform it into a profound confidence. We also see ourselves as a save space with no judgement for men and women alike.</p>
	<h3>OUR MISSION: </h3>
	<p>We aim to empower men and women alike with their beauty. We want them to thrive in confidence and feel comfortable in their own skin.</p>
	</div>
</div>

<div class="ourSalon">
	<h2>Our Salon: </h2>
	<div class="row">
	  <div class="column">
		<img src="photos/salon.png" alt="Waiting Area" onclick="enlarge(this);">
	  </div>
	  <div class="column">
		<img src="photos/feetMassage.jpg" alt="Foot Massages" onclick="enlarge(this);">
	  </div>
	  <div class="column">
		<img src="photos/spaRoom.jpg" alt="Facial Room" onclick="enlarge(this);">
	  </div>
	  <div class="column">
		<img src="photos/maniPedi.jpeg" alt="Manicure and Pedicures" onclick="enlarge(this);">
	  </div>
	</div>

	<!-- The expanding image container -->
	<div class="container">
	  <!-- Close the image -->
	  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>

	  <!-- Expanded image -->
	  <img id="expandedImg" style="width:100%">

	  <!-- Image text -->
	  <div id="imgtext"></div>
	</div>

	<script>
		function enlarge(imgs) {
			// Get the expanded image
			var expandImg = document.getElementById("expandedImg");
			// Get the image text
			var imgText = document.getElementById("imgtext");
			// Use the same src in the expanded image as the image being clicked on from the grid
			expandImg.src = imgs.src;
			// Use the value of the alt attribute of the clickable image as text inside the expanded image
			imgText.innerHTML = imgs.alt;
			// Show the container element (hidden with CSS)
			expandImg.parentElement.style.display = "block";
		}
	</script>
</div>

<br>
<div class="location">
	<div class="row">
		<div class="columnLocation">
			<img src="photos/location.png" width="350px" height="350px">
		</div>
		<div class="columnLocation">
			<h3>Opening Hours:</h3>
			<p>9:00 am - 9:00 pm</p>
			<h3>Contact Us:</h3>
			<p>012-7389779</p>
			<h3>Location:</h3>
			<p>Sungai Long,</p> 
			<p>23 GR FL, Persiaran SL3/2,</p> 
			<p>Bandar Sungai Long,</p> 
			<p>43000 Kajang, Selangor</p>
		
		</div>
	</div>
</div>

</div>

<?php include('includes/footer.php'); ?>
</br> 
</body>
</html>