module.exports = function(grunt) {

//
// look into hashing
//

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    uglify: {
      options: {
        banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n',
        wrap: 'wrapper',
        preserveComments: false
      },
      build: {
        src: 'scripts/*.js',
        dest: '<%= pkg.name %>.min.js'
      }
    },
  });

  // Load the plugin that provides the "uglify" task.
  grunt.loadNpmTasks('grunt-contrib-uglify');
};