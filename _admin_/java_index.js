function send_numbe(a){

    let b = "div" + String(a);

    const div = document.getElementById(b)

    const form = document.createElement("form");
    form.method = "post";
    form.action = "_view_img_/index.php";

    const input = document.createElement("input");
    input.type = "hidden";
    input.name = "number";
    input.value = a;
    form.appendChild(input)

    document.body.appendChild(form);

    form.submit();
    
}

let title = document.getElementsByClassName("title")
title[0].innerHTML = "admin"

console.log("hello");


let img = document.getElementsByClassName("element");
let body = document.getElementById('body')

let element = img.length;

function changer(a,c) {
    for (let index = 0; index < element; index++) {
        img[index].style.width = c 
        img[index].style.height = c
        // console.log(index);
    }
}

function img_size() {
    let body = document.getElementById('body');
    
    let link = document.getElementsByClassName('link');
    let links = document.getElementsByClassName('links_');
    let title = document.getElementsByClassName('title');
    var a = body.clientWidth
    if (a < 550)
    {   
        
        var b = a - 50;
        var c = String(Math.round(b / 2))+"px";
        links[0].style.gap = "10px";
        title[0].style.fontSize = "30px"
        for (let index = 0; index < link.length; index++) {
            
            link[index].style.fontSize = "15px"
        }
        changer(a,c)
    }else if (a < 850) {
        var b = a - 80;
        var c = String(Math.round(b / 3))+"px";
        changer(a,c)
    }else if (a < 1140) {
        var b = a - 100;
        var c = String(Math.round(b / 4))+"px";
        changer(a,c)
    }else {
        var b = a - 110;
        var c = String(Math.round(b / 5))+"px";
        changer(a,c)
    }
}
img_size()
window.addEventListener('resize',()=>{
    img_size()
})