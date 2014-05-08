module.exports = function(grunt) {
	grunt.initConfig({
		// cssmin: {
		// 	compress: {
		// 		files: {
		// 			'./min.css': ['css/base.css', 'css/style.css']
		// 		}
		// 	}
		// },
		csso: {
			dynamic_mappings: {
				expand: true,
				cwd: 'css/',
				src: ['*.css', '!*.min.css'],
				dest: 'css/',
				ext: '.min.css'
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
