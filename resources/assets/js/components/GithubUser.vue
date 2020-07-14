<template>
    <div class="github-container">
		<div class="user">
			<logo-svg></logo-svg>
			<img class="user-image" 
				:src="user.avatar_url">
			<br>
			<div class="details" data-aos="zoom-in">
				<h5 class="username">{{ user.name }}</h5>
				<p>Full Stack Web Developer</p>
				<!-- <p>{{ user.login }}</p>
				<p>{{ user.bio }}</p> -->
				<div class="links">
					<ul class="menu icons">
						<li id="dark-state">
							<a href="https://github.com/GCodeON" target="_blank">
								<i class="fab fa-github"></i>
							</a>
						</li>
						<li id="light-state">
							<a href="https://www.linkedin.com/in/gerardo-soto-becerra/" target="_blank">
								<i class="fab fa-linkedin"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<cover-flow></cover-flow>
	</div>
</template>

<script>
	import axios from 'axios';

	var vue;

    export default {
        name   : "githubUser",
        components: {
		},
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
				user: {
					email: 'gcodeondev@gmail.com'
				}
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
					vue.user = response.data;
				})
				.catch(function (error) {
					console.log(error);
				})
				.finally(function () {
				}); 
			}
		},
    };
</script>

<style  lang="scss" scoped>

	.github-container {
		text-align : center;
		position   : relative;

		#codon-logo {
            width  : 120px;
            margin : 0 auto;
        }
		svg {
			animation : rotate 10s infinite linear;
	
			#codon {
				display : none;
			}
		}

		.links {
			display        : inline-block;
			vertical-align : middle;
			max-width      : 100%;
			height         : auto;

			li {
				font-size: 2em;

				i {
					color: white;
				}
			}
		}

		.user-image {
			    border-radius : 100px;
			    width         : 75px;
			    z-index       : 2;
			    position      : absolute;
			    left          : 0;
			    top           : 21px;
			    right         : 0;
			    bottom        : 0;
			    margin        : 0 auto;
		}
		.details {
			width  : 300px;
			margin : 0 auto;
			.username {
				text-transform : uppercase;
			}
		}
	}    
</style>
