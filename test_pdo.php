<?php
    $gender = $_POST["gender"];
    echo $gender . "<br>";

    $name = $_POST["name"];
    echo $name . "<br/>";

    $province = $_POST["province"];
    echo $province . "<br/>";

    $myfcolor = $_POST["myfcolor"];
    echo $myfcolor . "<br/>";

    $size = $_POST["size"];
    echo "ขนาด :" . $size . "<br/>";

    $mobile_number = $_POST["mobile_number"];
    echo $mobile_number . "<br/>";

    $pwd = $_POST["pwd"];
    echo $pwd . "<br/>";

    $intro = $_POST["intro"];
    echo $intro . "<br/>";

    echo "<font color=\"$myfcolor\" size=\"$size\">$name</font>";
    setcookie('city', $_POST["province"], time() + 60);
    echo "<a href=\"cookie.php\">ดูค่า Cookie</a>";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "shop";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("INSERT INTO user (sugender, suname, suprovince, sumyfcolor, susize, sumobile_number, supwd, suintro) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$gender, $name, $province, $myfcolor, $size, $mobile_number, $pwd, $intro]);

        echo "Database created successfully";
    } catch (PDOException $e) {
        echo "Error creating database: " . $e->getMessage();
    }

    $conn = null;
?>
