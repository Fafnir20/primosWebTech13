
document.getElementById('popup').addEventListener('click', function() {
    if (event.target === this) {
        document.getElementById('popup').style.display="none";
    }
});

document.getElementById('search').addEventListener('click', function(event) {
    if (event.target === this) {
        document.getElementById('popup').style.display="block";
    }
});

function toggleComments(postId) {
    var commentsSection = document.getElementById('comments-' + postId);
    if (commentsSection.style.display === 'none') {
        commentsSection.style.display = 'block';
    } else {
        commentsSection.style.display = 'none';
    }
}
