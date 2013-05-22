/*global module:false*/
module.exports = function(grunt) {

// Project configuration.
grunt.initConfig({
	pkg: grunt.file.readJSON('package.json'),
	concat: {
		js: {
			src: [
				// list the files as array items in order, if their order of inclusion matters.
			],
			dest: '../assets/js/<%= pkg.name %>.js'
		},
		css: {
			src: [
				// list the files as array items in order, if their order of inclusion matters.
				'../assets/css/screen.css'
			],
			dest: '../assets/css/<%= pkg.name %>.css'
		}
	},
	jshint: {
		options: {
			curly: true,
			eqeqeq: true,
			immed: true,
			latedef: true,
			newcap: true,
			noarg: true,
			sub: true,
			undef: true,
			boss: true,
			eqnull: true,
			browser: true
		},
		globals: {
			"jQuery": true,
			"$": true
		},
		all: [
			'Gruntfile.js',
			'../assets/js/**/*.js'
		]
	},
	compass: {
		dev: {
			options: {
				basePath: '../',
				config: '../config.rb',
				app: 'stand_alone',
				sassDir: 'assets/scss',
				cssDir: 'assets/css'
			}
		}
	},
	uglify: {
		my_target: {
			files: {
				'../assets/compiled/<%= pkg.name %>.min.js': '<%= grunt.config("concat.js.dest") %>'
			}
		}
	},
	cssmin: {
		compress: {
			files: {
			'../assets/compiled/<%= pkg.name %>.min.css': '<%= grunt.config("concat.css.dest") %>'
			}
		}
	},
	watch: {
		compass: {
			files: ['../assets/scss/**/*.scss'],
			tasks: ['compass:dev']
		},
		jshint: {
			files: '<%= jshint.all %>',
			tasks: ['jshint:files']
		}
	},
	'ftp-deploy': {
		dev: {
			auth: {
				host: '',
				port: 22,
				authKey: 'key-dev'
			},
			src: '../',
			dest: '/var/www/htdocs',
			exclusions: [
				'../**/.sass-cache',
				'../**/.DS_Store',
				'../**/Thumbs.db',
				'../**/.hg*',
				'../_build/*',
				'../_data/*',
				'../config.rb'
			]
		}
	},
	'sftp-deploy': {
		dev: {
			auth: {
				host: '',
				port: 22,
				authKey: 'key-dev'
			},
			src: '..',
			dest: '/var/www/htdocs',
			exclusions: [
				'**/.sass-cache',
				'**/.DS_Store',
				'**/Thumbs.db',
				'**/.hg*',
				'**/_build/*',
				'**/_data/*',
				'../**/.sass-cache',
				'../**/.DS_Store',
				'../**/Thumbs.db',
				'../**/.hg*',
				'../_build/*',
				'../_data/*',
				'../config.rb'
			]
		}
	}
});

grunt.loadNpmTasks('grunt-css');
grunt.loadNpmTasks('grunt-ftp-deploy');
grunt.loadNpmTasks('grunt-sftp-deploy');
grunt.loadNpmTasks('grunt-contrib-concat');
grunt.loadNpmTasks('grunt-contrib-uglify');
grunt.loadNpmTasks('grunt-contrib-cssmin');
grunt.loadNpmTasks('grunt-contrib-jshint');
grunt.loadNpmTasks('grunt-contrib-compass');
grunt.loadNpmTasks('grunt-contrib-watch');

// Default task.
grunt.registerTask('default', ['jshint', 'compass:dev', 'concat', 'uglify', 'cssmin']);

// Other tasks
grunt.registerTask('deploy-dev', ['jshint', 'compass:dev', 'concat', 'uglify', 'cssmin', 'sftp-deploy:dev']);

};