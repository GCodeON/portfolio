<template>
    <div class="github-container">
		<div class="user">
			<codon></codon>
			<img class="user-image" 
				:src="user.avatar_url">
			<br>
			<div class="details">
				<p class="username">{{ user.name }}</p>
				<p>{{ user.login }}</p>
				<p>{{ user.location }}</p>
				<p>{{ user.bio }}</p>
			</div>
			<div class="footer">
    <div class="grid-container">
        <div class="grid-x align-bottom">
            <div class="cell medium-6 large-5">
                <div class="grid-x">
                    <div class="cell medium-6">
                        <div class="links">
                            <ul class="menu icons">
                                <li>
                                    <a href="/github" target="_blank">
                                        <i class="fab fa-github"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="/facebook" target="_blank">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cell medium-6 large-7">
                <div class="detail-block">
                    <div class="grid-x">

                        <div class="cell medium-11 small-12 align-self-bottom">
                            <div class="contact-info">
                            <br> gsoto@gcodeon.dev
                            </div>
                            <small class="copyright">
                                Copyright © 2019 GCodeOn <br>All Rights Reserved.
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
		</div>
	</div>
</template>

<script>
	import axios from 'axios';

	var vue;

    export default {
        name   : "githubUser",
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
		.details {
			width: 300px;
			margin : 0 auto;
			.username {
				text-transform: uppercase;
			}
		}
	}    
</style>
