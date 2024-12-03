<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include "../../connect_/_connect_.php";
        $sql = "SELECT `user`, `password` FROM `user_admin` ORDER BY id";
        $res = mysqli_query( $conn, $sql );
        $user = $_POST["user"];
        $pass = $_POST["pass"];
        $pass_new = "";
        for ($i=0; $i < strlen($pass); $i++) { 
            # code...
            $a = ord($pass[$i]) + 10;
            $pass_new .= chr($a);
        }
        while ($ad = mysqli_fetch_assoc($res)){
            if ($ad['user'] == $user){
                if ($ad['password'] == $pass_new){
                    setcookie("user", $user,time()+(10800), "/");
                    setcookie("password", $pass,time()+(10800), "/");
                    header("Location: ../");
                }else{
                    header("Location: ../_log_in_/index.php?error=username or password incorrect");
                }
            }else{
                header("Location: ../_log_in_/index.php?error=username or password incorrect");
            }
        }
    }else{
        header("Location: ../../");
    }