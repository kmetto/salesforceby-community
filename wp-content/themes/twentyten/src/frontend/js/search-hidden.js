window.addEventListener("load", () => {
    const button = document.getElementById('search-button-hidden');
    const search = document.getElementById('searchform');
    const menu = document.getElementById('nav__menu');

    console.log(search);

    button.addEventListener('click', (e) => {
        search.classList.toggle('searchform__active');
        search.querySelector('input[type="text"]').focus();
        menu.classList.toggle('nav__hide');
    });
});


