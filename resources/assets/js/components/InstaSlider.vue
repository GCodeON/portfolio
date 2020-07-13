<template>
    <div class="carousel-working-at-rescue" v-if="feedLoad">
        <div class="grid-x">
        	<div class="website-content cell small-12 medium-5 medium-order-1 small-order-2">
                <div class="website-info">
                    <p>{{ section_info.content }}</p>
                    <p v-if="section_info.linkText" class="instagram-link">
                   		<img src="images/careers/icon-instagram.svg">
                   		<a :href="section_info.url" target="_blank" data-ga-category="page-content" data-ga-click :data-ga-label="section_info.linkText">{{ section_info.linkText }}</a>
                   	</p>
                </div>
            </div>
            <div class="cell medium-7 medium-order-2 small-order-1">
                <div class="slide-container">
                    <div class="slides" id="instafeed"></div>
                    <div class="nav-info">
                         <div class="swipe show-for-small-only text-right instruction-icon" v-if="!userInteraction">
                            <img class="swipe-animation" src="/images/swipe-icon-white.png" alt="swipe left or right">
                        </div>
                        <div class="paging">
                             <span v-if="currentPage < 10">0</span>{{currentPage}} / {{totalPages}}
                        </div>
                        <div class="nav-arrows">
                            <button type="button" data-nav="left" class="left-arrow">&larr;</button>
                            <button type="button" data-nav="right" class="right-arrow">&rarr;</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import 'slick-carousel';
    import 'slick-carousel/slick/slick.css';
    import 'instafeed.js';

    export default {
        name    : "InstaSlider",
        props   : ['info'],
        data() {
            return {
                page      : 0,
                totalPages: 0,
                userInteraction: false,
                feed: null,
                feedLoad: true
            };
        },
        created() {
            this.section_info = JSON.parse(this.info)
        },
        mounted() {
            let vue = this,
                $el = $(this.$el);

            this.feed = new Instafeed({
                get         : "user",
                userId      : "2971542750",
                clientId    : "9edaa5689448481fab288c77dc1b08a5",
                accessToken : "2971542750.1677ed0.4f441ba4f2c14dc4a1be6d7b1d620c16",
                template    : "<a class='slide' href='{{link}}' target='_blank'><div class='insta hover' style='background-image:url(\"{{image}}\")'></div></a>",
                limit       : 10,
                resolution  : "standard_resolution",
                success     : (response) => {
                    setTimeout(() => {
                        this.$carousel = $el.find('#instafeed');
                        this.slick     = this.$carousel.slick({
                            infinite    : true,
                            arrows      : true,
                            prevArrow   : '.nav-arrows [data-nav="left"]',
                            nextArrow   : '.nav-arrows [data-nav="right"]',
                            speed       : 500,
                            fade        : true,
                            cssEase     : 'linear'
                        });

                        this.totalPages = this.$carousel.find('.slide').length;

                        this.$carousel.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
                            vue.userInteraction = true;
                            vue.page = nextSlide;
                        });
                    }, 1000);
                },
                error       : (error) => {
                    console.log('error', error);
                    this.feedLoad = false;
                }
            });
            this.feed.run();
        },
        watch   : {
            navigation: function () {

            }
        },
        computed: {
            navigationOrder: function () {
                console.log(this.page);

            },
            currentPage    : function () {
                return this.page + 1;
            }

        },
        methods : {
            setOrder: function () {

            },

            goToPage  : function (val) {
                this.$carousel.slick('slickGoTo', val);

            },
            nextPage  : function () {

            },
            prevPage  : function () {

            },
            isSelected: function (val) {
                return this.page === val ? 'selected' : '';
            },
        }

    };
</script>

<style scoped>

</style>