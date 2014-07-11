var pkg = require('./package.json'),
    gulp = require('gulp'),
    sass = require('gulp-ruby-sass'),
    changed = require('gulp-changed'),
    autoprefix = require('gulp-autoprefixer'),
    concat = require('gulp-concat'),
    minifycss  = require('gulp-minify-css'),
    clean = require('gulp-clean'),
    uglify = require('gulp-uglify'),
    replace = require('gulp-replace'),
    imagemin = require('gulp-imagemin'),
    svgo = require('gulp-svgo'),
    gulpBowerFiles = require('gulp-bower-files'),
    flatten = require('gulp-flatten'),
    reload = require('gulp-livereload');


// Compile sass into CSS.
gulp.task('styles', function () {
  return gulp.src('./sass/style.scss')
    .pipe(sass({sourcemap: true, require: ['bourbon'], loadPath: 'bower_components/bootstrap-sass/lib'}))
    .pipe(gulp.dest(pkg.directories.lib+pkg.name))
    .pipe(reload());
});

// Copy Bower assets into the scripts folder.
gulp.task('bower-files', function(){
    gulpBowerFiles()
    .pipe(concat('vendor.js'))
    .pipe(gulp.dest("./scripts"));
});

// Compile app script into the build folder.
gulp.task('scripts', function() {
 return gulp.src(['./scripts/vendor.js', './scripts/app.js'])
    // Pass in options to the task
    .pipe(concat('bundle.js'))
    .pipe(uglify())
    .pipe(gulp.dest(pkg.directories.lib+pkg.name+'/scripts'));
});

// Copy font files into the build folder.
gulp.task('fonts', function() {
  gulp.src(['./bower_components/bootstrap-sass/dist/fonts/*', './bower_components/flexslider/fonts/*'])
  .pipe(gulp.dest(pkg.directories.lib+pkg.name+'/fonts'));
});

// Copy files into the build folder.
gulp.task('copy', function() {
  gulp.src('./bower_components/flexslider/flexslider.css')
  .pipe(gulp.dest(pkg.directories.lib+pkg.name+'/lib'));
  gulp.src('./**/*.php')
  .pipe(flatten())
  .pipe(gulp.dest(pkg.directories.lib+pkg.name));
  gulp.src(['./images/*.png', './images/*.ico'])
  .pipe(gulp.dest(pkg.directories.lib+pkg.name));
});

// Optimize and copy images into the build folder.
gulp.task('svg', function() {
 return gulp.src('./images/*.svg')
    .pipe(changed(pkg.directories.lib+pkg.name+'/images/'))
    .pipe(svgo())
    .pipe(gulp.dest(pkg.directories.lib+pkg.name+'/images/'));
});

// Watchers
gulp.task('watch', function () {
  gulp.watch('./scripts/**/*.js', ['scripts']);
  gulp.watch('./sass/**/*.scss', ['styles']);
  gulp.watch('./images/**/.**', ['svg']);
  gulp.watch('./php/**/.**', ['copy']);
});

// The default task (called when you run `gulp`)
gulp.task('default', ['styles', 'bower-files', 'scripts', 'fonts', 'svg', 'copy', 'watch']);