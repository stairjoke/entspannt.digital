<?= snippet('header') ?>
<main class="no-layout">
	<?= $page->main_content()->toBlocks() ?>
</main>
<?= snippet('footer') ?>