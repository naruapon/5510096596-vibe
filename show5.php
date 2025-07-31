<?php
// เชื่อมต่อฐานข้อมูลแบบ PDO
$servername = "mysql"; // service name จาก docker-compose
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
        body {
            background: linear-gradient(120deg, #f6d365, #fda085);
            min-height: 100vh;
        }
        .table-container {
            max-width: 850px;
            margin: 3em auto;
            background: #ffffff;
            border-radius: 15px;
            padding: 2em;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        h2 {
            text-align: center;
            margin-bottom: 1.5em;
            color: #673ab7;
        }
        .table thead th {
            background: #673ab7;
            color: #fff;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(103,58,183,0.05);
        }
        .table-striped tbody tr:nth-of-type(even) {
            background-color: rgba(0,150,136,0.05);
        }
        @media (max-width: 576px) {
            .table-container { padding: 1em; }
            table { font-size: 0.9em; }
        }
    </style>
</head>
<body>
    <div class="table-container">
        <h2>รายชื่อผู้ใช้</h2>
        <?php if (!empty($result)) : ?>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover align-middle text-center">
                    <thead>
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
