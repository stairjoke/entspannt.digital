<?php
	//Custom Image Block
	
	// !!! Rule: Browser evaluates top to bottom and takes the first image that is true. No point system like in CSS!
?>

<picture <?= ($block->class()->isNotEmpty()) ? "class='" . preg_replace("/, /", " ", $block->class()) . "'" : "" ; ?>>
	<?php
		// Mobile + Mobile @3x ––– DARK MODE
		if($block->imageMobileDark()->isNotEmpty()) :
			$srcset = ($block->imageMobileHiDPIDark()-isNotEmpty()) ? $block->imageMobileHiDPIDark()->toFile()->url() . " 3x, " : "";
			$srcset .= $block->imageMobileDark()->toFile()->url() . " 1x";
	?>
	<source media="(max-width: 413px) and (prefers-color-scheme: dark)" srcset="<?= $srcset ?>" />
	<?php
		endif;
	?>
	
	<?php
		// Mobile + Mobile @3x
		
		if($block->imageMobile()->isNotEmpty()) :
			$srcset = ($block->imageMobileHiDPI()-isNotEmpty()) ? $block->imageMobileHiDPI()->toFile()->url() . " 3x, " : "";
			$srcset .= $block->imageMobile()->toFile()->url() . " 1x";
	?>
	<source media="(max-width: 413px)" srcset="<?= $srcset ?>" />
	<?php
		endif;
	?>
	
	
	
	
	<?php
		// Tablet + Tablet @3x –––DARK MODE
		if($block->imageTabletDark()->isNotEmpty()) :
			$srcset = ($block->imageTabletHiDPIDark()-isNotEmpty()) ? $block->imageTabletHiDPIDark()->toFile()->url() . " 3x, " : "";
			$srcset .= $block->imageTabletDark()->toFile()->url() . " 1x";
	?>
	<source media="(min-width: 414px) and (prefers-color-scheme: dark)" srcset="<?= $srcset ?>" />
	<?php
		endif;
	?>
	
	<?php
		// Tablet + Tablet @3x
		if($block->imageTablet()->isNotEmpty()) :
			$srcset = ($block->imageTabletHiDPI()-isNotEmpty()) ? $block->imageTabletHiDPI()->toFile()->url() . " 3x, " : "";
			$srcset .= $block->imageTablet()->toFile()->url() . " 1x";
	?>
	<source media="(min-width: 414px)" srcset="<?= $srcset ?>" />
	<?php
		endif;
	?>
	
	
	
	
	<?php
		// Desktop + Desktop @2x –––DARK MODE
		if($block->imageDesktopDark()->isNotEmpty()) :
			$srcset = ($block->imageDesktopHiDPIDark()->isNotEmpty()) ? $block->imageDesktopHiDPIDark()->toFile()->url() . " 2x, " : "";
			$srcset .= $block->imageDesktopDark()->toFile()->url() . " 1x";
	?>
	<source media="(min-width: 744px) and (prefers-color-scheme: dark)" srcset="<?= $srcset ?>" />
	<?php
		endif;
	?>
	
	<?php
		// Desktop + Desktop @2x
		if($block->imageDesktop()->isNotEmpty()) :
			$srcset = ($block->imageDesktopHiDPI()->isNotEmpty()) ? $block->imageDesktopHiDPI()->toFile()->url() . " 2x, " : "";
			$srcset .= $block->imageDesktop()->toFile()->url() . " 1x";
	?>
	<source media="(min-width: 744px)" srcset="<?= $srcset ?>" />
	<?php
		endif;
	?>
	
	
	
	
	<?php
		// Desktop XL + Desktop XL @2x ––– DARK MODE
		if($block->imageDesktopXLDark()->isNotEmpty()) :
			$srcset = ($block->imageDesktopXLHiDPIDark()-isNotEmpty()) ? $block->imageDesktopXLHiDPIDark()->toFile()->url() . " 2x, " : "";
			$srcset .= $block->imageDesktopXLDark()->toFile()->url() . " 1x";
	?>
	<source media="(min-width: 1280px) and (prefers-color-scheme: dark)" srcset="<?= $srcset ?>" />
	<?php
		endif;
	?>
	
		<?php
		// Desktop XL + Desktop XL @2x
		if($block->imageDesktopXL()->isNotEmpty()) :
			$srcset = ($block->imageDesktopXLHiDPI()-isNotEmpty()) ? $block->imageDesktopXLHiDPI()->toFile()->url() . " 2x, " : "";
			$srcset .= $block->imageDesktopXL()->toFile()->url() . " 1x";
	?>
	<source media="(min-width: 1280px)" srcset="<?= $srcset ?>" />
	<?php
		endif;
	?>
	
	<img
		<?= ($block->class()->isNotEmpty()) ? "class='" . preg_replace("/, /", " ", $block->class()) . "'" : "" ; ?>
		alt="<?= $block->alt() ?>"
		src="<?= $block->imageDesktop()->toFile()->url() ?>" />
</picture>
