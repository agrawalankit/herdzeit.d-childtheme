/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
module.exports = function (grunt) {
    // Project configuration.
    grunt.initConfig({
        
        
        pkg: grunt.file.readJSON('package.json'),
        
        /**
         * sass task
         */
    sass: {                              // Task
        dev: {                            // Target
            options: {                       // Target options
            style: 'expanded',
            sourcemap: 'none'
            },
        files: {                         // Dictionary of files
        'css/style-readable.css': 'scss/main.scss',       // 'destination': 'source'
       
        }
      },
       dist: {                            // Target
            options: {                       // Target options
            style: 'compressed',
            sourcemap: 'none'
            },
        files: {                         // Dictionary of files
        'css/style.css': 'scss/main.scss',       // 'destination': 'source'
       
        }
      }
  },
  autoprefixer: {
    options: {
      browsers: ['last 2 versions']
    },
   multiple_files: {
      expand: true,
      flatten: true,
      src: 'css/*.css',
      dest:''
    },
  },
   uglify: {
    options: {
      mangle: {
        except: ['jQuery', 'Backbone']
      }
    },
    my_target: {
      files: {
        'js/main.min.js': ['bootstrap.js', 'js/dev/main.js']
      }
    }
  },

        /**
         * watch task
         */
        watch: {
            
            css:{
                files: ['**/*.scss','**/*.js'],
                tasks: ['sass', 'autoprefixer', 'uglify']
            }
            
            
        }
        
    });
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.registerTask('default', ['watch']);
};
