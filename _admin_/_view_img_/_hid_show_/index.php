<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $host = 'localhost'; // اسم المضيف
        $dbname = 'sticker_img'; // اسم قاعدة البيانات
        $username = 'admin'; // اسم المستخدم
        $password = '12345678'; // كلمة المرور
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $type = $_POST['type_'];
            $id = $_POST['id'];
            $v = "v";
            $h = "h";
            if($type == "h"){
                $stmt = $pdo->prepare("UPDATE img SET hid_vis = :v WHERE id = $id");
                $stmt->bindParam(':v', $v, PDO::PARAM_STR);
                echo "HIDING";
            }else{
                $stmt = $pdo->prepare("UPDATE img SET hid_vis = :h WHERE id = $id");
                $stmt->bindParam(':h', $h, PDO::PARAM_STR);
                echo "SHOW";
            }
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }else{
        header("Location: ../../../");
    }
