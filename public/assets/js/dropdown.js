$(document).ready(function () {
    if (window.matchMedia('(min-width: 993px)').matches) {
        $('.user').hover(function () {
            $(this).addClass("show").delay(200);
            $(this).children(".dropdown-toggle").attr("aria-expanded", "true").delay(200);
            $(this).children(".dropdown-menu").addClass("show").delay(200);
        }, function () {
            $(this).removeClass("show").delay(200);
            $(this).children(".dropdown-toggle").attr("aria-expanded", "false").delay(200);
            $(this).children(".dropdown-menu").removeClass("show").delay(200);
        });
    }
});