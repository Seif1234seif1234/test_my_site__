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
            if(isset($_POST['_name_']) && isset($_POST['_prix_']) && isset($_POST['_catagory_'])){
                $_name_ = $_POST['_name_'];
                $_prix_ = $_POST['_prix_'];
                $_catagory_ = $_POST['_catagory_'];
                $type = $_POST['type'];
                $stmt = $pdo->prepare("UPDATE img SET nom = :_name_ , prix = :_prix_ , catagory = :_catagory_, type_ = :type_ WHERE id = $id");
                $stmt->bindParam(':_name_', $_name_, PDO::PARAM_STR);
                $stmt->bindParam(':_prix_', $_prix_, PDO::PARAM_INT);
                $stmt->bindParam(':_catagory_', $_catagory_, PDO::PARAM_STR);
                $stmt->bindParam(':type_', $type, PDO::PARAM_STR);
                $stmt->execute();
                echo "successful transfer information" ;
                // echo $newNumber;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }else{
        header("Location: ../../../");
    }

?>
