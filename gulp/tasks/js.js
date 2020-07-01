const browserSync = require( 'browser-sync' );
const del = require( 'del' );
const gulp = require( 'gulp' );
const named = require( 'vinyl-named' );
const webpack = require( 'webpack-stream' );

const config = require( '../config' );

// ----------------------------------------------------------------------------
//   Task: Build JavaScript
// ----------------------------------------------------------------------------

gulp.task( 'js:build', () => {
	return gulp
		.src( config.paths.js.src )
		.pipe( named() )
		.pipe( webpack( config.plugins.webpack ) )
		.on( 'error', function ( err ) {
			// eslint-disable-next-line no-console
			console.log( err.message );
			this.emit( 'end' );
		} )
		.pipe( gulp.dest( config.paths.js.dest ) );
} );

// ----------------------------------------------------------------------------
//   Task: Watch for changes in JavaScript
// ----------------------------------------------------------------------------

gulp.task( 'js:watch', () => {
	return gulp
		.src( config.paths.js.src )
		.pipe( named() )
		.pipe( webpack( { ...config.plugins.webpack, watch: true } ) )
		.on( 'error', function () {
			this.emit( 'end' );
		} )
		.pipe( gulp.dest( config.paths.js.dest ) )
		.pipe( browserSync.reload( { stream: true } ) );
} );

// ----------------------------------------------------------------------------
//   Task: Clean JavaScript
// ----------------------------------------------------------------------------

gulp.task( 'js:clean', () => {
	return del( config.paths.js.clean );
} );
