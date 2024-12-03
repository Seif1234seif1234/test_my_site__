<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if (isset($_COOKIE['user']) && isset($_COOKIE['password'])) {
            $user = $_COOKIE['user'];
            $pass = $_COOKIE['password'];
            include "../_cripter_/cripter.php";
            include "../../connect_/_connect_.php";
            $sql = "SELECT * FROM `user_admin` ORDER BY id DESC";
            $res = mysqli_query($conn, $sql);
            $new_pass = cripter($pass);
            $res;
            $imag;
            function ext($res,$new_pass,$user) : int {
                $bol = 0;
                if (mysqli_num_rows($res) > 0) {
                    while (($user_ = mysqli_fetch_assoc($res)) && !$bol){
                        if($user_["user"] == $user){
                            if($user_["password"] == $new_pass){
                                $bol = 1;
                            }
                        }
                    }
                }
                return $bol ;
            }
            $boll = ext($res , $new_pass,$user);
            if($boll === 1){
                $id = $_POST['number'];
                $sql_get = "SELECT * FROM `img` WHERE id = $id";
                $res = mysqli_query($conn, $sql_get);
                $imag = mysqli_fetch_assoc($res);
            }else{
                header("Location: ../_log_in_");
            }
        }else{
            header("Location: ../_log_in_");
        }
    }else{
        echo "No Permissions";
        header("Location: ../../");
    }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_edit_img.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>edit img</title>

</head>
<body id="body">
    
    <div class="_main_">
        <div class="_header_">
            <a href="../" class="return"><i class="fa-solid fa-arrow-left"></i></a>
            <p class="_number_">NUMBER : <?= $imag['id'] ?></p>
        </div>
        <div class="_img_">
            <img src="../../img/<?=$imag['url']?>" class="img">
        </div>
        <div class="_edit_img_">
            <h1 class="title">EDIT STICKER</h1>
            <div class="_name_">
                <label for="name" class="label_inpu_edit">name of image :</label>
                <input type="text" id="name" class="input_edit" placeholder="edit name" value="<?= $imag['nom'] ?>" >
            </div>
            <div class="_prix_">
                <label for="prix" class="label_inpu_edit">prix of image :</label>
                <input type="text" id="prix" class="input_edit" placeholder="edit prix" value="<?= $imag['prix'] ?>">
            </div>
            <div class="_catagory_">
                <label for="catagory" class="label_inpu_edit">catagory of image :</label>
                <input type="text" id="catagory" class="input_edit" placeholder="edit catagory" value="<?= $imag['catagory'] ?>">
            </div>
            <div class="_type_">
                <label for="type_img" class="label_inpu_edit">type : </label>
                <select name="type_img" id="type_img" class="input_edit input_edit_select">
                    <option value="sticker">sticker</option>
                    <option value="poster" >poster</option>
                </select>
            </div>
            <div class="_state_">
                <p  class="label_inpu_edit">status : </p>
                <p class="label_inpu_edit _date_p" id="state"><?php if($imag['hid_vis'] == "v"){echo "VISIBLE";}else{echo "HIDDEN";} ?></p>
            </div>
            <div class="_date_">
                <p class="label_inpu_edit" >date of uploading : </p>
                <p class="label_inpu_edit _date_p"><?= $imag['date'] ?></p>
            </div>
            <div class="_button_">
                <div class="_edit_button_">
                    <input type="button" value="DELETE" class="supprimer _button_edit_" id="DELETE">
                    <input type="hidden" value="<?= $imag['hid_vis'] ?>" id="_h_type_s_" >
                    <input type="button" value="<?php if($imag['hid_vis'] == "v"){echo "HIDING";}else{echo "SHOW";} ?>" class="hidding _button_edit_" id="hid_sho">
                </div>
                <div class="_submit_">
                    <button type="button" class="submit _button_edit_" id="_submit_set_up_">SET UP</button>
                </div>
            </div>
            <div class="_res_">
                <p id ="res"></p>
            </div>
        </div>
    </div>
    <script>
        let type_img = document.getElementById("type_img");
        type_img.value = "<?= $imag['type_'] ?>"
        $(document).ready(function(){
            $("#_submit_set_up_").click(function(){
                let name = document.getElementById("name").value;
                let prix = document.getElementById("prix").value;
                let catagory = document.getElementById("catagory").value;
                let type_img = document.getElementById("type_img");
                $.ajax({
                    url: '_update_/index.php',
                    type: 'POST',
                    data: { _name_: name, _prix_: prix, _catagory_: catagory, type: type_img.value , id: <?= $imag['id'] ?> },
                    success: function(response){
                        $("#res").text(response);
                        var a = setTimeout(()=>{
                            $("#res").text("");
                            clearTimeout(a)
                        },3000)
                    }
                });
            });
            $("#hid_sho").click(function(){
                let hid_sho_ = document.getElementById('hid_sho');
                let _h_type_s_ = document.getElementById('_h_type_s_');
                let state = document.getElementById("state");
                $.ajax({
                    url: '_hid_show_/index.php',
                    type: 'POST',
                    data: { type_ : _h_type_s_.value, id : <?= $imag['id'] ?>},
                    success: function(response){
                        hid_sho_.value = response
                        if (response == "SHOW") {
                            _h_type_s_.value = "h";
                            state.innerText = "HIDDEN";
                        }else{
                            _h_type_s_.value = "v";
                            state.innerText = "VISIBLE";
                        }
                    }
                });
            });
            $("#DELETE").click(function(){
                $.ajax({
                    url: '_delet_/index.php',
                    type: 'POST',
                    data: {id : <?= $imag['id'] ?>},
                    success: function(response){
                        if (response == "delete successful") {
                            $("#res").text(response + " 5");
                            var i = 5
                            var a = setInterval(() => {
                                i -= 1;
                                $("#res").text(response + " "+ i);
                                if (i == 0) {
                                    clearInterval(a)
                                    window.location.href = "../";
                                }
                            }, 750);
                        }else{
                            $("#res").text(response);
                        }
                    }
                });
            });
        })
    </script>
    <script src="java_index_view_.js">
        img_size()
    </script>

</body>
</html>

