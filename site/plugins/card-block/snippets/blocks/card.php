<?php
	// custom Card Block
	if($link = $block->promotedPage()->toPage()) {
		$link = $link->url();
	}else{
		$link = false;
	}
?>

<a class="card" <?= ($link) ? 'href="'.$link.'"' : ''; ?>>
	<?= $block->cardContent()->toBlocks() ?>
</a>