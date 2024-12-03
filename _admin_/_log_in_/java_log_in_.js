function img_size() {
    let body = document.getElementById('body');
    let main = document.getElementsByClassName("_main_")
    var a = body.clientWidth

    var b = a - 200
    main[0].style.width = b + "px"
    if (a < 300) {
        var b = a - 50
        main[0].style.width = b + "px"
    }else if (a < 400) {
        var b = a - 100
        main[0].style.width = b + "px"
    }else if (a < 500) {
        var b = a - 150
        main[0].style.width = b + "px"
    }else if (a < 600) {
        var b = a - 200
        main[0].style.width = b + "px"
    }else{
        var b = a - a / 2
        main[0].style.width = b + "px"
    }
    
}

img_size()
window.addEventListener('resize',()=>{
    img_size()
})