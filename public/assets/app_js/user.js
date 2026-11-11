$(document).ready(function () {
    setTimeout(() => {
        const loader = document.getElementById('global-loader');
        if (!loader) return;
        loader.classList.add('is-hidden');
        setTimeout(() => {
            loader.style.display = 'none';
        }, 320);
    }, 450);

    $('.slide').on('click', '.side-menu__item', function () {
        $('.side-menu__item').removeClass('active');
        $(this).addClass('active');
    });
});