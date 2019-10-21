<template>
  <div id="coverflow">
    <carousel-3d v-if="pageReady"
      :width="coverflow.width"
      :height="coverflow.height"
      :controls-visible="true" 
      :controls-width="coverflow.cwidth" 
      :controls-height="coverflow.cheight" 
      :autoplay="coverflow.autoplay" 
      :autoplay-timeout="coverflow.autoplayTimeout" 
      :display="coverflow.display"
      @after-slide-change="onAfterSlide">

      <slide class="project"
        v-for="(item, i) in projects" 
        :index="i" :key="i" 
        @click="goToSlide(i)">
          <img :src="item.img.src" :alt="item.img.alt">
          <div class="info">
            <h4 class="title">{{ item.title }} </h4>
            <hr>
          </div>
      </slide>

    </carousel-3d>
  </div>
</template>

<script>
import { Carousel3d, Slide } from 'vue-carousel-3d';

export default {
  name       : "coverflow",
  props      : [],
  components : {
    Carousel3d,
    Slide
  },
  watch : {

  },
  data() {

     $.get('api/cms/projects', (response) => {
          this.projects = response.projects;
          
          console.log('projects data', response, this.projects);

          this.$nextTick(() => {
              this.$emit('rendered');
              setTimeout(() => {
                  this.pageReady = true;
              }, 200)
          });
      });
      return {
        projects  : [],
        pageReady : false,
        coverflow : {
          width           : 600,
          height          : 500,
          cwidth          : 30,
          cheight         : 60,
          autoplay        : true,
          autoplayTimeout : 4000,
          display         : 3
        }
      };
  },
  created() {

  },
  mounted() {

  },
  methods: {
     onAfterSlide(index) {
     
    },
    goToSlide(index) {
      this.$refs.mycarousel.goSlide(index)
    }
  }
}
</script>



<style lang="scss" scoped>
  .grid {
    max-width : 75rem;
    margin    : 0 auto;
  }
  .carousel-3d-controls span{
      color : get-color(tertiary);
  }
  .project {
        background : none;
        border     : none;

        .info {
          margin     : 0 auto;
          display    : none;
          text-align : center;
          hr {
            border-bottom-color : get-color(primary);
            width               : 100px;
          }
        }
        &.current {
          .info {
            display : block;
          }
        }
  }
</style>