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
	<source src="<?= $block->videoDesktopMP4()->toFile()->url() ?>" type="video/mp4" />	
	<source src="<?= $block->videoDesktopWebM()->toFile()->url() ?>" type="video/webm" />
	
	<!-- Subtitles-->
	<?php
	if($subtitles = $block->subtitles()?->toFiles()) {
		foreach($subtitles as $track) { 
			$track = "<track ";
			$track .= "src='" . $track->url() ."' ";
			$track .= "kind='subtitles'";
			$track .= "srclang='". $track->name() ."'";
			$track .=  "/>"
			
			echo($track);
		}
	}
	?>
</video>
