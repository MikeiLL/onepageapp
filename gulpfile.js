// Source https://css-tricks.com/gulp-for-beginners/
// If we want to make BrowserSync work check out
// this link: http://stackoverflow.com/questions/42456424/browsersync-within-a-docker-container
// Updated based on https://gist.github.com/torgeir/8507130

var gulp = require('gulp'),
	sass = require('gulp-sass'),
	bower = require('gulp-bower'),
	autoprefixer = require('gulp-autoprefixer'),
    minifycss = require('gulp-minify-css'),
    jshint = require('gulp-jshint'),
    uglify = require('gulp-uglify'),
    imagemin = require('gulp-imagemin'),
    rename = require('gulp-rename'),
    clean = require('gulp-clean'),
    concat = require('gulp-concat'),
    notify = require('gulp-notify'),
	cache = require('gulp-cache'),
	livereload = require('gulp-livereload'),
	flatten = require('gulp-flatten')
    lr = require('tiny-lr'),
	server = lr();

gulp.task('hello', function() {
      console.log('Hello Tom and Mike');
});

// Styles
gulp.task('styles', function() {
  return gulp.src('assets/styles/main.scss')
    .pipe(sass({ style: 'expanded', }))
    .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
    .pipe(gulp.dest('dist/styles'))
    .pipe(rename({ suffix: '.min' }))
    .pipe(minifycss())
    .pipe(livereload(server))
    .pipe(gulp.dest('dist/styles'))
    .pipe(notify({ message: 'Styles task complete' }));
});

gulp.task('bower', function() {
    return bower()
        .pipe(gulp.dest('./bower_components'))
});

// Scripts
gulp.task('scripts', function() {
  return gulp.src('assets/scripts/**/*.js')
    .pipe(jshint('.jshintrc'))
    .pipe(jshint.reporter('default'))
    .pipe(concat('main.js'))
    .pipe(gulp.dest('dist/scripts'))
    .pipe(rename({ suffix: '.min' }))
    .pipe(uglify())
    .pipe(livereload(server))
    .pipe(gulp.dest('dist/scripts'))
    .pipe(notify({ message: 'Scripts task complete' }));
});

// Images
gulp.task('images', function() {
  return gulp.src(['assets/images/**/*', '!assets/images/svg/*'])
    .pipe(cache(imagemin({ optimizationLevel: 3, progressive: true, interlaced: true })))
    .pipe(livereload(server))
    .pipe(gulp.dest('dist/images'))
    .pipe(notify({ message: 'Images task complete' }));
});

// ### Fonts
// `gulp fonts` - Grabs all the fonts and outputs them in a flattened directory
// structure. See: https://github.com/armed/gulp-flatten
gulp.task('fonts', function() {
  return gulp.src('assets/fonts/**/*')
    .pipe(flatten())
    .pipe(gulp.dest('dist/fonts'))
});

// Clean
gulp.task('clean', function() {
  return gulp.src(['dist/styles', 'dist/scripts', 'dist/images'], {read: false})
    .pipe(clean());
});

// Default task
gulp.task('default', ['clean'], function() {
    gulp.run('styles', 'scripts', 'images');
});

gulp.task('watch', function (){
      gulp.watch('assets/styles/**/*.scss', ['styles']);
      gulp.watch('assets/images/*.*', ['images']);
      gulp.watch('assets/scripts/**/*.js', ['scripts']);
});
