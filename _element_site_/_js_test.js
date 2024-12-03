let _header_0 = document.getElementById("_header_0")
let _header_index = document.getElementById("_header_index")
let block_header = document.getElementById("block_header")
let hei_he_ni  = 0 - _header_0.offsetHeight
let hei_he_ps  =  _header_0.offsetHeight
var hei_index = _header_index.offsetHeight
console.log(hei_index);

block_header.style.height = hei_index + "px"
let lastscrollTop = 0;
window.addEventListener("scroll",()=>{
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop
    if (scrollTop > lastscrollTop) {
        _header_index.style.translate = "0 " + hei_he_ni + "px"
    }else{
        _header_index.style.translate = "0 0"
    }
    lastscrollTop = scrollTop <= 0 ? 0: scrollTop
})