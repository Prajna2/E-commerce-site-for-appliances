<?php include 'connection.php';?>

<?php

$conn->select_db("miniproject");

echo "db selected";


	echo "function call";
	$pid=$_POST["pid"];
	//"Redmi Note8-Blue Color"
	$name=$_POST["name"];
	$quantity=1;
	$name = str_replace('_', ' ', $name);
	$sql = "INSERT INTO cart (pid, name, quantity) VALUES ('$pid', '$name', '$quantity')";

	if (mysqli_query($conn, $sql)) {
	  echo "New record created successfully";
	  header("location:proj.html");
	}
	else {
	  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
	

?>