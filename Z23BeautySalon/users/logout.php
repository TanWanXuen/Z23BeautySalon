<?php
session_start();

session_destroy();

header("Location: /Z23BeautySalon/index.php");
exit();
?>
