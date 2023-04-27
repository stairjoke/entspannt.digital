<?= snippet('header') ?>
<main class="default">
	<h1><?= $page->title() ?></h1>
	<?= $page->main_content()->toBlocks() ?>
</main>
<?= snippet('footer') ?>