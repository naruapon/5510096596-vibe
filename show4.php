<?php
// เชื่อมต่อฐานข้อมูลแบบ PDO
$servername = "mysql";
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
} catch (PDOException $e) {
    die("<div style='color:red;text-align:center;margin-top:2em;'>Connection failed: " . htmlspecialchars($e->getMessage()) . "</div>");
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แสดงข้อมูลผู้ใช้</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f8f9fa; }
        .table-container { max-width: 700px; margin: 3em auto; box-shadow: 0 2px 8px rgba(0,0,0,0.08); background: #fff; border-radius: 12px; padding: 2em; }
        h2 { text-align: center; margin-bottom: 1.5em; color: #0d6efd; }
        @media (max-width: 576px) {
            .table-container { padding: 1em; }
            table { font-size: 0.95em; }
        }
    </style>
</head>
<body>
    <div class="table-container">
        <h2>รายชื่อผู้ใช้</h2>
        <?php if (!empty($result)) : ?>
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle text-center">
                    <thead class="table-primary">
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Province</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $row): ?>
                            <tr>
                                <td><?= htmlspecialchars($row["suuid"]) ?></td>
                                <td><?= htmlspecialchars($row["suname"]) ?></td>
                                <td><?= htmlspecialchars($row["suprovince"]) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="alert alert-warning text-center">ไม่มีข้อมูลในตาราง</div>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
