<?php
	include '../config.php';

	$sql = "DELETE FROM digi_calculation";
	$conn->query($sql);

	header('location:dashboard.php');
?>