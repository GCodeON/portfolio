<template>
  <div>
    <h2>Grid Component</h2>
     <p>Project List</p>
    <ul class="og-grid" id="og-grid">
      <li class="item" v-for="(item, index) in projects" :key="index">
        <a class="link" :href="item.link">
          <h2>{{ item.title }}</h2>
          {{ index }}
          <img :src="item.img.src" :alt="item.img.alt">

        </a>
        
        <div class="og-expander">
          <div class="og-expander-inner">
              <span class="og-close"></span>

              <div class="og-fullimg">
                <div class="og-loading"></div>
                <img :src="item.img.src" :alt="item.img.alt">
              </div>

              <div class="og-details">
                <h3>{{ item.title }}</h3>
                <a :href="item.link">
                  <p>view project</p>
                </a>
              </div>
          </div>
        </div>
      </li>
    </ul>
  </div>
</template>


<script>
export default {
  name       : "grid",
  props      : [],
  components : {
  },
  watch : {},
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
        pageReady : false
      };
  },
  created() {

  },
  mounted() {

  },
  methods: {

  }
}
</script>



<style>

</style>