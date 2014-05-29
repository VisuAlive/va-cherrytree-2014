module.exports = function(grunt) {
	grunt.initConfig({
		// cssmin: {
		// 	minify: {
		// 		expand: true,
		// 		cwd: 'css/',
		// 		src: ['**/*.css', '!**/*.min.css'],
		// 		dest: 'css/',
		// 		ext: '.min.css',
		// 		options: {
		// 			noAdvanced: true,
		// 		}
		// 	}
		// },
		csso: {
			dynamic_mappings: {
				expand: true,
				cwd: 'css/',
				src: ['*.css', '!*.min.css'],
				dest: 'css/',
				ext: '.min.css',
				options: {
					restructure: false
				}
			}
		},
		watch: {
			csso:{
				files: ['css/*.css'],
				tasks: ['csso']
			}
		}
	});

	grunt.loadNpmTasks('grunt-csso');
	grunt.loadNpmTasks('grunt-contrib-watch');

	grunt.registerTask('default', ['watch', 'csso']);
};
