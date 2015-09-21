// https://github.com/gruntjs/grunt-contrib-watch
module.exports = {
	css: {
		files: ['**/*.scss'],
		tasks: ['sass']
	},
	js: {
		files: ['js/src/*.js'],
		tasks: ['uglify:dist']
	},
	"js-checkout": {
		files: ['js/src/checkout/*.js'],
		tasks: ['uglify:checkout']
	},
	"js-academy": {
		files: ['js/src/academy/*.js'],
		tasks: ['uglify:academy']
	}
};
