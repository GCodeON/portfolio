
import {Carousel, Slide} from 'vue-carousel';

export default {
    name      : "RescueCarousel",
    components: {
        Carousel,
        Slide
    },
    props     : {},
    data() {
        return {
            page      : 0,
        };
    },
    created() {
    },
    mounted() {
    },
    computed  : {},
    watch     : {},
    methods   : {
        selectNav : function () {

        },
        isSelected: function (val) {
            return this.page == val ? 'selected' : '';
        },
        goToPage  : function (val) {
            this.$refs.carousel.pauseAutoplay();
            this.$refs.carousel.goToPage(val);
        },
        pageChange: function (val) {
            console.log(val);
            this.page = val;
        }
    },
};