$(document).ready(function () {
    var btnCollapse = $('.btn-collapse');
    var collapse = $('.collapse');

    btnCollapse.on('click', function () {

        //Hide all collapses
        collapse.collapse('hide');

        //Unhighlight all buttons
        btnCollapse.removeClass('btn-warning');
        btnCollapse.addClass('btn-outline-warning');

        //Highlight the clicked buttons
        $(this).removeClass('btn-outline-warning');
        $(this).addClass('btn-warning');
    });
});