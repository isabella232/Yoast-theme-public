module.exports = function(grunt) {
	'use strict';

	require('time-grunt')(grunt);

	// Define project configuration
	var project = {
		paths: {
			get config() {
				return this.grunt + 'config/';
			},
			grunt: 'grunt/',
		},
		pkg: grunt.file.readJSON( 'package.json' )
	};

	// Load Grunt configurations and tasks
	require( 'load-grunt-config' )(grunt, {
		configPath: require( 'path' ).join( process.cwd(), project.paths.config )
	});
};
