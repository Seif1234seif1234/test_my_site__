function img_size() {
    let body = document.getElementById('body');
    let preview = document.getElementById("preview");
    let main = document.getElementById("_main_")
    var a = main.clientWidth
    var b ;
    if (a < 650)
    {
        if (a < 300) {
            b = a - 50
        }else if (a < 400) {
            b = a - 75
        }else if (a < 500) {
            b = a- 125
        }else{
            b = a - 175
        }
        preview.style.width = b +"px"
        preview.style.height = b +"px"
    }else{
        b = 484
        preview.style.width = b+"px"
        preview.style.height = b +"px"
    }

}
console.log("dsf");

img_size()
window.addEventListener('resize',()=>{
    img_size()
})