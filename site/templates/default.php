<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?= $site->title() ?></title>
    <!--<meta http-equiv="refresh" content="1">-->
    <?= css('assets/css/styles.css', '@auto') ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= snippet('opengraph-and-meta') ?>
  </head>
  <body>
    <?= snippet('header'); ?>
    <main></main>
    <?= snippet('footer'); ?>
  </body>
</html>
