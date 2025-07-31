<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Form Test</title>
</head>
<body>
<center>
<form action="/5510096596/search.php" method="post">
ค้นหา: <br /><br />
<input type="text" name="keywordname" placeholder="ข้อความที่จะค้นหา" /><br /><br />
<input type="submit" value="ค้นหาข้อมูล" />
<input type="reset" value="เคลียร์" />
</form>
</center>
<?php
     $keyword = $_POST["keywordname"];
     //echo $keyword;
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
     //echo "Connected successfully";
     mysqli_set_charset($conn, "utf8");

     echo "<table style=\"width:100%\" cellspacing=\"0\" bgcolor=\"#ccccff\">";
    echo"<tr>";
      echo"<th> ID </th>";
      echo"<th> Username </th>";
      echo"<th> Province</th>";
      echo"<th> Edit</th>";
    echo"</tr>";

    //$sql = "SELECT suuid, suname, suprovince FROM user";
    $sql = "SELECT * FROM user where suname LIKE '%$keyword%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            //echo "id: " . $row["suuid"]. " - Name: " . $row["suname"]. "- Province " . $row["suprovince"]. "<br>";
            if($row["suuid"]%2==0){
                echo "<tr>";
                echo "<td bgcolor=\"blue\"><center><font color=\"#ffffff\"><a href=\"http://localhost/5510096596/show.php?suid=".$row["suuid"]."\">".$row["suuid"]."</a></font></center></td>";
                echo "<td bgcolor=\"#ffffcc\"><center>".$row["suname"]."</center></td>";
                echo "<td bgcolor=\"#ffffcc\"><center>".$row["suprovince"]."</center></td>";
                echo "<td bgcolor=\"#ffffcc\"><center><a href=\"http://localhost/5510096596/edit.php?suid=".$row["suuid"]."\"><img width=\"50\" height=\"50\" src=\"./img/images.png\"></a></center></td>";
                echo "</tr>";
            }else{
                echo "<tr>";
                echo "<td bgcolor=\"red\"><center><font color=\"#ffffff\"> <a href=\"http://localhost/5510096596/show.php?suid=".$row["suuid"]."\">".$row["suuid"]."</a></font></center></td>";
                echo "<td bgcolor=\"#e6f9ff\"><center>".$row["suname"]."</center></td>";
                echo "<td bgcolor=\"#e6f9ff\"><center>".$row["suprovince"]."</center></td>";
                echo "<td bgcolor=\"#e6f9ff\"><center><a href=\"http://localhost/5510096596/edit.php?suid=".$row["suuid"]."\"><img width=\"50\" height=\"50\" src=\"./img/images.png\"></a></center></td>";
                echo "</tr>"; 
            }
        }
    } else {
        echo "0 results";
    }

    echo "</table>";
	
	$conn->close();
?>
</body>
</html>