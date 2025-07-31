<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Edit Page</title>
</head>
<body>
<?php
     $suid = $_GET["suid"];
     //echo $keyword;
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "shop";
 
    //echo $suid;

     // Create connection
     $conn = new mysqli($servername, $username, $password,$dbname);
 
     // Check connection
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     }
     //echo "Connected successfully";
     mysqli_set_charset($conn, "utf8");
     
     $sql = "SELECT * FROM user where suuid='$suid' ";
     $result = $conn->query($sql);

     if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // echo "<br/>";
            // echo $row["suuid"];
            $guid = $row["suuid"];
            // echo "<br/>";
            // echo $row["sugender"];
            $ggender = $row["sugender"];
            // echo "<br/>";
            // echo $row["suname"];
            $guname = $row["suname"];
            // echo "<br/>";
            // echo $row["suprovince"];
            $gprovince = $row["suprovince"];
            // echo "<br/>";
            // echo $row["sumyfcolor"];
            $gmyfcolor = $row["sumyfcolor"]; 
            // echo "<br/>";
            // echo $row["susize"];
            $gsize = $row["susize"];
            // echo "<br/>";
            // echo $row["sumobile_number"];
            $gmobile_number = $row["sumobile_number"];
            // echo "<br/>";
            // echo $row["supwd"];
            $gpwd = $row["supwd"];
            // echo "<br/>";
            // echo $row["suintro"];
            $gintro = $row["suintro"];
            // echo "<br/>";
        }
     }

    //  echo $guid;
    //  echo "<br/>";
    //  echo $ggender;
    //  echo "<br/>"; 
    //  echo $guname;
    //  echo "<br/>";   
    //  echo $gprovince;
    //  echo "<br/>"; 
    //  echo $gmyfcolor;
    //  echo "<br/>"; 
    //  echo $gsize;
    //  echo "<br/>"; 
    //  echo $gmobile_number;
    //  echo "<br/>";  
    //  echo $gpwd;
    //  echo "<br/>";   
    //  echo $gintro;
    //  echo "<br/>"; 
    echo "<center><h2>แก้ไขข้อมูลสมาชิกรหัส ".$suid."</h2></center>";
    echo "<form method=\"post\" action=\"update.php\">";
    echo "เพศ : <br />";
    if($ggender=="male"){
        echo"<input type=\"radio\" name=\"gender\" value=\"male\" checked> ชาย<br>";
        echo"<input type=\"radio\" name=\"gender\" value=\"female\" > หญิง<br>";
        echo"<input type=\"radio\" name=\"gender\" value=\"other\"> อื่นๆ <br>";
    }else if($ggender=="female"){
        echo"<input type=\"radio\" name=\"gender\" value=\"male\" > ชาย<br>";
        echo"<input type=\"radio\" name=\"gender\" value=\"female\" checked > หญิง<br>";
        echo"<input type=\"radio\" name=\"gender\" value=\"other\"> อื่นๆ <br>";
    }else {
        echo"<input type=\"radio\" name=\"gender\" value=\"male\" > ชาย<br>";
        echo"<input type=\"radio\" name=\"gender\" value=\"female\"  > หญิง<br>";
        echo"<input type=\"radio\" name=\"gender\" value=\"other\" checked> อื่นๆ <br>";       
    }
    echo "ชื่อ : <br />";
    echo"<input type=\"text\" name=\"name\" value=\"$guname\" placeholder=\"กรุณาพิมพ์ภาษาอังกฤษ\" /><br />";
    echo "จังหวัด : <br />";
    echo"<select name=\"province\">";
    if($gprovince=="กาญจนบุรี"){
        echo"<option value=\"กาญจนบุรี\"selected>Kanchanaburi</option>";
        echo"<option value=\"นครปฐม\" >Nakhon Pathom</option>";
    }else{
        echo"<option value=\"กาญจนบุรี\" >Kanchanaburi</option>";
        echo"<option value=\"นครปฐม\" selected>Nakhon Pathom</option>";
    }
    echo"</select> <br />";



    echo "<input type=\"submit\" value=\"อัพเดทข้อมูล\">";
    echo "</form>";
?>
</body>
</html>