let showMore = document.getElementById("show-more");
let showAll= document.getElementsByClassName("show-all-orders");
let showAllMssg= document.getElementById("all-orders-display");

for(let i=0; i<10;i++){
   showAll[i].style.display = "revert";
   showAll[i].style.pointerEvents = "all";
}

showMore.addEventListener("click", () =>{
   for(let i = 10; i<showAll.length;i++){
      showAll[i].style.display = "revert";
      showAll[i].style.pointerEvents = "all";
   }
   showMore.style.display = "none";
   showMore.style.pointerEvents = "none";
   showAllMssg.style.display = "revert";
});