var gulp = require('gulp'),
sass = require('gulp-sass');
var rename = require('gulp-rename');

var scssFiles = '../assets/sass/**/*.scss';

var sassConfig = {
	inputDirectory: scssFiles,
	outputDirectory: '../assets/css/gulp',
	options: {
		outputStyle: 'compressed'
	}
}



gulp.task('dev', function(){
	return gulp
	.src(sassConfig.inputDirectory)
	.pipe(sass(sassConfig.options).on('error', sass.logError))
  .pipe(rename('style.min.css'))
	.pipe(gulp.dest(sassConfig.outputDirectory));
});

gulp.task('watch', function() {
	gulp.watch(sassConfig.inputDirectory)
	.on('change', function(path, stats) {
		console.log(path);
		gulp.watch(path, gulp.series('dev'));
	})
});

gulp.task('default', gulp.series('watch', function(done){
	console.log("funcionando");
	done();
}));
