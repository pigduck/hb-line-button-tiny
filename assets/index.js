window.addEventListener('load', (event) =>{
    var show =document.getElementById('heiblack-button');
    if(show){
        var box =document.getElementById('heiblack-box');
        var close =document.getElementById('heiblack-close');
        show.addEventListener('click', (event) => {
            if(box.style.display == ''){
                box.style.display ="block"
            }else{
                box.style.display =""
            }
        });
        close.addEventListener('click', (event) => {
            if(box.style.display == ''){
                box.style.display ="block"
            }else{
                box.style.display =""
            }
        });
    }
});

