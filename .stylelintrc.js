module.exports = {
    extends: [
		'stylelint-config-wordpress/scss'
	],
	rules: {
		'at-rule-empty-line-before': [
			'always',
			{
				except: [
					'blockless-after-same-name-blockless',
					'first-nested',
				],
				ignore: [
					'after-comment',
				],
				ignoreAtRules: [
					'else'
				]
			},
		],
		'rule-empty-line-before': [
			'always',
			{
				except: [
					'first-nested',
				],
				ignore: [
					'after-comment',
				],
			}
		]
	}
};
