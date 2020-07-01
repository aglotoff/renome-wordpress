// ****************************************************************************
//
//   Gulpfile
//
// ****************************************************************************
//
// Available tasks:
//   `gulp`
//   `gulp build`
//   `gulp watch`
//   `gulp clean`
//   `gulp css:lint`
//   `gulp css:build`
//   `gulp css:watch`
//   `gulp css:clean`
//   `gulp icons:build`
//   `gulp icons:watch`
//   `gulp icons:clean`
//   `gulp images:build`
//   `gulp images:watch`
//   `gulp images:clean`
//   `gulp js:build`
//   `gulp js:watch`
//   `gulp js:clean`
//   `gulp pot:build`
//   `gulp pot:watch`
//   `gulp pot:clean`
//   `gulp static:copy`
//   `gulp static:watch`
//   `gulp static:clean`
//
// ****************************************************************************

const browserSync = require( 'browser-sync' );
const gulp = require( 'gulp' );
const requireDir = require( 'require-dir' );

const config = require( './gulp/config' );

requireDir( './gulp/tasks', { recurse: true } );

// ----------------------------------------------------------------------------
//   Task: Clean
// ----------------------------------------------------------------------------

gulp.task(
	'clean',
	gulp.parallel(
		'css:clean',
		'icons:clean',
		'images:clean',
		'js:clean',
		'php:clean-pot',
		'static:clean'
	)
);

// ----------------------------------------------------------------------------
//   Task: Build
// ----------------------------------------------------------------------------

gulp.task(
	'build',
	gulp.series(
		'clean',
		gulp.parallel(
			gulp.series(
				'icons:build',
				'css:lint',
				'css:build',
				'images:build'
			),
			'js:build',
			'php:make-pot',
			'static:copy'
		)
	)
);

// ----------------------------------------------------------------------------
//   Task: Watch
// ----------------------------------------------------------------------------

gulp.task(
	'watch',
	gulp.parallel(
		'css:watch',
		'icons:watch',
		'images:watch',
		'js:watch',
		'php:watch',
		'static:watch'
	)
);

// ----------------------------------------------------------------------------
//   Task: Serve
// ----------------------------------------------------------------------------

gulp.task( 'serve', () => {
	return browserSync.init( config.plugins.browserSync );
} );

// ----------------------------------------------------------------------------
//   Task: Default
// ----------------------------------------------------------------------------

gulp.task(
	'default',
	gulp.series( 'build', gulp.parallel( 'serve', 'watch' ) )
);
