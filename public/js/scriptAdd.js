const selected = document.getElementById('productType');
const dynaForm = document.getElementById('dynaForm');
let allAtr = document.getElementsByClassName('allAtr');
let dvdAtr = document.getElementsByClassName('dvdAtr');
let bookAtr = document.getElementsByClassName('bookAtr');
let furnAtr = document.getElementsByClassName('furnAtr');
let typeTip = document.getElementById('type-tip');

selected.addEventListener('change', function() {
    let x = this.value;
    for(let i = 0; allAtr.length>i;i++){
        allAtr[i].style.display ='none';
    }
    if(x == 'DVD'){        
        for(let i = 0; dvdAtr.length>i;i++){
            dvdAtr[i].style.display ='block';
            typeTip.innerText = "Please provide size in MB"

        }
    } else if(x == 'Book'){
        for(let i = 0; bookAtr.length>i;i++){
            bookAtr[i].style.display ='block';
            typeTip.innerText = "Please provide weight in KG"

        }
    } else if(x == 'Furniture'){        
        for(let i = 0; furnAtr.length>i;i++){
            furnAtr[i].style.display ='block';
            typeTip.innerText = "Please provide dimensions in HxWxL format"
        }
    }
 });

 