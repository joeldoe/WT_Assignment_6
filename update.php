<?php include 'header.php'; 
	  require 'database_class.php';
?>

<div class="register">
	<h2 class="sub-heading">Update the record</h2>
	<hr style="width: 50%">

	<?php
		if(isset($_REQUEST['cont_no']))
		{
			$cont_no = $_REQUEST['cont_no'];
		}
		else
		{
			$cont_no = null;
		}

		if(isset($_REQUEST['request']))
		{
			$req = $_REQUEST['request'];

			if($req == 'Update')
			{
				$contestant = new Contestant;	
				$cont_no = $_REQUEST['cont_no'];
				$name = $_REQUEST['name'];
				$email = $_REQUEST['email'];
				$age = $_REQUEST['age'];
				$exp = $_REQUEST['exp'];
    			$output = $contestant->update_record($cont_no,$name,$email,$age,$exp);

    			if($output)
    			{
		    		$status = "OK";
   		   			$msg = "Updated successfully!";
        		}
    			else
    			{
    				$status = "ERROR";
    				$msg = "Update failed!";
    			}	
    			if($status == "OK")
				{
					echo "<p id='".$status."'>".$msg."</p>";
				}
				else
				{
					echo "<p id='".$status."'>".$msg."</p>";
				}
				$cont_no = null;
    		}
		}
	?>

	<form action="update.php" method="POST">
	<table align="center" class="form-table" cellpadding="5px" cellspacing="2px">
		<tr>
			<td>
				Contestant no.(Level-1):
			</td>
			<td>
				<input type="text" name="cont_no" value="<?php echo($cont_no) ?>">
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
				<input type="submit" name="request" value="Update" style="padding: 4%; margin: 2px;">
				<input type="reset" name="reset" value="Clear" style="padding: 4%; margin: 2px;">
			</td>
		</tr>
	</table>
	</form>
</div>
<?php include 'footer.php'; ?>