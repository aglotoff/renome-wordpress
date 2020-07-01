const browserSync = require( 'browser-sync' );
const del = require( 'del' );
const gulp = require( 'gulp' );
const changed = require( 'gulp-changed' );

const config = require( '../config' );

// ----------------------------------------------------------------------------
//   Task: Copy static assets
// ----------------------------------------------------------------------------

gulp.task( 'static:copy', () => {
	return gulp
		.src( config.paths.static.src )
		.pipe( changed( config.paths.static.dest ) )
		.pipe( gulp.dest( config.paths.static.dest ) )
		.pipe(
			browserSync.reload( {
				stream: true,
			} )
		);
} );

// ----------------------------------------------------------------------------
//   Task: Watch for changes in static assets
// ----------------------------------------------------------------------------

gulp.task( 'static:watch', () => {
	return gulp.watch(
		config.paths.static.watch,
		gulp.series( 'static:copy' )
	);
} );

// ----------------------------------------------------------------------------
//   Task: Clean static assets
// ----------------------------------------------------------------------------

gulp.task( 'static:clean', () => {
	return del( config.paths.static.clean );
} );
