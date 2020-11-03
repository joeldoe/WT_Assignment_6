<?php
require 'database_class.php';

var_dump($_REQUEST);
if(isset($_REQUEST['request']))
{
	$req = $_REQUEST['request'];
	var_dump($_REQUEST);
	try
	{
		$contestant = new Contestant;	
	}
	catch(Exception $e)
	{
		print_r("Error occurred: $e->getMessage()");
	}
}
else
{
	$req = null;
}

switch ($req) {
	case 'Register': try
					 {
					 	$cont_no = $_REQUEST['cont_no'];
					 	$name = $_REQUEST['name'];
					 	$email = $_REQUEST['email'];
					 	$age = $_REQUEST['age'];
					 	$exp = $_REQUEST['exp'];

					 	$exists = $contestant->get_record($cont_no);
					 	if($exists)
					 	{
					 		$status = "ERROR";
					 		$msg = "Contestant no. $cont_no has already registered!";
					 		$url = "Location: register.php?status=$status&msg=$msg";
					 	}
					 	else
					 	{
					 		$output = $contestant->add_record($cont_no,$name,$email,$age,$exp);
					 		if($output)
					 		{
						 		$status = "OK";
					 			$msg = "Registered successfully!";
					 			$url = "Location: register.php?status=$status&msg=$msg";
					 		}
					 		else
					 		{
					 			$status = "ERROR";
					 			$msg = "Registration failed!";
					 			$url = "Location: register.php?status=$status&msg=$msg";
					 		}
					 	}
					 	header($url);
					 }
					 catch(Exception $e)
					 {
					 	print_r("Error occurred in adding record: $e->getMessage()");
					 }
					 break;

	case 'total_registrants': $total = $contestant->get_total_registrations();
							  $url = "Location: index.php?total=$total";
							  header($url);
							  break;

	case 'all_records': $records = $contestant->get_table();
						$url = "Location: showdata.php?table=$records";
						header($url);
					    break;	

    case 'update_record': $cont_no = $_REQUEST['cont_no'];
    					  $url = "Location: update.php?cont_no=$cont_no";
    					  header($url);
    					  break;

    case 'delete_record': try
    					  {
    					  	$cont_no = $_REQUEST['cont_no'];
    					  	$output = $contestant->delete_record($cont_no);
    					  	if($output)
    					  	{
    					   		$status = "OK";
    			   				$msg = "Deleted successfully!";
    			   				$url = "Location: showdata.php?status=$status&msg=$msg";
    					  	}
    					  	else
    			   		  	{
    			   				$status = "ERROR";
    			   				$msg = "Deletion failed!";
    			   				$url = "Location: showdata.php?status=$status&msg=$msg";	
    			   		  	}
    					  	header($url);
    					  }
    					  catch(Exception $e)
    					  {
    					  	print_r("Error occurred in adding record: $e->getMessage()");
    					  }
    					  break;

	default: echo "Invalid request!";
			 break;
}
?>