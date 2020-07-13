const minimist = require( 'minimist' );

/**
 * Read in an environment flag
 */
const { env } = minimist( process.argv.slice( 2 ), {
	string: 'env',
	default: {
		env: process.env.NODE_ENV || 'development',
	},
} );

/**
 * Theme name
 */
const THEME = 'renome';

/**
 * Name of the development server
 */
const PROXY = 'https://renome.local';

/**
 * Path prefixes
 */
const TOP = '.';
const SRC = `${ TOP }/src`;
const ASSETS = `${ TOP }/assets`;
const CONFIG = `${ TOP }/config`;
const LANGUAGES = `${ TOP }/languages`;

module.exports = {
	env,

	/*
	 * Path information
	 */
	paths: {
		top: TOP,
		src: SRC,
		assets: ASSETS,
		languages: LANGUAGES,

		css: {
			src: [ `${ SRC }/sass/*.scss`, `!${ SRC }/sass/_*.scss` ],
			dest: `${ ASSETS }/css`,
			lint: `${ SRC }/**/*.scss`,
			watch: `${ SRC }/**/*.scss`,
			clean: `${ ASSETS }/css/**/*.css`,
		},

		icons: {
			src: `${ SRC }/icons/*.svg`,
			dest: `${ SRC }`,
			watch: `${ SRC }/icons/*.svg`,
			clean: [
				`${ SRC }/images/icons.svg`,
				`${ SRC }/blocks/common/icon/icon.scss`,
			],
		},

		images: {
			src: `${ SRC }/images/**/*.{gif,jpg,jpeg,ico,png,svg}`,
			dest: `${ ASSETS }/images`,
			watch: `${ SRC }/images/**/*.{gif,jpg,jpeg,ico,png,svg}`,
			clean: `${ ASSETS }/images/*.{gif,jpg,jpeg,ico,png,svg}`,
		},

		js: {
			src: [ `${ SRC }/js/*.js` ],
			dest: `${ ASSETS }/js`,
			lint: `${ SRC }/**/*.js`,
			watch: `${ SRC }/**/*.js`,
			clean: `${ ASSETS }/js/**/*.js{,.map}`,
		},

		php: {
			potSrc: [ `${ TOP }/**/*.php`, `!${ TOP }/node_modules/**` ],
			potDest: `${ LANGUAGES }/${ THEME }.pot`,
			watch: [ `${ TOP }/**/*.php`, `!${ TOP }/node_modules/**` ],
			cleanPot: `${ LANGUAGES }/${ THEME }.pot`,
		},

		static: {
			src: `${ SRC }/static/**/*`,
			dest: `${ ASSETS }`,
			watch: `${ SRC }/static/**/*`,
			clean: [ `${ ASSETS }/**/*`, `!${ ASSETS }/{css,img,js}/**/*` ],
		},
	},

	/*
	 * Toggle plugins on or off
	 */
	run: {
		css: {
			cssnano: env === 'production',
		},
	},

	/*
	 * Plugin options
	 */
	plugins: {
		browserSync: {
			proxy: PROXY,
			https: true,
		},

		imagemin: {
			svgo: {
				plugins: [
					{ removeXMLProcInst: false },
					{ cleanupIDs: false },
					{ removeAttrs: { attrs: '(style)' } },
				],
			},
		},

		sass: {
			outputStyle: 'expanded',
		},

		svgSprite: {
			mode: {
				symbol: {
					sprite: '../images/icons.svg',
					render: {
						scss: {
							dest: '../blocks/common/icon/icon.scss',
							template: `${ SRC }/blocks/common/icon/icon.mustache`,
						},
					},
				},
			},
		},

		stylelint: {
			failAfterError: false,
			reporters: [
				{
					formatter: 'string',
					console: true,
				},
			],
			configFile: `${ CONFIG }/.stylelintrc.js`,
		},

		webpack: require( `../${ CONFIG }/webpack.config.js` )( { mode: env } ),

		wpPot: {
			domain: THEME,
			lastTranslator: 'Andrey Glotov <aglotoff.developer@gmail.com>',
			package: THEME,
		},
	},
};
