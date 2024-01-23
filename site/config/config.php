<?php
return [
	'languages' => true,
	'panel' => [
		'css' => 'assets/css/panel.css'
	],
	'blocks' => [
		'fieldsets' => [
			'text' => [
				'label' => 'Text',
				'type' => 'group',
				'fieldsets' => [
					'heading', 'text', 'table', 'list'
				]
			],
			'media' => [
				'label' => 'Medien',
				'type' => 'group',
				'fieldsets' => [
					'responsive-image', 'responsive-video', 'card', 'gallery'
				]
			],
			'code' => [
				'label' => 'Code',
				'type' => 'group',
				'fieldsets' => [
					'markdown', 'code'
				]
			]
		]
	]
];
?>