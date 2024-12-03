<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if (isset($_COOKIE['user']) && isset($_COOKIE['password'])) {
            include "../../connect_/_connect_.php";
            $name = $_POST["name"];
            $prix = $_POST["prix"];
            $catagory = $_POST["catagory"];

            $img_name = $_FILES['img_uploader']['name'];
            $img_size = $_FILES['img_uploader']['size'];
            $tmp_name = $_FILES['img_uploader']['tmp_name'];
            $error = $_FILES['img_uploader']['error'];
            if($error === 0) {
                if ($img_size > 12500000) {
                    $em = "sorry, your file large";
                    header("Location: index.php?error=$em");
                }else{
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
                    
                    $allowed_exs = array("jpg", "jpeg", "png");
                    if(in_array($img_ex_lc, $allowed_exs)){
                        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                        $img_upload_path = '../../img/'.$new_img_name;
                        move_uploaded_file($tmp_name, $img_upload_path);

                        $sqli = "INSERT INTO img(url,prix,nom,catagory) VALUES ('$new_img_name','$prix','$name','$catagory')";
                        mysqli_query($conn, $sqli);

                        header("Location: ../");
                    }else{
                        $em = "type error occurred!";
                        header("Location: index.php?error=$em");
                    }
                }
            }else{
                $em = "unknow error occurred!";
                header("Location: index.php?error=$em");
            } 
        }else{
            header("Location: ../_log_in_");
        }
    }else{
        header("Location: ../../");
    }
?>