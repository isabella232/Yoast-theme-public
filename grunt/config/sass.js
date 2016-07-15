// https://github.com/sindresorhus/grunt-sass
module.exports = {
	options: {
		precision: 5,
		sourceMap: true
	},
	compressed: {
		options: {
			outputStyle: 'compressed'
		},
		files: {
			'css/style.min.css': 'css/sass/style.scss',
			'css/editor-style.min.css': 'css/sass/editor-style.scss',
			'css/certificate.min.css': 'css/sass/certificate.scss',
			'css/jquery-modal.min.css': 'css/sass/jquery.modal.scss'
		}
	}
};
