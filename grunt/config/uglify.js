// https://github.com/gruntjs/grunt-contrib-uglify
module.exports = {
	dist: {
		options: {
			banner: '/* -- Yoast.js -- */ \n\n',
			preserveComments: false
		},
		src: [
			'js/src/*.js'
		],
		dest: 'js/yoast.js'
	},
	checkout: {
		options: {
			preserveComments: false
		},
		src: [
			'js/src/checkout/*.js'
		],
		dest: 'js/checkout.min.js'
	},
	"jquery-validate": {
		src: [ 'bower_components/jquery.payment/lib/jquery.payment.js' ],
		dest: 'js/includes/jquery.payment.min.js'
	}
};
