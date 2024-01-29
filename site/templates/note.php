<?= snippet('header') ?>
<main>
	<h1 class="main"><?= $page->title() ?></h1>
	<?= $page->main_content()->toBlocks() ?>
</main>
<?= snippet('footer') ?>