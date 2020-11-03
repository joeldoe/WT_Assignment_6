<?php include 'header.php' ?>

<div class="show-data">
	<?php

	if(isset($_REQUEST['table']))
	{
		$table = json_decode($_REQUEST['table']);

		if($table)
		{
			echo "<h2 class='sub-heading'>Registrations</h2>";
			echo "<hr style='width: 50%'>";

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

			echo "
			<table align='center' class='records-table'>
			<thead>
			<tr>
				<th>No.</th>
				<th>Name</th>
				<th>Email</th>
				<th>Age</th>
				<th>Experience</th>
				<th>Update</th>
				<th>Delete</th>
			</tr>
			</thead>
			<tbody>
		";
		foreach ($table as $record_no => $record) 
		{
			echo "<tr>";
			foreach ($record as $key => $value) 
			{
				if($key == 0) $no = $table[$record_no][$key];
				echo "<td>$value</td>";
			}
			echo "<td>
					  <button><a href='update.php?request=update_record&cont_no=$no' id='update-btn'>Update</a></button>
					  </td>
					  ";
			echo "<td>
					<button id='delete-btn' onclick='delete_confirmation($no);'>Delete</button>
				</td>";
			echo "</tr>";
		}
		
		echo "
			</tbody>
			</table>";			
		}
		else
		{
			echo "<h2 class='sub-heading'>Registrations</h2>";
			echo "<hr style='width: 50%'>";
			echo "<h3>No registrations yet!</h3>";
		}
		
	}
	else
	{
		header("Location: controller.php?request=all_records");
	}

	?>

</div>
<?php include 'footer.php' ?>