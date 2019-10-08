<template>
    <div class="container">
		<div class="hero">
			<div class="hero__back hero__back--static"></div>
			<div class="hero__back hero__back--mover" ref="hero-mover"></div>
			<div class="hero__front"></div>
		</div>
		<div class="stack-slider" ref="stack-slider">
			<flickity class="stacks-wrapper" ref="stacks-wrapper"  :options="flickityOptions" v-images-loaded="imagesLoaded">
				<div class="stack">
					<h2 class="stack-title"><a href="#" data-text="Portraits"><span>Portraits</span></a></h2>
					<div class="item">
						<div class="item__content">
							<img src="img/type1/1.jpg" alt="img01" />
							<h3 class="item__title">Hoodie stumptown kitsch <span class="item__date">05/05/2015</span></h3>
							<div class="item__details">
								<ul>
									<li><i class="icon icon-camera"></i><span>Canon PowerShot S95</span></li>
									<li><i class="icon icon-focal_length"></i><span>22.5mm</span></li>
									<li><i class="icon icon-aperture"></i><span>&fnof;/5.6</span></li>
									<li><i class="icon icon-exposure_time"></i><span>1/1000</span></li>
									<li><i class="icon icon-iso"></i><span>80</span></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="stack">
					<h2 class="stack-title"><a href="#" data-text="Landscape"><span>Landscape</span></a></h2>
					<div class="item">
						<div class="item__content">
							<img src="img/type3/1.jpg" alt="img01" />
							<h3 class="item__title">Austin flannel salvia <span class="item__date">05/05/2015</span></h3>
							<div class="item__details">
								<ul>
									<li><i class="icon icon-camera"></i><span>Canon PowerShot S95</span></li>
									<li><i class="icon icon-focal_length"></i><span>22.5 mm</span></li>
									<li><i class="icon icon-aperture"></i><span>&fnof;/5.6</span></li>
									<li><i class="icon icon-exposure_time"></i><span>1/1000</span></li>
									<li><i class="icon icon-iso"></i><span>80</span></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="stack">
					<h2 class="stack-title"><a href="#" data-text="Miscellaneous"><span>Miscellaneous</span></a></h2>
					<div class="item">
						<div class="item__content">
							<img src="img/type2/1.jpg" alt="img01" />
							<h3 class="item__title">Chambray fingerstache <span class="item__date">05/05/2015</span></h3>
							<div class="item__details">
								<ul>
									<li><i class="icon icon-camera"></i><span>Canon PowerShot S95</span></li>
									<li><i class="icon icon-focal_length"></i><span>22.5 mm</span></li>
									<li><i class="icon icon-aperture"></i><span>&fnof;/5.6</span></li>
									<li><i class="icon icon-exposure_time"></i><span>1/1000</span></li>
									<li><i class="icon icon-iso"></i><span>80</span></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="stack">
					<h2 class="stack-title"><a href="#" data-text="Wildlife"><span>Wildlife</span></a></h2>
					<div class="item">
						<div class="item__content">
							<img src="img/type4/1.jpg" alt="img01" />
							<h3 class="item__title">Kickstarter keffiyeh <span class="item__date">05/05/2015</span></h3>
							<div class="item__details">
								<ul>
									<li><i class="icon icon-camera"></i><span>Canon PowerShot S95</span></li>
									<li><i class="icon icon-focal_length"></i><span>22.5 mm</span></li>
									<li><i class="icon icon-aperture"></i><span>&fnof;/5.6</span></li>
									<li><i class="icon icon-exposure_time"></i><span>1/1000</span></li>
									<li><i class="icon icon-iso"></i><span>80</span></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</flickity>
			<!-- /stacks-wrapper -->
		</div>
		<!-- /stacks -->
		<img class="loader" src="img/three-dots.svg" width="60" alt="Loader image" />
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
        },

        support = { transitions: Modernizr.csstransitions },
		// transition end event name
		transEndEventNames = { 'WebkitTransition': 'webkitTransitionEnd', 'MozTransition': 'transitionend', 'OTransition': 'oTransitionEnd', 'msTransition': 'MSTransitionEnd', 'transition': 'transitionend' },
		transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
		onEndTransition = function( el, callback ) {
			var onEndCallbackFn = function( ev ) {
				if( support.transitions ) {
					if( ev.target != this ) return;
					this.removeEventListener( transEndEventName, onEndCallbackFn );
				}
				if( callback && typeof callback === 'function' ) { callback.call(this); }
			};
			if( support.transitions ) {
				el.addEventListener( transEndEventName, onEndCallbackFn );
			}
			else {
				onEndCallbackFn();
			}
		}
    
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
                }
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
            }
        },
    };
</script>

<style scoped>

</style>