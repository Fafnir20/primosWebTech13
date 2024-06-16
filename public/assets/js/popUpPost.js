
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
