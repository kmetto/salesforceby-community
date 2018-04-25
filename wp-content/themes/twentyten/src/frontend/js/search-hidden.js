import '../css/custom-styles.css';

window.addEventListener("load", () => {
    const button = document.getElementById('search-button-hidden');
    const search = document.getElementById('searchform');

    console.log(search.style);

    button.addEventListener('click', (e) => {
        search.classList.toggle('searchform__active');
        search.querySelector('input[type="text"]').focus();
    })
});