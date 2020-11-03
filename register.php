<?php include 'header.php' ?>

<div class="register">
	<h2 class="sub-heading">Fill the details</h2>
	<hr style="width: 50%">
	
	<?php  

	if(isset($_REQUEST['status']))
	{
		$status = $_REQUEST['status'];
		if($status == "OK")
		{
			echo "<p id='".$status."'>".$_REQUEST['msg']."</p>";
		}
		else
		{
			echo "<p id='".$status."'>".$_REQUEST['msg']."</p>";
		}
	}

	?>
	
	<form action="controller.php" method="POST">
	<table align="center" class="form-table" cellpadding="5px" cellspacing="2px">
		<tr>
			<td>
				Contestant no.(Level-1):
			</td>
			<td>
				<input type="text" name="cont_no">
			</td>
		</tr>
		<tr>
			<td>
				<label>Name:</label>
			</td>
			<td>
				<input type="text" name="name">
			</td>
		</tr>
		<tr>
			<td>
				<label>Email ID:</label>
			</td>
			<td>
				<input type="email" name="email">
			</td>
		</tr>
		<tr>
			<td>
				<label>Age:</label>
			</td>
			<td>
				<input type="text" name="age">
			</td>
		</tr>
		<tr>
			<td>
				<label>Experience (mnths):</label>
			</td>
			<td>
				<input type="text" name="exp">
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="submit" name="request" value="Register" style="padding: 4%; margin: 2px;">
				<input type="reset" name="reset" value="Clear" style="padding: 4%; margin: 2px;">
			</td>
		</tr>
	</table>
	</form>
</div>

<?php include 'footer.php' ?>