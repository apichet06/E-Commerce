var gulp = require('gulp'),
    $ = require('gulp-load-plugins')(),
    pug = require('gulp-pug');
    connect = require('gulp-connect'),
    prettyHtml = require('gulp-pretty-html');

    browserSync = require('browser-sync').create();

var sassPaths = [
    './_app/sass'
];

gulp.task('webserver', function() {
    connect.server({
        livereload: true,
        port: 8000,

    });
});

// Static server
gulp.task('browser-sync', function() {
    browserSync.init({
        server: {
            baseDir: "./"
        }
    });
});


gulp.task('sass', function() {
    return gulp.src('_app/sass/**/*.scss')
        .pipe($.sass({
            includePaths: sassPaths
        })
            .on('error', $.sass.logError))
        .pipe(gulp.dest('./css'))
        .pipe(connect.reload());
});

gulp.task('pug', function() {
    return gulp.src('_app/jade/layouts/*.pug')
        .pipe(pug({
            pretty: true
        }))
        .pipe(gulp.dest('./'))
        .pipe(connect.reload());
})

gulp.task('prettyHTML', function () {
    return gulp.src('./*.html')
        .pipe(prettyHtml())
        .pipe(gulp.dest('./'));
});

gulp.task('watch', ['sass', 'pug'], function() {

    gulp.watch(['./_app/sass/**/*.scss'], ['sass']);
    gulp.watch(['./_app/js/**/*.js'], ['js']);
    gulp.watch(['./_app/jade/**/*.pug'], ['pug']);
});

gulp.task('default', ['sass', 'pug', 'webserver', 'watch']);