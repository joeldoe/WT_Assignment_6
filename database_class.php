<?php

//require 'credentials.php';

class Contestant
{
	private $conn;
	private $hostname = 'localhost';
	private $username = 'root';
	private $password =  '';
	private $database = 'assignments';


	function __construct()
	{
		$this->conn = mysqli_connect($this->hostname,$this->username,$this->password,$this->database);
	}

	public function add_record($cont_no,$name,$email,$age,$exp)
	{
		$query = "insert into contestants values('$cont_no','$name','$email','$age','$exp')";
		$execute = mysqli_query($this->conn,$query);
		return $execute;
	}

	public function get_record($cont_no)
	{
		$i = 0;
		$query = "select * from contestants where Contestant_no = '$cont_no'";
		$execute = mysqli_query($this->conn,$query);

		if($execute)
		{
			while($rows = mysqli_fetch_array($execute))
			{
				$i++;
			}
		}
		return $i;
	}

	public function get_total_registrations()
	{
		$i = 0;
		$query = "select * from contestants";
		$execute = mysqli_query($this->conn,$query);

		if($execute)
		{
			while($rows = mysqli_fetch_array($execute))
			{
				$i++;
			}
		}
		return $i;	
	}

	public function get_table()
	{
		$i = 0;
		$table = array();
		$query = "select * from contestants";
		$execute = mysqli_query($this->conn,$query);

		if($execute)
		{
			while($rows = mysqli_fetch_array($execute))
			{
				$table[$i] = array($rows['Contestant_no'],$rows['Name'],$rows['Email'],$rows['Age'],$rows['Experience']);
				$i++;
			}
			return json_encode($table);
		}
		else return "Table not found";
	}

	public function get_registration_details($cont_no)
	{
		$i = 0;
		$record = array();
		$query = "select * from contestants where Contestant_no = '$cont_no'";
		$execute = mysqli_query($this->conn,$query);

		if($execute)
		{
			while($rows = mysqli_fetch_array($execute))
			{
				$record[$i] = array($rows['Contestant_no'],$rows['Name'],$rows['Email'],$rows['Age'],$rows['Experience']);
				$i++;
			}
			return json_encode($record);
		}
		else return "Record not found!";
	}

	public function update_record($cont_no,$name,$email,$age,$exp)
	{
		$query = "update contestants set Contestant_no='$cont_no',Name='$name',Email='$email',Age='$age',Experience='$exp' where Contestant_no='$cont_no'";
		$execute = mysqli_query($this->conn,$query);
		return $execute;
	}

	public function delete_record($cont_no)
	{
		$query = "delete from contestants where Contestant_no='$cont_no'";
		$execute = mysqli_query($this->conn,$query);
		return $execute;
	}
}

?>