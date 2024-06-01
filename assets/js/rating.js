// Review Stars 
const allStar = document.querySelectorAll('#product-star-rating .fa-star');
const ratingValue = document.querySelector('#product-star-rating input');

// const userRating = document.getElementById('user-rating');

allStar.forEach((item, idx)=> {
	item.addEventListener('click', function () {
		// let click = 0;
		ratingValue.value = idx + 1;

		allStar.forEach(i=> {
			i.classList.replace('fa-solid', 'fa-regular');
		});
		for(let i=0; i<allStar.length; i++) {
			if(i <= idx) {
				allStar[i].classList.replace('fa-regular', 'fa-solid');
			} 
			// else {
			// 	allStar[i].style.setProperty('--i', click);
			// 	click++;
			// }
		}
        // userRating.value = 5 - click;
	});
});