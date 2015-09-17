// https://github.com/gruntjs/grunt-contrib-sass
module.exports = {
	options: {
		//sourcemap: 'none'
	},
	nested: {
		options: {
			style: 'nested'
		},
		files: {
			'css/style.css': 'css/sass/style.scss'
		}
	},
	compressed: {
		options: {
			style: 'compressed'
		},
		files: {
			'css/style.min.css': 'css/sass/style.scss'
		}
	}
};
