function changer(a,c) {
    for (let index = 0; index < element; index++) {
        img[index].style.width = c
        img[index].style.height = c
        // console.log(index);
    }
}

function img_size() {
    let body = document.getElementById('body');

    let label = document.getElementsByClassName("label_inpu_edit");
    
    let _button_ = document.getElementsByClassName('_button_edit_');

    let _img_ = document.getElementsByClassName('img');

    var a = body.clientWidth;

    var b = a - 150;
    
    var c = b + "px";

    if (a < 650) {
        if (a < 550)
            {   
                
                for (let index = 0; index < label.length; index++) {
                    label[index].style.fontSize = "13px"
                    
                }
        
                for (let index = 0; index < _button_.length; index++) {
                    _button_[index].style.fontSize = "13px"
                    
                }
                
            }
            else{
                for (let index = 0; index < label.length; index++) {
                    label[index].style.fontSize = "15px"
                }
                for (let index = 0; index < _button_.length; index++) {
                    _button_[index].style.fontSize = "15px"
                    
                }
            }
            
            _img_[0].style.width = c
            _img_[0].style.height = c
    }else{
        _img_[0].style.width = "484px"
        _img_[0].style.height =  "484px"
        for (let index = 0; index < label.length; index++) {
            label[index].style.fontSize = "15px"
        }
        for (let index = 0; index < _button_.length; index++) {
            _button_[index].style.fontSize = "15px"
            
        }
    }
    
    
}
img_size()
window.addEventListener('resize',()=>{
    img_size()
})
