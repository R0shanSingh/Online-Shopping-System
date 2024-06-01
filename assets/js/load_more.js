let showMore = document.getElementById("load-more");
let showAll= document.getElementsByClassName("show-all-product");

let i;

for(let i = 0; i<12;i++){
 showAll[i].style.display = "inline";
 showAll[i].style.pointerEvents = "all";
}

showMore.addEventListener("click", () =>{
   for(let i = 12; i<showAll.length;i++){
    showAll[i].style.display = "inline";
    showAll[i].style.pointerEvents = "all";
    showMore.style.display = "none";
    showMore.style.pointerEvents = "none";
   }
});