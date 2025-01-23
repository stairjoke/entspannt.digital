<header>
  <div class="logotype">
    <h1><?= $site->title() ?></h1><p><?= $site->description() ?></p>
  </div>
  <?php if($site->children()->listed()->count() > 0) : ?>
  <nav><ol>
    <?php foreach($site->children()->listed() as $item): ?>
    <li><a href="<?= $item->permalink()?>" <?= e($item->isOpen(), 'class="current" ') ?>><?= $item->title() ?></a></li>
    <?php endforeach; ?>
  </ol></nav>
  <?php endif; ?>
</header>