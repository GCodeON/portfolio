<template>
    <div id="pinContainer">
        <div id="slideContainer">
            <section class="panel blue">
                <b>ONE</b>
            </section>
            <section class="panel turqoise">
                <b>TWO</b>
            </section>
            <section class="panel green">
                <b>THREE</b>
            </section>
            <section class="panel bordeaux">
                <b>FOUR</b>
            </section>
        </div>
    </div>
</template>

<script>
import ScrollMagic from 'scrollmagic';
		// init
    export default {
        name   : "name",
        components: {},
        props: {},
        data() {
            return {

            }
        },
        created() {
        },
        mounted() {
		var controller = new ScrollMagic.Controller();

		// define movement of panels
		var wipeAnimation = new TimelineMax()
			// animate to second panel
			.to("#slideContainer", 0.5, {z: -150})		// move back in 3D space
			.to("#slideContainer", 1,   {x: "-25%"})	// move in to first panel
			.to("#slideContainer", 0.5, {z: 0})				// move back to origin in 3D space
			// animate to third panel
			.to("#slideContainer", 0.5, {z: -150, delay: 1})
			.to("#slideContainer", 1,   {x: "-50%"})
			.to("#slideContainer", 0.5, {z: 0})
			// animate to forth panel
			.to("#slideContainer", 0.5, {z: -150, delay: 1})
			.to("#slideContainer", 1,   {x: "-75%"})
			.to("#slideContainer", 0.5, {z: 0});

		// create scene to pin and link animation
		
		new ScrollMagic.Scene({
				triggerElement: "#pinContainer",
				triggerHook: "onLeave",
				duration: "500%"
			})
			.setPin("#pinContainer")
			.setTween(wipeAnimation)
			.addIndicators() // add indicators (requires plugin)
			.addTo(controller);
        },
        computed: {},
        watch: {},
        methods: {},
    };
</script>

<style scoped>

    #pinContainer {
		width: 100%;
		height: 100%;
		overflow: hidden;
		-webkit-perspective: 1000;
		        perspective: 1000;
	}
	#slideContainer {
		width: 400%; /* to contain 4 panels, each with 100% of window width */
		height: 100%;
	}
	.panel {
		height: 100%;
		width: 25%; /* relative to parent -> 25% of 400% = 100% of window width */
		float: left;
    }
    
</style>
