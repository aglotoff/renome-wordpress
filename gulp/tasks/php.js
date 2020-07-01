const browserSync = require( 'browser-sync' );
const del = require( 'del' );
const gulp = require( 'gulp' );
const plumber = require( 'gulp-plumber' );
const wpPot = require( 'gulp-wp-pot' );

const config = require( '../config' );

// ----------------------------------------------------------------------------
//   Task: Generate pot files
// ----------------------------------------------------------------------------

gulp.task( 'php:make-pot', () => {
	return gulp
		.src( config.paths.php.potSrc )
		.pipe( plumber() )
		.pipe( wpPot( config.plugins.wpPot ) )
		.pipe( gulp.dest( config.paths.php.potDest ) );
} );

// ----------------------------------------------------------------------------
//   Task: Reload browser
// ----------------------------------------------------------------------------

gulp.task( 'php:reload', ( done ) => {
	browserSync.reload( { stream: true } );
	done();
} );

// ----------------------------------------------------------------------------
//   Task: Watch for changes in PHP files
// ----------------------------------------------------------------------------

gulp.task( 'php:watch', () => {
	return gulp.watch(
		config.paths.php.watch,
		gulp.parallel( 'php:make-pot', 'php:reload' )
	);
} );

// ----------------------------------------------------------------------------
//   Task: Clean pot files
// ----------------------------------------------------------------------------

gulp.task( 'php:clean-pot', () => {
	return del( config.paths.php.cleanPot );
} );
