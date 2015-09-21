// https://github.com/gruntjs/grunt-contrib-uglify
module.exports = {
	options: {
		preserveComments: false
	},
	dist: {
		options: {
			banner: '/* -- Yoast.js -- */ \n\n',
		},
		src: [
			'js/src/*.js'
		],
		dest: 'js/yoast.js'
	},
	checkout: {
		src: [
			'js/src/checkout/*.js'
		],
		dest: 'js/checkout.min.js'
	},
	academy: {
		src: [
			'js/src/academy/*.js'
		],
		dest: 'js/academy.min.js'
	},
	"jquery-validate": {
		src: [ 'bower_components/jquery.payment/lib/jquery.payment.js' ],
		dest: 'js/includes/jquery.payment.min.js'
	}
};
