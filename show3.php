<?php
// เชื่อมต่อฐานข้อมูลแบบ PDO
$servername = "mysql"; // ใช้ชื่อ service จาก docker-compose.yml
$username = "user";
$password = "password";
$dbname = "shop";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // ดึงข้อมูลจากตาราง user
    $sql = "SELECT suuid, suname, suprovince FROM user";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($result) > 0) {
        echo "<table border='1' style='width:100%; text-align:center;'>";
        echo "<tr><th>ID</th><th>Username</th><th>Province</th></tr>";
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["suuid"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["suname"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["suprovince"]) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "ไม่มีข้อมูลในตาราง";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
