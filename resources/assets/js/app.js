/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');
// var gaEvents      = require('./ga-events.js'),
//     facebookShare = require('./facebook-share.js'),
//     ScrollTo      = require('./scroll-to');

window.RSCG = {};
window.jQuery     = require('jquery');
window.$          = window.jQuery;
window.Vue        = require('vue');
Vue.config.silent = true;

require('foundation-sites');
require('lodash');
require('slick-carousel');
require('scrollmagic');

let youtubeModal = require('./youtube-iframe'),
    slick = require('./slick-custom'),
    menu = require('./menu-custom');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


Vue.component('section-wipes', require('./components/SectionWipes.vue'));
Vue.component('github-user', require('./components/GithubUser.vue'));

const app = new Vue({
    el: '#myApp'
});

// Required for laravel ajax calls
function ajaxCsrfSetup() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}

function foundationInit() {
    Foundation.Abide.defaults.patterns['zip']          = /^\d{5}(-\d{4})?$/;
    Foundation.Abide.defaults.validators['min_length'] = function ($el, required, parent) {
        if (!required) return true;
        var minLength = $el.attr('data-min-length') || 1,
            length    = $el.val().length;
        return length >= minLength;
    };
    $(document).foundation();
    $(document).trigger('foundationLoaded');
}


function init() {
    $(function () {
        // Initialize everything here
        ajaxCsrfSetup();
        foundationInit();
        menu.bindNavMenu();
        menu.bindFixedMenu('#menu .fixed-header', -100);
        
        // slick.customSlider();
        // youtubeModal.iframeApi();
    });

}

init();