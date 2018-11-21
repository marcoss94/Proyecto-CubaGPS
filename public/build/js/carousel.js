function moveToSelected(element) {

    if (element == "nextCarousel") {
        var selected = $(".selected").next();
    } else if (element == "prevCarousel") {
        var selected = $(".selected").prev();
    } else {
        var selected = element;
    }

    var nextCarousel = $(selected).next();
    var prevCarousel = $(selected).prev();
    var prevSecond = $(prevCarousel).prev();
    var nextSecond = $(nextCarousel).next();

    $(selected).removeClass().addClass("selected");

    $(prevCarousel).removeClass().addClass("prevCarousel");
    $(nextCarousel).removeClass().addClass("nextCarousel");

    $(nextSecond).removeClass().addClass("nextRightSecond");
    $(prevSecond).removeClass().addClass("prevLeftSecond");

    $(nextSecond).nextAll().removeClass().addClass('hideRight');
    $(prevSecond).prevAll().removeClass().addClass('hideLeft');

}

// Eventos teclado
$(document).keydown(function(e) {
    switch(e.which) {
        case 37: // left
            moveToSelected('prevCarousel');
            break;

        case 39: // right
            moveToSelected('nextCarousel');
            break;

        default: return;
    }
    e.preventDefault();
});

$('#carousel div').click(function() {
    moveToSelected($(this));
});

$('#prevCarousel').click(function() {
    moveToSelected('prevCarousel');
});

$('#nextCarousel').click(function() {
    moveToSelected('nextCarousel');
});
