module.exports = {
	init: function() {
		this.verticalAlign();
		this.bgAnimation();
	},

	verticalAlign: function() {
		$(window).on('resize', align);
		align();

		function align() {
			var $wrapper = $('#canvas-wrapper');
			var $content = $wrapper.find('.content-wrapper');
			var pageHeight = $wrapper.height();
			var contentHeight = $content.height();
			var margin = pageHeight / 2 - contentHeight / 2;

			// $content.css({
			// 	marginTop: margin > 0 ? margin : 0,
			// 	visibility: 'visible'
			// });
		}
	},

	bgAnimation: function() {
		var backgroundGradient = new Granim({
			element: '#gradient',
			name: 'background-gradient',
			direction: 'diagonal',
			stateTransitionSpeed: 1000,
			opacity: [1, 1],
			states : {
				'default-state': {
					gradients: [
						['#000','#3A6073'],
                        ['#fd746c', '#000'],
						['#00d2ff','#000', '#3a7bd5'],
					]
				},

				'dark-state': {
					gradients: [
						['#000', '#1D976C']
					]
				},

				'light-state': {
					gradients: [
						['#000', '#0077b5'],
					]
				},

				'menu': {
					gradients: [
						['#3a7bd5', '#000'],
					]
				}
				
			}
		});

		if (window.innerWidth > 768) {
			$('#dark-state').hover(
				function() {
					backgroundGradient.changeState('dark-state');
				},
				function() {
					backgroundGradient.changeState('default-state')
				}
			);

			$('#light-state').hover(
				function() {
					backgroundGradient.changeState('light-state')
				},
				function() {
					backgroundGradient.changeState('default-state')
				}
			);

			$('.mobile-menu-open').hover(
				function() {
					backgroundGradient.changeState('menu')
				},
				function() {
					backgroundGradient.changeState('default-state')
				}
			);
		}
	}
};