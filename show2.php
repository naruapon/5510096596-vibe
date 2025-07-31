<?php
// เชื่อมต่อฐานข้อมูล
$servername = "mysql"; // ใช้ชื่อ service จาก docker-compose.yml
$username = "user";
$password = "password";
$dbname = "shop";

$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

mysqli_set_charset($conn, "utf8");

// ดึงข้อมูลจากตาราง user
$sql = "SELECT suuid, suname, suprovince FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1' style='width:100%; text-align:center;'>";
    echo "<tr><th>ID</th><th>Username</th><th>Province</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["suuid"] . "</td>";
        echo "<td>" . $row["suname"] . "</td>";
        echo "<td>" . $row["suprovince"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "ไม่มีข้อมูลในตาราง";
}

$conn->close();
?>
