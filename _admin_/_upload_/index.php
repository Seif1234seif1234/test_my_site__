<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if (!(isset($_COOKIE['user']) && isset($_COOKIE['password']))) {
            header("Location: ../_log_in_");
        }
    }else{
        header("Location: ../../");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_upload_.css">
    <title>uplaod page</title>
</head>
<body id="body" >
    <?php if(isset($_GET['error'])):?>
        <p><?php echo $_GET['error']; ?></p>
    <?php endif ?>
	<form action="uploader_index.php" method="post" enctype="multipart/form-data" class="_main_" id="_main_">
        <div class="_preview_">
            <img id="preview" src="" alt="" class="img_preview" >
        </div>
        <div class="editor">
            <div class="_file_">
                <input type="file" name="img_uploader" id="img_uploader" class="uploader_img"> 
            </div>
            <div class="_name_">
                <label for="">set name : </label>
                <input type="text" name="name" placeholder="name">
            </div>
            <div class="_prix_">
                <label for=""> set prix :</label>
                <input type="number" name="prix" placeholder="prix">
            </div>
            <div class="_catagory_">
                <label for="">set catagory :</label>
                <input type="text" name="catagory" placeholder="catagory">
            </div>
            <div class="_submit_">
               <button type="submit" name="submit" id ="submit">upload</but> 
            </div>
            <div>
                <?php if(isset($_GET['error'])):?>
                    <p><?php echo $_GET['error']; ?></p>
                <?php endif ?>
            </div>
        </div>
    </form>
    <script>
        let a =document.getElementById("img_uploader")
        document.getElementById("submit").addEventListener("click",()=>{
            console.log(a);
        })
        a.addEventListener("change", function(event){
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e){
                    const img =document.getElementById("preview")
                    img.src = e.target.result
                    img.style.display = 'block'
                }
                reader.readAsDataURL(file)
            }
        })
        // let section =document.getElementById('section')
        // section.addEventListener("change",()=>{
        //     console.log(section.value);
            
        // })
    </script>
    <script src="java_index_.js"></script>
</body>
</html>