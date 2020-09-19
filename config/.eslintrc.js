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
};
