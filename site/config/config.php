<?php
return [
	'debug' => true,
	'languages' => true,
	'blocks' => [
		'fieldsets' => [
			'text' => [
				'label' => 'Text',
				'type' => 'group',
				'fieldsets' => [
					'text', 'textarea', 'heading', 'list'
				]
			],
			'media' => [
				'label' => 'Medien',
				'type' => 'group',
				'fieldsets' => [
					'responsive-image', 'responsive-video'
				]
			],
			'code' => [
				'label' => 'Code',
				'type' => 'group',
				'open' => false,
				'fieldsets' => [
					'markdown', 'code'
				]
			]
		]
	]
];
?>