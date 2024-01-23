<?php
Kirby::plugin('wenzels-design/card', [
	'blueprints' => [
		'blocks/card' => __DIR__ . '/blueprints/blocks/card.yml'
	],
	'snippets' => [
		'blocks/card' => __DIR__ . '/snippets/blocks/card.php'
	]
]);
?>