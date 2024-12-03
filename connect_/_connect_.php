<?php

$conn = mysqli_connect("localhost","admin","12345678","sticker_img");
if (!$conn) {
    # code...
    echo "error data base";
    exit;
}
?>