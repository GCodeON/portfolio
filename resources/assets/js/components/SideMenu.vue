<template>
    <div>
		<div>
			<img class="user-image" :src="user.avatar_url">
			{{ user.name }}
			<br>
			{{ user.login }}
			<br>
			{{ user.location }}
			<br>
			{{ user.bio }}
		
		</div>
	</div>
</template>

<script>
	import axios from 'axios';

	var vue;

    export default {
        name   : "name",
        components: {},
        props: [],
        data() {
			vue = this;
            return {
				data: {},
				user: {}
            };
        },
        created() {
        },
        mounted() {
		 this.getUser();
        },
        computed: {},
        watch: {},
        methods: {
			getUser: () => {
				axios.get('https://api.github.com/users/GCodeOn')
				.then(function (response) {
					// handle success
					console.log(response);
					vue.user = response.data;
					console.log('data', vue.user);
				})
				.catch(function (error) {
					// handle error
					console.log(error);
				})
				.finally(function () {
					// always executed
				}); 
			}
		},
    };
</script>

<style  lang="scss" scoped>

.user-image {
	border-radius: 100px;
    width: 6em;
}
    
</style>
