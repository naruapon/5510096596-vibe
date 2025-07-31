<?php 
 
	$gender = $_POST["gender"];
	echo $gender;
	echo "<br>";

	 
	$name = $_POST["name"]; 
	echo $name;
	echo "<br/>";

	$province = $_POST["province"]; 
	echo $province; 
	echo "<br/>";

	$myfcolor = $_POST["myfcolor"]; 
	echo $myfcolor;
	echo "<br/>"; 

	$size = $_POST["size"];
	echo "ขนาด :".$size;
	echo "<br/>"; 
	
	$mobile_number = $_POST["mobile_number"]; 
    echo $mobile_number; 
	echo "<br/>";
	
	$pwd = $_POST["pwd"];
	echo $pwd;
	echo "<br/>";

	$intro = $_POST["intro"];
	echo $intro;
	echo "<br/>";

	echo "<font color=\"$myfcolor\" size=\"$size\">$name</font>";
	setcookie('city',$_POST["province"],time()+60);
	echo "<a href=\"cookie.php\">ดูค่า Cookie</a>";


	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "shop";

	// Create connection
	$conn = new mysqli($servername, $username, $password,$dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	echo "Connected successfully";
	mysqli_set_charset($conn, "utf8");
	
    //$sql = "INSERT INTO user (suuid, sugender, suname, suprovince, sumyfcolor, susize, sumobile_number, supwd, suintro) VALUES (NULL, 'male', 'สมชาย', 'กาญจนบุรี', '#00ff00', '5', '0851243652', '5555', 'สวัสดี')";
	$sql = "INSERT INTO user (suuid, sugender, suname, suprovince, sumyfcolor, susize, sumobile_number, supwd, suintro) VALUES (NULL, '$gender', '$name', '$province', '$myfcolor', '$size', '$mobile_number', '$pwd', '$intro')";
	
	if ($conn->query($sql) === TRUE) {
		echo "Database created successfully";
	} else {
		echo "Error creating database: " . $conn->error;
	}
	
	$conn->close();
 
?>