<?= snippet('header') ?>
<main class="no-layout">
	<?php
		if($articles = $page->children()->listed()) {
			$paginated = $articles->flip()->paginate(3);
			
			foreach($paginated as $article) {
			?>
	<article>
		<h2><a href="<?= $article->url() ?>"><?= ($article->indexOf($articles) + 1) ?> &mdash; <?= $article->title() ?></a></h2>
		<p><?= ucfirst(getPubdate($article, $kirby)) ?> • <?= $article->teaser() ?></p>
	</article>
			<?php
			}
		}
	?>
	
	<?php if ($paginated->pagination()->hasPages()): ?>
	<nav class="pagination">

		<?php if ($paginated->pagination()->hasPrevPage()): ?>
		<a class="button" href="<?= $paginated->pagination()->prevPageURL() ?>">
			<?= t('blogPaginationPrevious') ?>
		</a>
		<?php else: ?>
		<a class="button disabled">
			<?= t('blogPaginationPrevious') ?>
		</a>	
		<?php endif ?>
		
		<?php if($paginated->pagination()->hasPages()): ?>
			<ol>
				<?php for($i = 1; $i <= $paginated->pagination()->pages(); $i++): ?>
					<li><?php
						if($i === $paginated->pagination()->page()){
							echo("<a>$i</a>");
						}else{
							echo("<a href='". $paginated->pagination()->pageUrl($i) ."'>$i</a>");
						}
						?></li>
				<?php endfor ?>
			</ol>
		<?php endif ?>

		<?php if ($paginated->pagination()->hasNextPage()): ?>
		<a class="button" href="<?= $paginated->pagination()->nextPageURL() ?>">
			<?= t('blogPaginationNext') ?>
		</a>
		<?php else: ?>
		<a class="button disabled">
			<?= t('blogPaginationNext') ?>
		</a>	
		<?php endif ?>

	</nav>
	<?php endif ?>
</main>
<?= snippet('footer') ?>