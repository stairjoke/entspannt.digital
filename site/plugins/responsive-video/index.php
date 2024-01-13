<?php
Kirby::plugin('wenzels-design/responsive-video', [
	'blueprints' => [
		'blocks/responsive-video' => __DIR__ . '/blueprints/blocks/responsive-video.yml'
	],
	'snippets' => [
		'blocks/responsive-video' => __DIR__ . '/snippets/blocks/responsive-video.php'
	],
	'fileTypes' => [
		'vtt' => [
			'type' => 'document'
		]
	]
]);
?>