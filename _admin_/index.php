<?php
    if (isset($_COOKIE['user']) && isset($_COOKIE['password'])) {
        include "../connect_/_connect_.php";
        $sql = "SELECT * FROM img ORDER BY id DESC";
        $res = mysqli_query($conn, $sql);
    }else{
        header("Location: _log_in_");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_index_.css">
    <title>admin page</title>
</head>

<body id="body">
    <?php include "../_element_site_/header_admin.php" ?>
    <main>
        <div class="_view">
            <div class="view">
                <?php
                if (mysqli_num_rows($res) > 0){
                    while ($imag = mysqli_fetch_assoc($res)){ ?>
                <img src="../img/<?=$imag['url']?>" class="element" onclick="send_numbe(<?=$imag['id']?>)">
                <?php } } ?>

            </div>
        </div>
    </main>
    <script src="java_index.js">

    </script>
</body>

</html>