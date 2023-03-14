<?php
	function get_header_title_as_html($site){
		// Display different site-titles depending on availability
		$has_default_header = $site->header()->exists();
		$has_tablet_header = $site->header_tablet()->exists();
		$has_mobile_header = $site->header_mobile()->exists();
	
		$title = "<div class=title>";
		$title .= "<a href='{$site->url()}' tabindex=1 itemprop=name>{$site->title()}</a>";
		
		if($has_default_header || $has_tablet_header || $has_mobile_header) {
			// At least one of the headers is set
			$title .= " {$site->separator()} ";
			
			if($has_default_header){
				// At least the desktop title is set
				if($has_tablet_header) {
					// At least desktop and tablet title available
					if($has_mobile_header) {
						// All three title are set
						$title .= $site->header();
						$title .= $site->header_tablet();
						$title  .= $site->header_mobile();
					}else{
						// No mobile title, but tablet and desktop
						$title .= $site->header();
						$title .= $site->header_tablet();
					}
				}else{
					if($has_mobile_header) {
						// Desktop and mobile, no tablet
						$title .= $site->header();
						$title  .= $site->header_mobile();
					}else{
						// No mobile title, no tablet, but desktop
						$title .= $site->header();
					}
				}
			}else{
				//No desktop
				if($has_tablet_header){
					//no desktop, but tablet
					if($has_mobile_header){
						// tablet and mobile, no desktop
						$title .= $site->header_tablet();
						$title  .= $site->header_mobile();
					}else{
						// only tablet
						$title .= $site->header_tablet();
					}
				}else{
					//no desktop no tablet
					if($has_mobile_header){
						// only mobile title
						$title  .= $site->header_mobile();
					}
				}
			}
		}
		
		$title .= '</div>';
		return $title;
	}
?>