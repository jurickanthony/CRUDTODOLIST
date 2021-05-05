<?php

class Functions
{
	private $servername = "localhost";
	private $username   = "root";
	private $password   = "";
	private $database   = "mylist";
	public  $con;


	// Database Connection 
	public function __construct()
	{
		$this->con = new mysqli($this->servername, $this->username, $this->password, $this->database);
		if (mysqli_connect_error()) {
			trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
		} else {
			return $this->con;
		}
	}

	// Insert customer data into customer table
	public function insertData($post)
	{
		$task = $this->con->real_escape_string($_POST['task']);
		$query = "INSERT INTO todolist(task) VALUES('$task')";
		$sql = $this->con->query($query);
		if ($sql == true) {
			header("Location:index.php?msg1=insert");
		} else {
			echo "Registration failed try again!";
		}
	}



	// Fetch customer records for show listing
	public function displayData()
	{
		$query = "SELECT * FROM todolist";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		} else {
			echo "Please Enter First Data";
		}
	}

	// Fetch single data for edit from customer table
	public function displyaRecordById($id)
	{
		$query = "SELECT * FROM todolist WHERE id = '$id'";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		} else {
			echo "Record not found";
		}
	}

	// Update customer data into customer table
	public function updateRecord($postData)
	{
		$task = $this->con->real_escape_string($_POST['task']);
		$id = $this->con->real_escape_string($_POST['id']);
		if (!empty($id) && !empty($postData)) {
			$query = "UPDATE todolist SET task = '$task'WHERE id = '$id'";
			$sql = $this->con->query($query);
			if ($sql == true) {
				header("Location:index.php?msg2=update");
			} else {
				echo "Registration updated failed try again!";
			}
		}
	}




	public function displayDeleteData()
	{
		$query = "SELECT * FROM trash";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		} else {
			echo "Please Enter First Data";
		}
	}


	public function deleteRecord($id,$task){
		$query1 = "INSERT INTO trash(task) select task from todolist where id=$id";
		$sql1 = $this->con->query($query1);
		$query = "DELETE FROM todolist WHERE id = '$id'";
		$sql = $this->con->query($query);
		if ($sql == true) {
			header("Location:index.php?msg3=delete");
		} else {
			echo "Record does not delete try again";
		}
	}

	public function deleteTrashTask($id){
		$query = "DELETE FROM trash WHERE trash_id = '$id'";
		$sql = $this->con->query($query);
		if ($sql == true) {
			header("Location:trash.php?msg3=delete");
		} else {
			echo "Record does not delete try again";
		}

	}
}
