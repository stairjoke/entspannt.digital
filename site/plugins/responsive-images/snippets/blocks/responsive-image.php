<?php
	//Custom Image Block
	
	// !!! Rule: Browser evaluates top to bottom and takes the first image that is true. No point system like in CSS!
?>

<picture <?= ($block->class()->isNotEmpty()) ? "class='" . preg_replace("/, /", " ", $block->class()) . "'" : "" ; ?>>
	<?php
		function wenzelsDesignResponsiveImageSourceGenerator($block, $image, $HiDPIImage, $HiDPIFactor, $mediaString){
			$srcset = "";
			if($image = $block->$image()?->toFile()) {
				if($imageHiDPI = $block->$HiDPIImage()?->toFile()){
					$srcset .= $imageHiDPI->url() . ' ' . $HiDPIFactor . 'x, ';
				}
				$srcset .= $image->url() . ' 1x';
				
				echo("<source media='$mediaString' srcset='$srcset' />");
			}
		}
		
		function wenzelsDesignResponsiveImageSrcsetGenerator($block, $name, $HiDPIFactor, $minWidth) {
			$defaultImage = "image" . $name;
			$HiDPIImage = "image" . $name . "hidpi";
			$darkImage = "image" . $name . "dark";
			$darkHiDPIImage = "image" . $name . "hidpidark";
			
			$media = '(min-width: '.$minWidth.'px)';
			$mediaDark = $media . ' and (prefers-color-scheme: dark)';
			
			wenzelsDesignResponsiveImageSourceGenerator($block, $darkImage, $darkHiDPIImage, $HiDPIFactor, $mediaDark);
			wenzelsDesignResponsiveImageSourceGenerator($block, $defaultImage, $HiDPIImage, $HiDPIFactor, $media);
		}
	
		wenzelsDesignResponsiveImageSrcsetGenerator($block, "desktopxl", "2", "1280");
		wenzelsDesignResponsiveImageSrcsetGenerator($block, "desktop", "2", "744");
		wenzelsDesignResponsiveImageSrcsetGenerator($block, "tablet", "3", "414");
		wenzelsDesignResponsiveImageSrcsetGenerator($block, "mobile", "3", "0");
	?>
	<img
		<?= ($block->class()->isNotEmpty()) ? "class='" . preg_replace("/, /", " ", $block->class()) . "'" : "" ; ?>
		alt="<?= $block->alt() ?>"
		src="<?= $block->imageDesktop()?->toFile()->url() ?>" />
</picture>
