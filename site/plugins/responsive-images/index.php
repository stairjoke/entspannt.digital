<?php
Kirby::plugin('wenzels-design/responsive-image', [
	'blueprints' => [
		'blocks/responsive-image' => __DIR__ . '/blueprints/blocks/responsive-image.yml'
	],
	'snippets' => [
		'blocks/responsive-image' => __DIR__ . '/snippets/blocks/responsive-image.php'
	]
]);
?>