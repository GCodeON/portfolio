/**
 * Send an AJAX mailchimp list request
 * @param url - url of the form request provided by mailchimp
 * @param data - form data object - field names match expected mailchimp fields
 * @param success - success callback
 * @param error - error callback
 *
 */
function mailchimpRequest(url, data, success, error) {
    success = success || function () {};
    error = error || function () {};

    if (! /post-json/.test(url)) {
        url = url.replace('post', 'post-json');
    }

    $.ajax({
        url     : url,
        dataType: 'jsonp',
        jsonp   : 'c',
        data    : data
    }).then(function (response) {
        if (response.result && response.result === 'error') {
            // do nothing
            error(response);
            return;
        }

        success(response);
        // do nothing

    }, function (response) {
        error('Unknown error occurred');
        // this shouldn't happen
    });
}

module.exports = {
    request: mailchimpRequest
};