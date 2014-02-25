module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    clean: ['templates/includes/scripts/*'],
    uglify: {
      options: {
        banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n',
        wrap: 'wrapper',
        preserveComments: false
      },
      build: {
        src: ['scripts/modernizr-tests.js',
        'scripts/primary-nav.js',
        'scripts/search-bar.js',
        'scripts/vendor/jquery.autocomplete.js',
        'scripts/vendor/jquery.mockjax.js',
        'scripts/vendor/jquery.hoverIntent.minified.js'],
        dest: 'templates/includes/scripts/<%= pkg.name %>.min.js'
      }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-hash');
  grunt.loadNpmTasks('grunt-contrib-clean');

  // clean out the old js, compress new js
  grunt.registerTask('default', ['clean', 'uglify']);
};