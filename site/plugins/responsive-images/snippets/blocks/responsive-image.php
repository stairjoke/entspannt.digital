<?php
	//Custom Image Block
	
	// !!! Rule: Browser evaluates top to bottom and takes the first image that is true. No point system like in CSS!
?>

<picture <?= ($block->class()->isNotEmpty()) ? "class='" . preg_replace("/, /", " ", $block->class()) . "'" : "" ; ?>>
	<?php
		$responsiveImage_config = [
			'breakpoints' => [
				'desktop' => [
					'min-width' => 1024,
					'factors' => [1, 2]
				],
				'tablet' => [
					'min-width' => 535,
					'factors' => [1, 2, 3]
				],
				'mobile' => [
					'min-width' => 0,
					'factors' => [1, 3]
				]
			]
		];
		
		// Iterate through all breakpoints
		foreach($responsiveImage_config['breakpoints'] as $device => $breakpoint){
// –– DARK MODE ––
			
			//Open <source />-element
			echo('<source media="(min-width: '. $breakpoint['min-width'] .'px) and (prefers-color-scheme: dark)" ');
			$try = $device . '1x' . 'dark';
			if($image = $block->$try()->toFile()){
				echo('width="' . $image->width() . '" height="' . $image->height() . '" ');
			}
			echo('srcset="');
			
			// Count numebr of factors in $config array for this breakpoint
			$numberOfFactors = 0;
			$numberOfFactors = count($breakpoint['factors']);
			
			// Iterate through all factors
			foreach($breakpoint['factors'] as $factor) {
				// Count down how many are left
				$numberOfFactors--;
				
				// Test if an image for this breakpoint and factor exists
				$try = $device . $factor . 'x' . 'dark';
				if($image = $block->$try()->toFile()){
			
					// If an image exists, echo the URL followed by the factor.
					echo($image->url() . ' ' . $factor . 'x');
					if($numberOfFactors > 0) {
						echo(', ');
					}
				}
				
			}
			
			echo('" />'); //end of <source />-element
			
// ––– LIGHT MODE –––
			
			//Open <source />-element
			echo('<source media="(min-width: '. $breakpoint['min-width'] .'px)" ');
			$try = $device . '1x';
			if($image = $block->$try()->toFile()){
				echo('width="' . $image->width() . '" height="' . $image->height() . '" ');
			}
			echo('srcset="');
			
			// Count numebr of factors in $config array for this breakpoint
			$numberOfFactors = 0;
			$numberOfFactors = count($breakpoint['factors']);
			
			// Iterate through all factors
			foreach($breakpoint['factors'] as $factor) {
				// Count down how many are left
				$numberOfFactors--;
				
				// Test if an image for this breakpoint and factor exists
				$try = $device . $factor . 'x';
				if($image = $block->$try()->toFile()){
			
					// If an image exists, echo the URL followed by the factor.
					echo($image->url() . ' ' . $factor . 'x');
					if($numberOfFactors > 0) {
						echo(', ');
					}
				}
				
			}
			
			echo('" />'); //end of <source />-element
		}
		
		if($image = $block->desktop1x()->toFile()){
			echo('<img alt="' . $block->alt() . '" src="' . $image->url() . '" width="' . $image->width() . '" height="' . $image->height() . '" />');
		}else{
			throw new Exception("Default image missing for responsive image block.");
		}
	?>
</picture>
