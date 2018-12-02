/**
 * Send an AJAX mailchimp list request
 * @param url - url of the form request provided by mailchimp
 * @param data - form data object - field names match expected mailchimp fields
 * @param success - success callback
 * @param error - error callback
 *
 */
function iframeApi() {
    var tag = document.createElement('script');
        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        var player;
        $iframe     = $('.youtube-analytics-iframe'),
        iframe      = $iframe.get(0)

        window.onYouTubeIframeAPIReady = function() {
            player = new YT.Player(iframe, {
                height: '100%',
                width: '100%',
                videoId: '',
                playerVars: {rel: 0},
                events: {
                    'onReady': onPlayerReady
                }
            });
        }
        function onPlayerReady(event) {
            $('.close-button').click(function(){
                event.target.pauseVideo();
            });

            $('.videoThumbnail').click(function(){
                $youtubeId =  $(this).attr('name');
                player.loadVideoById($youtubeId);
            });
        }
}

module.exports = {
    iframeApi: iframeApi
};