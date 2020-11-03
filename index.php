<?php include 'header.php' ?>

<div class="home">
	<h2 class="sub-heading">Congrats and welcome to the Level-2 auditions!</h2>
	<hr style="width: 50%">

	<?php
	if(isset($_REQUEST['total'])) echo "<h4>Total registrations till now: ".$_REQUEST['total']."</h4>";
	else header("Location: controller.php?request=total_registrants");
	?>
	
</div>

<?php include 'footer.php' ?>