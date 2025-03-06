const stars = document.querySelectorAll('span.fa-star');
const result = document.getElementById('result');
const ratingInput = document.getElementById('ratingInput');

stars.forEach(star => {
    star.addEventListener('click', () => {
        const rating = star.getAttribute('data-value');

        // Clear previous ratings
        stars.forEach(s => s.classList.remove('checked'));

        // Set checked class to the clicked star and all stars before it
        for (let i = 0; i < rating; i++) {
            stars[i].classList.add('checked');
        }

        // Set the hidden input value
        ratingInput.value = rating;

    });
});