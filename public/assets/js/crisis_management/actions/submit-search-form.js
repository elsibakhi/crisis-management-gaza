document.getElementById('search_input').addEventListener('keypress', function (event) {
    if (event.key === 'Enter') {
        event.preventDefault(); // Prevent default form submission behavior
        document.getElementById('search-form').submit(); // Submit the form using its ID
    }
});
