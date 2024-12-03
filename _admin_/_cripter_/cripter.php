<?php
    function cripter($pass) : string {
        $pass_new = "";
        for ($i=0; $i < strlen($pass); $i++) {
            $a = ord($pass[$i]) + 10;
            $pass_new = $pass_new . chr($a);
        }
        return $pass_new;
    }
?>