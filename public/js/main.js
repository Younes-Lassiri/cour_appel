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


let fileInput = document.getElementById("file-input");
let imageContainer = document.getElementById("images");
let numOfFiles = document.getElementById("num-of-files");

function preview(){
    imageContainer.innerHTML = "";
    numOfFiles.textContent = `${fileInput.files.length} تم تحديد`;
    
    for(let i = 0; i < Math.min(4, fileInput.files.length); i++){
        let reader = new FileReader();
        reader.onload=()=>{
            let div = document.createElement("div");
            let img = document.createElement("img");
            img.setAttribute("src",reader.result);
            div.appendChild(img);
            if (i === 3 && fileInput.files.length > 3) {
                div.classList.add('beforeDiv');
                let count = fileInput.files.length - 2;
                let countText = document.createTextNode('+' + count);
                let countSpan = document.createElement("span");
                countSpan.appendChild(countText);
                countSpan.style.fontSize = "25px";
                countSpan.style.color = "white";
                countSpan.style.fontWeight = "700";
                countSpan.style.width = "35px";
                countSpan.style.height = "35px";
                countSpan.style.position = "absolute";
                countSpan.style.top = "50%";
                countSpan.style.left = "50%";
                countSpan.style.transform = "translate(-50%, -50%)";
                div.appendChild(countSpan);
            }
            if (i === 0 && fileInput.files.length > 3) {
                div.style.opacity = 0;
            }
            if (fileInput.files.length === 1) {
                imageContainer.style.gridTemplateColumns = '1fr';
                imageContainer.style.width = '35%'; 
            } else if (fileInput.files.length === 2) {
                imageContainer.style.gridTemplateColumns = '1fr 1fr';
                imageContainer.style.width = '35%';
            } else {
                if (fileInput.files.length === 3) {
                    imageContainer.style.gridTemplateColumns = '1fr 1fr 1fr';
                    imageContainer.style.width = '53%';
                } else {
                    imageContainer.style.gridTemplateColumns = '1fr 1fr 1fr 1fr';
                    imageContainer.style.width = '70%';
                }
            }
            
            
            
            imageContainer.appendChild(div);
        }
        reader.readAsDataURL(fileInput.files[i]);
    }
}

