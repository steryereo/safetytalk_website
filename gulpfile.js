var gulp = require('gulp')
var autoprefixer = require('gulp-autoprefixer')
var minCss = require('gulp-minify-css')
var rename = require('gulp-rename')

var config = {
   srcCss : 'rawcss/**/*.css',
   buildCss: 'css'
}

gulp.task('build-css', function(cb) {
   gulp.src(config.srcCss)
      .pipe(autoprefixer())
      .pipe(gulp.dest(config.buildCss))

      // output the minified version
      .pipe(minCss())
      .pipe(rename({ extname: '.min.css' }))
      .pipe(gulp.dest(config.buildCss))

   cb()
})

gulp.task('watch', function(cb) {
   gulp.watch(config.srcCss, ['build-css']) 
})

gulp.task('default', ['build-css', 'watch'])