<?php
// include "connect_/_connect_.php";
// $sql = "SELECT * FROM `img` ORDER BY id DESC";
// $asq = mysqli_query($conn,$sql);

echo "seif";

// // // // session_start();
// // $_SESSION["seif"] = "54";
// // $_SESSION["aa"] = "dd";
// date_default_timezone_set("Africa/Tunis");
// $crr = date("Y-m-d");
// echo $crr;
// $pm = mysqli_query($conn,"UPDATE `img` SET `date`= '$crr' WHERE 1");

    $host = 'localhost'; // اسم المضيف
    $dbname = 'sticker_img'; // اسم قاعدة البيانات
    $username = 'admin'; // اسم المستخدم
    $password = '12345678'; // كلمة المرور
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare("SELECT `url` FROM `img` WHERE id = 16");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row){
            if($url = $row["url"]){
                if(unlink("img/download.jpg")){
                    echo "ok";
                }else{
                    echo "error";
                }
            }else{
                echo "error path file";
            }
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

</body>
</html>