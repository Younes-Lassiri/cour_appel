function showDropdown(){
    let drop = document.getElementById('theDrop').style
    if(drop.display === 'none'){
        drop.display = 'block'
    }else{
        drop.display = 'none'
    }
}




function handleCheck(id, idd) {
    const selectElements = document.getElementById(id);
    const label = document.getElementById(idd);

    if (selectElements.value.trim() !== '') {
        label.classList.remove('input-label');
        label.classList.add('input-labelS');
    } else {
        label.classList.remove('input-labelS');
        label.classList.add('input-label');
    }
}
document.addEventListener("DOMContentLoaded", function() {
    handleCheck('l', 'm');
});
document.addEventListener("DOMContentLoaded", function() {
    handleCheck('w','x');
});

document.addEventListener("DOMContentLoaded", function() {
    handleCheck('c','v');
});
document.addEventListener("DOMContentLoaded", function() {
    
handleCheck('b','n');
});


document.addEventListener("DOMContentLoaded", function() {
    
    handleCheck('a','z');
    });
    document.addEventListener("DOMContentLoaded", function() {
    
        handleCheck('e','r');
        });
        document.addEventListener("DOMContentLoaded", function() {
    
            handleCheck('t','y');
            });



function done(id, idd) {
    const selectElements = document.getElementById(id);
    const label =document.getElementById(idd)

    if(selectElements.value !== ''){
        label.classList.remove('input-labelSD')
        label.classList.add('input-labelSD')
    }else{
        label.classList.remove('input-labelSD')
        label.classList.add('input-labelSD')
    }
}


function checkVisi(id){
    let element = document.getElementById(id);
    element.style.color = 'red';
}