window.addEventListener("load", () => {
    const button = document.getElementById('search-button-hidden');
    const search = document.getElementById('search');

    button.addEventListener('click', (e) => {
        search.classList.toggle('search__active');
        search.focus();
    })
});