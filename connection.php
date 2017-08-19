<?php
	$connection = mysqli_connect('localhost', 'root', '');
	#Check connection
	if(!$connection){
		die("connection failed: " . mysqli_connect_error()) ;
	}
	echo "Connected successfully<br>";

	#Create database
	$database = "CREATE DATABASE IF NOT EXISTS profile";
	if (mysqli_query($connection, $database)) {
		# code...
		echo "Database created successfully<br>";
	}
	else {
		echo "Error creating database" . mysqli_error($connection);
	}

	#Create table
	$table = "CREATE TABLE IF NOT EXISTS details (
	id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	 name VARCHAR (30) NOT NULL,
	 email VARCHAR (50) NOT NULL,
	 work VARCHAR (50) NOT NULL)";

	mysqli_select_db($connection,"profile");
	 if(mysqli_query($connection, $table)){
	 	echo "Table created succesfully";
	 }
	 else {
	 	echo "Error creating table" . mysqli_error($connection);
	 }

	 #Insert into database
	 $result = mysqli_query($connection, "SELECT * FROM details");
	 if(!$result){
	 	die("Database result failed: " . mysqli_error($connection));
	 }

	 $name = $_POST["name"];
	 $email = $_POST["email"];
	 $work = $_POST["work"];
	 $insert = "INSERT INTO details (name,email,work)
	 			VALUES('".$name."','".$email."','".$work."')";
	 if(mysqli_query($connection, $insert)) {
	 	echo "<h2>"."Your Details have been Successfully added to Database."."</h2>";
	 }
	 else {
	echo "Error".mysql1_error($connection);
	}

	mysqli_close($connection);

?>
<div>
  <form action="home.php" method="post" enctype="multipart/form-data">
    <input type="submit" value="Home" />
  </form>
</table>
</div>