<!DOCTYPE html>
<html>
<head>
    <title>Thank you!</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../style/webstyles.css">
</head>

<body>
    <div class="service-details">
	
		<div class="head">
			<span class="icon">
                <i class="fa fa-heart"></i>
            </span>
			<h2>Thank you for choosing us!</h2>
		</div>
        <p><center>Your service details are:</center></p>
        <div class="order-details">
            <p>Name: <?php echo $_GET['name']; ?></p>
            <p>Email: <?php echo $_GET['email']; ?></p>
            <p>Phone: <?php echo $_GET['phone']; ?></p>
			<p>Number of Pax: <?php echo $_GET['numPax']; ?></p>
            <p>Service Type: 
				<?php 
				if (isset($_GET['serviceType']) && is_array($_GET['serviceType']) && count($_GET['serviceType']) > 0) {
					echo implode(', ', $_GET['serviceType']);
				} else {
					echo 'None selected';
				}
				?>
			</p>

			</p>
            <p>Date: <?php echo $_GET['date']; ?></p>
            <p>Time: <?php echo $_GET['time']; ?></p>
            <p>Message: <?php echo $_GET['message']; ?></p>
        </div>
		
		<div class="button-container">
            <input type="button" class="styled-button" onclick="window.location.href='../index.php'" value="Done">
        </div>
    </div>
</body>
</html>
