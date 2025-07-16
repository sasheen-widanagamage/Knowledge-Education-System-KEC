document.getElementById('read-more-btn').addEventListener('click', function () {
    const moreContent = document.getElementById('more-content');
    const readMoreBtn = document.getElementById('read-more-btn');
    
    if (moreContent.style.display === "none") {
        moreContent.style.display = "block";
        readMoreBtn.innerText = "Read Less";
    } else {
        moreContent.style.display = "none";
        readMoreBtn.innerText = "Read More";
    }
});