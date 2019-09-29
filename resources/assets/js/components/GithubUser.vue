<template>
    <div class="github-container">
		<div class="user">
			<dna-ring></dna-ring>
			<img class="user-image" 
				:src="user.avatar_url">
			<br>
			<div class="details">
				<p class="username">{{ user.name }}</p>
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
	.github-container {
		text-align: center;
		position  : relative;

		.user-image {
			    border-radius: 100px;
			    width        : 125px;
			    z-index      : 2;
			    position     : absolute;
			    left         : 0;
			    top          : 36px;
			    right        : 0;
			    bottom       : 0;
			    margin       : 0 auto;
		}
	}

	.details {
		padding: 2em;
		width  : 75vw;
		margin : 0 auto;
		.username {
			text-transform: uppercase;
		}
	}
    
</style>
