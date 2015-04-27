module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    clean: {
      scripts: ['templates/includes/scripts/*'],
      hooks: ['.git/hooks/pre-commit']
    },
    uglify: {
      options: {
        banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n',
        preserveComments: false,
        mangle: {
          except: 'nav'
        }
      },
      build: {
        src: ['scripts/vendor/foundation/foundation.js',
        'scripts/vendor/foundation/foundation.*.js',
        'scripts/modernizr-tests.js',
        'scripts/primary-nav.js',
        'scripts/search-bar.js',
        'scripts/vendor/jquery.autocomplete.js',
        'scripts/vendor/jquery.mockjax.js',
        'scripts/vendor/jquery.hoverIntent.minified.js',
        'scripts/global-htdocs.js',
        'scripts/search-cancel-button.js',
        'scripts/handlebars-v1.3.0.js',
        'scripts/date-picker.js'],
        dest: 'templates/includes/scripts/<%= pkg.name %>.min.js'
      }
    },
    shell: {
      hooks: {
        command: 'cp git-hooks/pre-commit .git/hooks/ && chmod -R +x .git/hooks/'
      }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-shell');
  grunt.loadNpmTasks('grunt-contrib-clean');

  // clean out the old js, compress new js
  grunt.registerTask('mini', ['clean:scripts', 'uglify']);
  // create pre-commit hook
  grunt.registerTask('githook', ['clean:hooks', 'shell:hooks']);
};
