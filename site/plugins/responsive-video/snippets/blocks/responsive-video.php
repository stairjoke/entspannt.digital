<?php
	//Custom Video Block
	
	// !!! Rule: Browser evaluates top to bottom and takes the first video that is true. No point system like in CSS!
?>

<video <?php
	if($class = $block->class()) {
		$class = "class='" . preg_replace("/, /", " ", $class) . "' ";
		echo($class);
	}
	if($controls = $block->controls()) {
		$controls = ($controls) ? "controls" : "";
		echo($controls);
	}
?>>
<!--
	Info, last updated Jan 13, 2024:
	
	Safari will load and play the first video it can, which is WebM. But Safari does not support all WebM features, like transparency. This means it will play the WebM video without transparency, rather than loading the HEVC/MP4 video, which it could play correctly — including transparency.
	
	Google Chrome will load and play WebM and MP4 videos, but it cannot display MP4 videos correctly if they include transparency. Chrome, however, will always prefer the WebM video, even when it is the last in the list of videos it could play.
	
	Always put the WebM source _after_ the MP4 source to ensure Safari picks the MP4 source. Chrome will prefer WebM over MP4 regardless of its position in the list.
-->
	
	<?php
		function wenzelsDesignResponsiveVideoSourceGenerator($block, $name, $width) {
			//videoAMEMP4
			//videoNAMEWebM
			$mp4FieldName = "video" . $name . "MP4";
			$webmFieldName = "video" . $name . "WebM";
			
			if($mp4 = $block->$mp4FieldName()?->toFile()){
				if($webm = $block->$webmFieldName()?->toFile()){
					$source = "<source srcset='";
					$source .= $webm->url() . ' ' . $width . 'w, ';
					$source .= $mp4->url() . ' ' . $width . 'w';
					$source .= "' />";
					
					echo($source);
				}
			}
		}
		
		wenzelsDesignResponsiveVideoSourceGenerator($block, "mobile", "390");
		wenzelsDesignResponsiveVideoSourceGenerator($block, "tablet", "414");
		wenzelsDesignResponsiveVideoSourceGenerator($block, "desktop", "744");
		wenzelsDesignResponsiveVideoSourceGenerator($block, "desktopxl", "1280");
	?>
	
	<source src="<?= $block->videoDesktopMP4()->toFile()->url() ?>" type="video/mp4" />	
	<source src="<?= $block->videoDesktopWebM()->toFile()->url() ?>" type="video/webm" />
</video>
