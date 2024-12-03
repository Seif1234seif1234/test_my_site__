<?php
    if (isset($_COOKIE['user']) && isset($_COOKIE['password'])) {
        include "../../connect_/_connect_.php";
        $sql = "SELECT `user`, `password` FROM `user_admin` ORDER BY id";
        $res = mysqli_query( $conn, $sql );
        $user = $_COOKIE['user'];
        $pass = $_COOKIE['password'];
        $pass_new = "";
        for ($i=0; $i < strlen($pass); $i++) { 
            # code...
            $a = ord($pass[$i]) + 10;
            $pass_new .= chr($a);
        }
        while ($ad = mysqli_fetch_assoc($res)){
            if ($ad['user'] == $user){
                if ($ad['password'] == $pass_new){
                    header("Location: ../");
                }
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_login_.css">

    <title>login</title>
</head>
<body id="body">
    <div class="_main_">
        <h1 class="title">LOG IN</h1>
        <form action="login.php" method="post" class="_formailair_">
            <div>
                <label for="username">username : </label>
                <input type="text" id ="username" name="user" required>
            </div>
            <div>
                <label for="passowrd">passowrd : </label>
                <input type="password" id="passowrd" name="pass" required>
            </div>
            <div class="_submit_">
                <input type="submit" value="submit">
            </div>
        </form>
        <div class="_error_">
            <?php   if (isset($_GET['error'])) { ?>
                <p class="error">
                    <?php   echo $_GET['error'];    ?>
                </p>
            <?php } ?>
        </div>
    </div>
    <script src="java_log_in_.js"></script>
</body>
</html>
