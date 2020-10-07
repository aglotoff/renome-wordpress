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
		],
		'selector-class-pattern': '^[a-z](-?[a-z0-9])*(__[a-z](-?[a-z0-9])*)?(_[a-z](-?[a-z0-9])*){0,2}$',
	}
};
