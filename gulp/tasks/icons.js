const del = require( 'del' );
const gulp = require( 'gulp' );
const plumber = require( 'gulp-plumber' );
const svgSprite = require( 'gulp-svg-sprite' );

const config = require( '../config' );

// ----------------------------------------------------------------------------
//   Task: Generate the icons sprite
// ----------------------------------------------------------------------------

gulp.task( 'icons:build', () => {
	return gulp
		.src( config.paths.icons.src )
		.pipe( plumber() )
		.pipe( svgSprite( config.plugins.svgSprite ) )
		.pipe( gulp.dest( config.paths.icons.dest ) );
} );

// ----------------------------------------------------------------------------
//   Task: Watch for changes in icons
// ----------------------------------------------------------------------------

gulp.task( 'icons:watch', () => {
	return gulp.watch( config.paths.icons.watch, gulp.series( 'icons:build' ) );
} );

// ----------------------------------------------------------------------------
//   Task: Clean icons
// ----------------------------------------------------------------------------

gulp.task( 'icons:clean', () => {
	return del( config.paths.icons.clean );
} );
