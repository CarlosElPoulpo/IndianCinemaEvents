/**
 * Created by depac on 19/04/2016.
 */
module.exports = function(grunt){

    require('load-grunt-tasks')(grunt);
    grunt.initConfig({
        concat: {
            options: {
                separator: ';',
            },
            dist: {
                src: ['web/js/bootstrap.min.js', 'web/js/tether.min.js', 'web/js/mdb.min.js'],
                dest: 'web/js/site.js'
            }
        },
        uglify: {
            options: {
                mangle: false
            },
            dist: {
                files: {
                    'web/js/site.min.js': ['web/js/site.js']
                }
            }
        },
        compass: {
            dist: {
                options: {
                    sassDir: 'web/sass',
                    cssDir: 'web/css',
                }
            }
        },
        cssmin: {
            options: {
                shorthandCompacting: false,
                roundingPrecision: -1
            },
            style: {
                files: {
                    'web/css/style.min.css': ['web/css/style.css']
                }
            },
            mdb: {
                files: {
                    'web/css/mdb.min.css': ['web/css/mdb.css']
                }
            }
        },
        watch: {
            css:{
                files: 'web/sass/*.scss',
                tasks: ['compass','cssmin:style'],
                options: {
                    spawn: false,
                },
            },
            /*js:{
                files: 'web/js/custom/*.js',
                tasks: ['concat','uglify'],
                options: {
                    spawn: false,
                },
            }*/
        },
    });
    grunt.registerTask('default', ['compass','cssmin', 'concat'])
}