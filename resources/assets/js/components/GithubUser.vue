<template>
    <div class="github-container">
		<div class="user">
			<img class="user-image" 
				:src="user.avatar_url">
			<br>
			<div class="details">
				<p>{{ user.name }}</p>
				<p>{{ user.login }}</p>
				<p>{{ user.location }}</p>
				<!-- <p>{{ user.bio }}</p> -->
			</div>
		</div>
	</div>
</template>

<script>
	import axios from 'axios';

	var vue;

    export default {
        name   : "Github User",
        components: {},
        props: {
			username : {
				type: String,
				default: 'GCodeOn'
			}
		},
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
				axios.get(`https://api.github.com/users/${vue.username}`)
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
	width        : 6em;
	z-index      : 2;
	position     : relative;
}
.github-container {
	text-align: center;
}

.details {
	// background: white;
	// color     : black;
	margin       : 2em;
	padding      : 4em 2em;
	transform    : translateY(-75px);
	border-radius: 50px;
	width        : 75vw;
	margin       : 0 auto;
}
    
</style>
