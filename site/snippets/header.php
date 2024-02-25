<html lang="de-DE" itemscope itemtype='https://schema.org/OnlineBusiness'>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		
		<?= css([
			'assets/css/root.css',
			'@auto'
		]) ?>
		<meta name="theme-color" media="(prefers-color-scheme: light)" content="#ffffff">
		<meta name="theme-color" media="(prefers-color-scheme: dark)" content="#141414">
		<title><?= $site->title() ?> &mdash; <?= $page->title() ?></title>
	</head>
<body>
	<header>
		<div class="title"><a href="<?= $site->url() ?>" tabindex=1 itemprop=name><?= $site->Logotype() ?></a> &mdash; <?= $site->header() ?></div>
		<nav><!-- The input[type=checkbox]#nav-toggle triggers all .triggered-by-nav-toggle nodes to change the menu icon and show/hide the menu -->
			<input type="checkbox" value="false" id="nav-toggle">
			<label for="nav-toggle" class="triggered-by-nav-toggle" role="switch" aria-label="Navigation">
				<svg class="icon" id="menu">
					<title>Menü öffnen</title>
					<use href="/assets/iconSprite.svg#menu" aria-hidden="hidden"></use>
				</svg>
				<svg class="icon" id="close">
					<title>Menü schließen</title>
					<use href="/assets/iconSprite.svg#error" aria-hidden="hidden"></use>
				</svg>
			</label>
	
			<ul class="menu triggered-by-nav-toggle" aria-label="Navigation">
				<?php
					// List all public pages that are immediate children of home in the navigation
					foreach($site->children()->listed() as $navItem){
						// Make $item string and start the LI-element for the nav item in it
						$item = "<li><a href='{$navItem->url()}' class='button nav-button";
						// if the current page is the page linked to in this nav item
						if($navItem->isActive()) {
							// add CSS class "current"
							$item .= " current";
						}
						// close the LI-HTML item
						$item .= "' >{$navItem->title()}</a></li>";
						// return HTML item to page
						echo($item);
					}
				?>
				<li><a href="<?= $site->contact_link() ?>" role="button" class="nav-button CTA"><svg class="icon inline">
					<use href="/assets/iconSprite.svg#letter-heart"></use>
				</svg><?= $site->contact_label() ?></a></li>
			</ul>
		</nav>
	</header>