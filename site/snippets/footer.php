<footer>
  <?php if($site->footerNav()->toPages()->count() > 0) : ?>
  <nav><ol>
    <?php foreach($site->footerNav()->toPages() as $item) : ?>
    <li><a href="<?= $item->permalink() ?>"><?= $item->title() ?></a></li>
    <?php endforeach; ?>
  </ol></nav>
  <?php endif; ?>
  <?= $site->footerNote(); ?>
</footer>