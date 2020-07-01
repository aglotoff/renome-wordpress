const autoprefixer = require( 'autoprefixer' );
const browserSync = require( 'browser-sync' );
const cssnano = require( 'cssnano' );
const del = require( 'del' );
const gulp = require( 'gulp' );
const plumber = require( 'gulp-plumber' );
const postCss = require( 'gulp-postcss' );
const sass = require( 'gulp-sass' );
const sourcemaps = require( 'gulp-sourcemaps' );
const stylelint = require( 'gulp-stylelint' );
const wait = require( 'gulp-wait' );

const config = require( '../config' );

// ----------------------------------------------------------------------------
// 	Task: Lint CSS
// ----------------------------------------------------------------------------

gulp.task( 'css:lint', () => {
	return gulp
		.src( config.paths.css.lint )
		.pipe( stylelint( config.plugins.stylelint ) );
} );

// ----------------------------------------------------------------------------
// 	Task: Build CSS
// ----------------------------------------------------------------------------

gulp.task( 'css:build', () => {
	const postcssPlugins = [ autoprefixer ];
	if ( config.run.cssnano ) {
		postcssPlugins.push( cssnano );
	}

	return gulp
		.src( config.paths.css.src )
		.pipe( plumber() )
		.pipe( wait( 500 ) )
		.pipe( sourcemaps.init() )
		.pipe( sass.sync( config.plugins.sass ) )
		.pipe( postCss( postcssPlugins ) )
		.pipe( sourcemaps.write( '.' ) )
		.pipe( gulp.dest( config.paths.css.dest ) )
		.pipe( browserSync.reload( { stream: true } ) );
} );

// ----------------------------------------------------------------------------
//   Task: Watch for CSS changes
// ----------------------------------------------------------------------------

gulp.task( 'css:watch', () => {
	return gulp.watch(
		config.paths.css.watch,
		gulp.series( 'css:lint', 'css:build' )
	);
} );

// ----------------------------------------------------------------------------
//   Task: Clean CSS
// ----------------------------------------------------------------------------

gulp.task( 'css:clean', () => {
	return del( config.paths.css.clean );
} );
