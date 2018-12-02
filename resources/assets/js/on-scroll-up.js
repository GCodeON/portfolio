/**
 * Scroll up delta in pixels. Delta is reset on scroll down.
 * @param callback - scroll up delta in pixels
 * @param opts
 *      min: {
 *          // Pixel value. Minimum distance from top of the page, returns 0 for less than.
 *          type: Integer
 *          default: 150
 *      }
 */
function onScrollUp(callback, opts) {
    var defaults = {
            min: 150
        },
        reset    = function () {
            prev  = $(window).scrollTop();
            delta = 0;
        },
        deltaStart,
        delta,
        prev,
        current,
        settings = $.extend({}, defaults, opts || {});

    reset();

    $(window).scroll(function () {
        current = $(this).scrollTop();

        // Scrolling down or less than minimum distance from top
        if (current < settings.min || current > prev) {
            callback(0);
            reset();
            return;
        }

        // Scrolling up
        if (delta === 0) {
            deltaStart = prev;
        }
        delta = current - deltaStart;
        prev  = current;

        callback(delta);
    });
}

module.exports = onScrollUp;