<?php
	//Custom Image Block
?>

<picture <?= ($block->class()->isNotEmpty()) ? "class=" . $block->class() : "" ; ?>>
	
	<?php
		if($block->imageMobile()->isNotEmpty()) :
			$srcset = ($block->imageMobileHiDPI()-isNotEmpty()) ? $block->imageMobileHiDPI()->toFile()->url() . " 3x, " : "";
			$srcset .= $block->imageMobile()->toFile()->url() . " 1x";
	?>
	<source media="(max-width: 413px)" srcset="<?= $srcset ?>" />
	<?php
		endif;
	?>
	
	<?php
		if($block->imageTablet()->isNotEmpty()) :
			$srcset = ($block->imageTabletHiDPI()-isNotEmpty()) ? $block->imageTabletHiDPI()->toFile()->url() . " 3x, " : "";
			$srcset .= $block->imageTablet()->toFile()->url() . " 1x";
	?>
	<source media="(max-width: 743px)" srcset="<?= $srcset ?>" />
	<?php
		endif;
	?>
	
	<?php
		if($block->imageDesktop()->isNotEmpty()) :
			$srcset = ($block->imageDesktopHiDPI()->isNotEmpty()) ? $block->imageDesktopHiDPI()->toFile()->url() . " 2x, " : "";
			$srcset .= $block->imageDesktop()->toFile()->url() . " 1x";
	?>
	<source media="(max-width: 1023px)" srcset="<?= $srcset ?>" />
	<?php
		endif;
	?>
	
	<?php
		if($block->imageDesktopXL()->isNotEmpty()) :
			$srcset = ($block->imageDesktopXLHiDPI()-isNotEmpty()) ? $block->imageDesktopXLHiDPI()->toFile()->url() . " 2x, " : "";
			$srcset .= $block->imageDesktopXL()->toFile()->url() . " 1x";
	?>
	<source media="(min-width: 1280px)" srcset="<?= $srcset ?>" />
	<?php
		endif;
	?>
	
	<img
		<?= ($block->class()->isNotEmpty()) ? "class=" . $block->class() : "" ; ?>
		alt="<?= $block->alt() ?>"
		src="<?= $block->imageDesktop()->toFile()->url() ?>" />
</picture>
