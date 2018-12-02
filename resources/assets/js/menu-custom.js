let onScrollUp = require('./on-scroll-up');

function bindFixedMenu(selector, offset) {
    var $fixedHeader = $(selector),
        isFixed      = true;

    onScrollUp(function (delta) {
        if (delta < offset) {
            if (!isFixed) {
                $fixedHeader.fadeIn(500);
                isFixed = true;
                if (window.moveCounter) window.moveCounter("down");
            }
        }
        else {
            isFixed = false;
            $fixedHeader.stop();
            $fixedHeader.hide();
            if (window.moveCounter) window.moveCounter("up");
        }
    }, {min: 200});
}

function bindNavMenu() {
    var $mobileMenu  = $('#mobile-menu'),
        $menu        = $('#menu'),
        $transition  = $('.transition-container', $mobileMenu),
        transitionEl = $transition.get(0),
        $close       = $('[data-close]', $menu),
        $reveal      = $('.reveal-body', $mobileMenu);

    $reveal.hide();

    $mobileMenu.on('on.zf.toggler', function () {
        console.log($(this).height());
        TweenLite.to(transitionEl, 0.5, {
            height: $(this).height() + 'px',
            ease  : Power4.easeInOut
        });
        $(this).addClass('open');
        $('body').addClass('no-scroll');
        $reveal.fadeIn(1000);
    });

    $close.on('click', function () {
        $('body').removeClass('no-scroll');
        $reveal.hide();
        TweenLite.to(transitionEl, 0.5, {
            height    : 0,
            ease      : Power4.easeOut,
            onComplete: function () {
                $mobileMenu.foundation('toggle');
                $('#fixed-header').foundation('toggle');
            }
        });
    });
    $mobileMenu.on('off.zf.toggler', function () {
        console.log('off');
    });
}



module.exports = {
    bindFixedMenu   : bindFixedMenu,
    bindNavMenu     : bindNavMenu  
};