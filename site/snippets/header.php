<html lang="de-DE" itemscope itemtype='https://schema.org/OnlineBusiness'>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		
		<!-- Using Kirby CSS feature -->
		<?= css('assets/foundation.css') ?>
		<?= (isset($class)) ? css("assets/$class.css") : ''; ?>
		
		<!-- CONTAINS A COLOR THAT CANNOT BE REFERENCED FROM CSS COLOR VARIABLES, NEEDS TO BE MAINTAINED! -->
		<!--<meta name="theme-color" media="(prefers-color-scheme: light)" content="#fbfcfb">
		<meta name="theme-color" media="(prefers-color-scheme: dark)" content="#1C1D1B">-->
		<meta name="theme-color" content="#ffffff">
	</head>
<body>
	<header>
		<?= get_header_title_as_html($site) ?>
		<nav>
			<!--
					The input[type=checkbox]#nav-toggle triggers all .triggered-by-nav-toggle nodes to change the menu icon and show/hide the menu
				-->
			<input type="checkbox" value="false" id="nav-toggle">
			<label for="nav-toggle" class="triggered-by-nav-toggle">
				<svg class="icon" id="menu">
					<use href="/assets/iconSprite.svg#menu"></use>
				</svg>
				<svg class="icon" id="close">
					<use href="/assets/iconSprite.svg#error"></use>
				</svg>
			</label>
	
			<ul class="menu triggered-by-nav-toggle">
				<?php
					// Same as inside the loop: Creates nav item, first for the home page,
					// then for all children
					
					// Make $item string and start the LI-element for the nav item in it
					$item = "<li><a href='{$site->homePage()->url()}' class='button nav-button";
					// if the current page is the page linked to in this nav item
					if($page->is($site->homePage())) {
						// add CSS class "current"
						$item .= " current";
					}
					// close the LI-HTML item
					$item .= "'>{$site->homePage()->title()}</a></li>";
					// return HTML item to page
					echo($item);
					
					// Same as above, but for all pages that are children of "home"
					foreach($site->children()->listed() as $navItem){
						$item = "<li><a href='{$navItem->url()}' class='button nav-button";
						if($page->is($navItem)) {
							$item .= " current";
						}
						$item .= "'>{$navItem->title()}</a></li>";
						echo($item);
					}
				?>
				<li><a href="<?= $site->contact_link() ?>" role="button" class="nav-button CTA"><svg class="icon inline">
					<use href="/assets/iconSprite.svg#letter-heart"></use>
				</svg><?= $site->contact_label() ?></a></li>
			</ul>
		</nav>
	</header>