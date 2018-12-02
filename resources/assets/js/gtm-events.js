var gtmEvents = function () {
    var defaults = {
            eventName          : 'ga-custom-event',
            clickAttribute     : 'data-ga-click',
            visibilityAttribute: 'data-ga-visibility',
            categoryAttribute  : 'data-ga-category',
            actionAttribute    : 'data-ga-action',
            labelAttribute     : 'data-ga-label',
        },
        settings = $.extend({}, defaults);

    function setOptions(opts) {
        settings = $.extend({}, settings, opts);
    }

    function logEvent(category, action, label, value, callback) {
        var dataLayer = window.dataLayer || [],
            event     = {
                event        : settings.eventName,
                label        : (label || '').toLowerCase(),
                category     : (category || '').toLowerCase(),
                action       : (action || '').toLowerCase(),
                value        : value || '',
                eventCallback: callback || function () {}
            };
        dataLayer.push(event);
    }


    function getAttributeFromParent($element, attribute) {
        let $parent = $element.closest('[' + attribute + ']');
        return $parent.attr(attribute);
    }

    function elementToEvent(el) {
        let $el      = $(el),
            action   = $el.attr(settings.actionAttribute),
            category = $el.attr(settings.categoryAttribute),
            label    = $el.attr(settings.labelAttribute);

        if (!action) {
            action = getAttributeFromParent($el, settings.actionAttribute);
            action = action || 'click';
        }
        if (!category) {
            category = getAttributeFromParent($el, settings.categoryAttribute);
        }
        if (!label) {
            label = getAttributeFromParent($el, settings.labelAttribute);
        }

        // remove label spaces
        label = (label || '').replace(/[\ ]+/g, '');

        logEvent(category, action, label, '');
    }

    function bindYoutubeVideos(videoId) {
        var $video = videoId;
    
        if ($video.length === 0) {
            return;
        }
    
        var tag            = document.createElement('script');
        tag.id             = 'iframe-demo';
        tag.src            = 'https://www.youtube.com/iframe_api';
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    
        window.onYouTubeIframeAPIReady = function () {
    
            $iframe     = $('.youtube-analytics-iframe'),
            iframe      = $iframe.get(0),
            started     = false,
            percentData = $iframe.attr("data-analytics-percents").split(","),
            youtubeVideoId = $video,
            finished    = false,
            percents    = {};

            percentData.forEach(function (item) {
                percents[item] = false;
            });

            player = new YT.Player(iframe, {
                height: '100%',
                width: '100%',
                videoId: youtubeVideoId,
                playerVars: {rel: 0},
                events: {
                    'onReady': onPlayerReady,
                    'onStateChange': onPlayerStateChange
                }
            });

            function onPlayerReady(event) {
                if(!started) {
                    event.target.playVideo();
                }
                $('.close-button').click(function(){
                    percentData.forEach(function (item) {
                        percents[item] = false;
                    });
                    event.target.stopVideo();
                    // $('#youtubeModal').foundation('_destroy');
                });
                // $("#youtubeModal").on('shown.bs.modal', function(){
                //     event.target.playVideo();
                // });
            }
            function onPlayerStateChange(event) {


                var status = event.data;
                if (status === 1 && !started) {

                    var duration = event.target.j.duration,
                        label = event.target.j.videoData.title,


                    started = true;

                    logEvent('start', "video", label);
                    var interval = setInterval(function(){
                        var time = event.target.j.currentTime;
                        percent = Math.round((time / duration) * 100);

                        $.each(percents, function (logPercent, bool) {
                            if (percent >= logPercent && percents[logPercent] === false) {
                                logEvent(logPercent + "%", "video", label);
                                percents[logPercent] = true;
                            }
                        });

                        if (percent > 96 && !finished) {
                            ("complete", "video", label);
                            clearInterval(interval);

                            started = false;

                            percentData.forEach(function (item) {
                                percents[item] = false;
                            });
                        }
                    }, 350);
                }
            }
        }
    }
    
    function bindVimeoVideos() {
        $(".vimeo-analytics-iframe").each(function () {
            var $this       = $(this),
                iframe      = $this.get(0),
                player      = new Vimeo.Player(iframe),
                percentData = $this.attr("data-analytics-percents").split(","),
                label       = $el.attr(settings.labelAttribute),
                finished    = false,
                percents    = {};
    
            percentData.forEach(function (item) {
                percents[item] = false;
            });
    
            $this.on("rescue.video-closed", function () {
                percentData.forEach(function (item) {
                    percents[item] = false;
                });
            });
    
            //console.log(iframe, player);
            player.on('timeupdate', function (data) {
                var percent = data.percent * 100;
    
                $.each(percents, function (logPercent, bool) {
                    if (percent >= logPercent && percents[logPercent] === false) {
                        logEvent(logPercent + "%", "video", label);
                        percents[logPercent] = true;
                    }
                });
    
                if (percent > 96 && !finished) {
                    finished = true;
                    logEvent("complete", "video", label);
                }
            });
        });
    }

    function bindClick() {
        var selector = '[' + settings.clickAttribute + ']';
        $('body').off('click', selector).on('click', selector, function () {
            elementToEvent(this);
        });
    }
    function bindChange() {
        $("body").on("change", "[data-analytics-change]", function () {
            var $element = $(this);
            elementToEvent($element);
        });
    }

    function bindAttributes() {
        bindChange();

        // bindYoutubeVideos();
        // bindVimeoVideos();
        // bindVisibility();

        $(window).off('rescue.rebind-ga').on('rescue.rebind-ga', function () {
            bindClick();
        });
    }

    return {
        setOptions    : setOptions,
        log           : logEvent,
        bindAttributes: bindAttributes,
        bindYoutubeVideos: bindYoutubeVideos
    };
}();

module.exports = gtmEvents;