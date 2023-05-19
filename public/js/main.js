/*price range*/

$("#sl2").slider();

var RGBChange = function () {
    $("#RGB").css(
        "background",
        "rgb(" + r.getValue() + "," + g.getValue() + "," + b.getValue() + ")"
    );
};
// $.ajaxSetup({
//     headers: {
//       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
//   });
/*scroll to top*/

// $(document).ready(function () {
//     $(function () {
//         $.scrollUp({
//             scrollName: "scrollUp", // Element ID
//             scrollDistance: 300, // Distance from top/bottom before showing element (px)
//             scrollFrom: "top", // 'top' or 'bottom'
//             scrollSpeed: 300, // Speed back to top (ms)
//             easingType: "linear", // Scroll to top easing (see http://easings.net/)
//             animation: "fade", // Fade, slide, none
//             animationSpeed: 200, // Animation in speed (ms)
//             scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
//             //scrollTarget: false, // Set a custom target element for scrolling to the top
//             scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
//             scrollTitle: false, // Set a custom <a> title if required.
//             scrollImg: false, // Set true to use image
//             activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
//             zIndex: 2147483647, // Z-Index for the overlay
//         });
//     });
// });

$(document).ready(function () {
    $(".owl-carousel").owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 3,
            },
            1000: {
                items: 5,
            },
        },
    });
});
/*-------------------
    Quantity change
--------------------- */
(function ($) {
var proQty = $('.pro-qty');
proQty.prepend('<span class="dec qtybtn">-</span>');
proQty.append('<span class="inc qtybtn">+</span>');
proQty.on('click', '.qtybtn', function () {
    var $button = $(this);
    var oldValue = $button.parent().find('input').val();
    if ($button.hasClass('inc')) {
        var newVal = parseFloat(oldValue) + 1;
    } else {
        // Don't allow decrementing below zero
        if (oldValue > 1) {
            var newVal = parseFloat(oldValue) - 1;
        } else {
            newVal = 1;
        }
    }
    $button.parent().find('input').val(newVal);
});

})(jQuery);