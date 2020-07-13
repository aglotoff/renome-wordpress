const defaultPrettierConfig = require( '@wordpress/prettier-config' );

module.exports = {
	env: {
		browser: true,
		commonjs: true,
		es6: true,
		jquery: true,
	},
	extends: [ 'plugin:@wordpress/eslint-plugin/recommended' ],
	parserOptions: {
		sourceType: 'module',
	},
	rules: {
		'linebreak-style': [ 'error', 'windows' ],
		'prettier/prettier': [
			'error',
			{
				...defaultPrettierConfig,
				endOfLine: 'auto',
			},
		],
	},
};
