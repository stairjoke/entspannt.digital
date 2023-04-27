<?= snippet('header') ?>
<main class="default">
	<?php foreach($articles = $page->children()->listed()->flip()->paginate(7) as $article): ?>
	<article>
		<h2><a href="<?= $article->url() ?>"><?= $article->title() ?></a></h2>
		<p><?= $article->teaser() ?></p>
	</article>
	<?php endforeach ?>
	
	<?php if ($articles->pagination()->hasPages()): ?>
	<nav class="pagination">
		<?php if ($articles->pagination()->hasNextPage()): ?>
		<a class="button" href="<?= $articles->pagination()->nextPageURL() ?>">
			Ältere Notizen
		</a>
		<?php endif ?>
	
		<?php if ($articles->pagination()->hasPrevPage()): ?>
		<a class="button" href="<?= $articles->pagination()->prevPageURL() ?>">
			Neuere Notizen
		</a>
		<?php endif ?>
	
	</nav>
	<?php endif ?>
</main>
<?= snippet('footer') ?>