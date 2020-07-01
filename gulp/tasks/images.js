const browserSync = require( 'browser-sync' );
const del = require( 'del' );
const gulp = require( 'gulp' );
const changed = require( 'gulp-changed' );
const imagemin = require( 'gulp-imagemin' );
const plumber = require( 'gulp-plumber' );

const config = require( '../config' );

// ----------------------------------------------------------------------------
//   Task: Optimize images
// ----------------------------------------------------------------------------

gulp.task( 'images:build', () => {
	return gulp
		.src( config.paths.images.src )
		.pipe( changed( config.paths.images.dest ) )
		.pipe( plumber() )
		.pipe(
			imagemin( [
				imagemin.gifsicle( { interlaced: true } ),
				imagemin.optipng( { optimizationLevel: 7 } ),
				imagemin.svgo( config.plugins.imagemin.svgo ),
				imagemin.mozjpeg( { progressive: true } ),
			] )
		)
		.pipe( gulp.dest( config.paths.images.dest ) )
		.pipe( browserSync.reload( { stream: true } ) );
} );

// ----------------------------------------------------------------------------
//   Task: Watch for changes in images
// ----------------------------------------------------------------------------

gulp.task( 'images:watch', () => {
	return gulp.watch(
		config.paths.images.watch,
		gulp.series( 'images:build' )
	);
} );

// ----------------------------------------------------------------------------
//   Task: Clean images
// ----------------------------------------------------------------------------

gulp.task( 'images:clean', () => {
	return del( config.paths.images.clean );
} );
