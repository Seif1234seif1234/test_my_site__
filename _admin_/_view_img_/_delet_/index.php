<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $host = 'localhost'; // اسم المضيف
        $dbname = 'sticker_img'; // اسم قاعدة البيانات
        $username = 'admin'; // اسم المستخدم
        $password = '12345678'; // كلمة المرور
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $id = $_POST['id'];
            $stmt = $pdo->prepare( "SELECT `url` FROM `img` WHERE id = $id");
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($url = $row['url']) {
                $del = $pdo->prepare("DELETE FROM `img` WHERE id = :id");
                $del->bindParam(':id', $id, PDO::PARAM_INT);
                if ($del->execute()) {
                    $filePath = "../../../img/$url";
                    if (file_exists($filePath) && unlink($filePath)) {
                        echo "delete successful";
                    } else {
                        echo "file deletion failed";
                    }
                } else {
                    echo "database deletion failed";
                }
            } else {
                echo "URL not found";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }else{
        header("Location: ../../../");
    }
    // "DELETE FROM `img` WHERE id = $id"