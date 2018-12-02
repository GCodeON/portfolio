function customSlider() {

    if ($(".hero .media-reel").length > 0) {
        let hero_videos =  $(".hero .media-reel .media").length;
        hero_videos = hero_videos >= 3 ? 3 : hero_videos;
        $(".hero .media-reel").slick({
                slidesToShow: hero_videos,
                dots: false,
                arrows: false,
                autoplay: true,
                responsive: [{
                    breakpoint: 704,
                    settings: {
                        slidesToShow: 2
                    }
                }]
        });
    }   

    if ($("#reel .media-reel").length > 0) {
        let reel_videos =  $("#reel .media-reel .media").length;
         reel_videos = reel_videos >= 3 ? 3 : reel_videos;
        $("#reel .media-reel").slick({
                slidesToShow: reel_videos,
                dots: false,
                arrows: false,
                autoplay: true,
                responsive: [{
                    breakpoint: 704,
                    settings: {
                        slidesToShow: 1.5
                    }
                }]
        });
    }

    // Mobile Slick x Desktop Unslicking
    $(window).on('load resize orientationchange', function() {
        //need to add other pages where the case study is a slider
        $('.clients .studies, .press-awards .studies, .case-study .studies, .approach .studies').each(function(){
            var $carousel = $(this);
            
            if ($(window).width() > 667) {
                if ($carousel.hasClass('slick-initialized')) {
                    $carousel.slick('unslick');
                }
            }
            /* Initializes a slick carousel only on mobile screens */
            else{
                if (!$carousel.hasClass('slick-initialized')) {
                    $carousel.slick({
                        slidesToShow: 1.5,
                        slidesToScroll: 1,
                        autoplaySpeed: 2000,
                        dots: false,
                        arrows: false,
                        autoplay: true,
                        mobileFirst: true,
                    });
                }
            }
        });
    });
}

module.exports = {
    customSlider: customSlider
};