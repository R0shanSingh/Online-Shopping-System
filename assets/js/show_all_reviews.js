let showAllReviewsButton = document.getElementById('view-all-reviews');

let showingAllReviews = document.getElementById('viewing-all-reviews');

let user_review_and_comments = document.getElementsByClassName('user-review-and-comments');

for (let i=0; i<3 ; i++) {
    user_review_and_comments[i].style.display = "revert";
    user_review_and_comments[i].style.pointerEvents = "all";
}

showAllReviewsButton.addEventListener("click", ()=> {
    for (let i=3;i<user_review_and_comments.length;i++) {
        user_review_and_comments[i].style.display = "revert";
        user_review_and_comments[i].style.pointerEvents = "all";
    }

    showAllReviewsButton.style.display = "none";
    showAllReviewsButton.style.pointerEvents = "none";

    showingAllReviews.style.display = "revert";
});