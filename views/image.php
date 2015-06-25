<div id="imageWrapper">
<?php


	  // $directory = 'images/';
   //    $files = glob($directory . '*.png');

   //    if ( $files !== false ){
   //        $filecount = count( $files );
   //    } else {
   //     $filecount = 0;
   //    }      
   //    for ($i=1; $i < $filecount + 1; $i++) {
   //    	echo '<img src="images/Picture_' . $i .'.png">';	
   //    }
		$dirname = "images/";
		$images = glob("$dirname*.png", GLOB_BRACE+GLOB_NOSORT);
		usort($images, create_function('$b,$a', 'return filemtime($a) - filemtime($b);'));

		$i = 0;
		foreach($images as $image) {
			$i++;
			echo '<div class="imageHolders">',
					 '<a href="#img'.$i.'">',
						 '<img src="'.$image.'" id="image'.$i.'">',
					 '</a>',
				 '</div>';
			echo '<div class="overlay" id="img'.$i.'">',
				 	'<a href="#_" class="lightbox">',
						'<img src="'.$image.'">',
					'</a>',
				 '</div>'; 
		}
?>
</div>