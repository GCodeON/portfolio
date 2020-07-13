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
                        ['#16222A', '#3A6073'],
                        ['#000428', '#004e92'],
                        ['#fd746c', '#000'],

						// ['#00d2ff', '#3a7bd5'],
						// ['#4776E6', '#8E54E9'],
						// ['#000428', '#004e92'],
						// ['#FF512F', '#DD2476'],
						// ['#fd746c', '#ff9068'],
						// ['#6a3093', '#a044ff'],
						// ['#76b852', '#8DC26F'],
						// ['#005C97', '#363795']
					]
				},

				'dark-state': {
					gradients: [
						['#16222A', '#3A6073'],
						['#000428', '#004e92']
					]
				},

				'light-state': {
					gradients: [
						['#FF8008', '#FFC837'],
						['#FF512F', '#F09819']
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
		}
	}
};