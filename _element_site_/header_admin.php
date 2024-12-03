<header > 
    <div class="header">
        <div class="div_logo">
            <img src="../img/download.jpg" class="logo" >   
        </div>
        <div>
        <h1 class="title">Home</h1>
        </div>
        <div class="links_">
        
            <button id="upload" type="button" class="_upload_">upload</button>

        </div>
    </div>
</header>
<div class="block_header"></div>
<script>
    document.getElementById("upload").addEventListener("click",()=>{
            const form = document.createElement("form");
            form.method = "post";
            form.action = "_upload_/";

            document.body.appendChild(form);
            
            form.submit();
            
        })
</script>