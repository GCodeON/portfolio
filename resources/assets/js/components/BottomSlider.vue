<template>
    <div class="container">
		<div class="hero">
			<div class="hero__back hero__back--static"></div>
			<div class="hero__back hero__back--mover" ref="hero-mover"></div>
			<div class="hero__front"></div>
		</div>
		<div class="stack-slider" ref="stack-slider">
			<flickity 
                class="stacks-wrapper" 
                ref="stacks-wrapper"  
                :options="flickityOptions" 
                v-images-loaded="imagesLoaded">
                
				<div class="stack" v-for="(stack, index) in stacks" :key="index">
					<h2 class="stack-title" v-on:click="toggle(index, $event)">
                        <!-- <a href="#" data-text="Portraits"> -->
                            <!-- <span> -->
                                {{ stack.title }}
                            <!-- </span> -->
                        <!-- </a> -->
                    </h2>
					<div class="item" v-for="(item, index) in stack.items" :key="index">
						<div class="item__content">
							<img :src="item.img" :alt="item.alt" />
							<h3 class="item__title">
                                {{ item.title }} 
                                <span class="item__date">{{ item.subtitle }}</span>
                            </h3>
							<div class="item__details">
								{{ item.info }}
							</div>
						</div>
					</div>
				</div>

			</flickity>
		</div>
		<img class="loader" src="" width="60" alt="Loader image" />
	</div>

</template>

<script>
    import Flickity from 'vue-flickity';
    import imagesLoaded from 'vue-images-loaded';

    var bodyEl = document.body,
        docElem = window.document.documentElement,
        win = {
            width: window.innerWidth, 
            height: window.innerHeight
        };
    
    export default {
        name       : "BottomSlider",
        components : {
             Flickity
        },
        directives: {
            imagesLoaded
        },
        props      : {},
        data() {
            return {
                slider          : true,
                canOpen         : true,
                moveHeroImage   : true,
                isFireFox       : typeof InstallTrigger !== 'undefined',
                flickityOptions : {
                    wrapAround      : true,
                    imagesLoaded    : true,
                    initialIndex    : 0,
                    setGallerySize  : false,
                    pageDots        : false,
                    prevNextButtons : false
                },
                stacks: [
                    {
                        title : "project1",
                        items : [
                            {
                                img      : "",
                                alt      : "",   
                                title    : "test",
                                subtitle : "",
                                info     : ""
                            }
                        ]

                    },
                    {
                        title : "Project2",
                        items : [
                            {
                                img      : "",
                                title    : "test",
                                subtitle : "",
                                info     : ""
                            }
                        ]

                    },
                    {
                        title : "Project3",
                        items : [
                            {
                                img      : "",
                                title    : "test",
                                subtitle : "",
                                info     : ""
                            }
                        ]

                    },
                ]
            }
        },
        created() {
        },
        mounted() {
            console.log("slider", this.$refs['stack-slider']);
            console.log("stacks-wrapper", this.$refs['stacks-wrapper']);
            console.log("stacks", $('.stack'));
            console.log("hero-mover", this.$refs['hero-mover']);
        },
        computed : {},
        watch    : {},
        methods  : {
            scrollY: () => { 
                return window.pageYOffset || docElem.scrollTop; 
            },
            throttle: (fn, delay) => {
                let allowSample = true;

                return () => {
                    if(allowSample) {
                        allowSample = false;

                        setTimeout(() => {
                            allowSample = true;
                        }, delay)

                        fn(e);
                    }
                }
            }, 
            imagesLoaded: () => {
                console.log("loaded");
                bodyEl.classList.add('view-init');
            },
            toggle: function(index, event) {
                console.log("title clicked",index, event, event.target.parentElement);
                event.preventDefault();

                if(this.canOpen) {
                    console.log("can open after click");
                    this.moveHeroImage = false;
                    bodyEl.classList.add('view-full');
                    bodyEl.classList.add('move-items');
                }
            }
        },
    };
</script>

<style scoped>

</style>