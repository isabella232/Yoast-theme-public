// https://github.com/sindresorhus/grunt-sass
module.exports = {
	options: {
		precision: 5
	},
	nested: {
		options: {
			outputStyle: 'nested'
		},
		files: {
			'css/style.css': 'css/sass/style.scss',
			'css/editor-style.css': 'css/sass/editor-style.scss'
		}
	},
	compressed: {
		options: {
			outputStyle: 'compressed'
		},
		files: {
			'css/style.min.css': 'css/sass/style.scss',
			'css/editor-style.min.css': 'css/sass/editor-style.scss'
		}
	}
};
