let deleteBtn = document.getElementById('delete-product-btn');
 let deleteCheckb = document.getElementsByClassName('delete-checkbox');
 let product = document.getElementsByClassName('product-container');


deleteBtn.addEventListener('mouseover', function(){
    for(let i = 0; deleteCheckb.length>i;i++){
       if(deleteCheckb[i].checked){
           product[i].style.borderColor = "red";
       }
   }
});
deleteBtn.addEventListener('mouseout', function(){
    for(let i = 0; deleteCheckb.length>i;i++){
       if(deleteCheckb[i].checked){
           product[i].style.borderColor = "black";
       }
   }
});