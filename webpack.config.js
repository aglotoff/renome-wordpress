const path = require( 'path' );

module.exports = ( { mode = 'development' } ) => ( {
	output: {
		filename: '[name].js',
	},
	module: {
		rules: [
			{
				enforce: 'pre',
				test: /\.js$/,
				exclude: /node_modules/,
				use: {
					loader: 'eslint-loader',
					options: {
						configFile: path.join( __dirname, '.eslintrc.js' ),
						emitWarning: true,
					},
				},
			},
			{
				test: /\.js$/,
				exclude: /node_modules/,
				use: {
					loader: 'babel-loader',
					options: {
						presets: [ '@babel/preset-env' ],
					},
				},
			},
		],
	},
	mode,
	devtool: 'source-map',
} );
