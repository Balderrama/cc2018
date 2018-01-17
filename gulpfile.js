var gulp = require('gulp');
var watch = require('gulp-watch');
var minify = require('gulp-minify');
var liveReload = require('gulp-livereload');

var config = {
	scss: ['./web/css/scss/*.scss'],
	watch: ['./src/FrontBundle/Resources/views/**/*.twig']
};

gulp.task('dev', function () {
	liveReload.listen();
	gulp.watch(config.scss, ['scss']).on('change', function (e) {
		console.log('Recompilando el css...');
	});

	gulp.watch(config.watch, ['reload']).on('change', function (e) {
		console.log('Recargando html...');
	});
});

gulp.task('reload', function () {
	return gulp.src(config.watch)
		.pipe(watch(config.watch))
		.pipe(liveReload());
});

gulp.task('scss', function () {
	'use strict';
	var postcss = require('gulp-postcss');
	var sourcemaps = require('gulp-sourcemaps');
	var autoprefixer = require('autoprefixer');
	var sass = require('gulp-sass');
	var procesos = [autoprefixer({browsers: ['last 10 versions']})];
	return gulp.src(config.scss)
	//Desactivar esta linea para actualizar los archivos parciales ej.                          "_archivo.scss"
	 //.pipe(watch(config.scss))
		.pipe(sourcemaps.init())
		.pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
		.pipe(postcss(procesos))
		.pipe(gulp.dest('./web/css/'))
		.pipe(sourcemaps.write())
		.pipe(liveReload());
});