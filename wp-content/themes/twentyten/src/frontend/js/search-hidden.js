window.addEventListener("load", () => {
    const button = document.getElementById('search-button-hidden');
    const search = document.getElementById('search');
    const menu = document.getElementById('nav__menu');

    button.addEventListener('click', (e) => {
        search.classList.toggle('search__active');
        search.focus();
        menu.classList.toggle('nav__hide');
    })
});