<?php 

?>
<?php if (!defined ('ABSPATH')) die ('No direct access allowed'); ?><?php if (!empty ($gallery)) : ?>

<div id="<?php echo $gallery->anchor ?>" class="newsservicegallery">
	<!-- Thumbnails -->
	<?php foreach ($images as $image) : ?>
	<div class="panel">
		<?php
			$description = html_entity_decode( $image->description );
			$results = explode( 'http://', $description );
			$description = $results[0];
			if ( isset( $results[1] ) ) {
				$url = $results[1];
			} else {
				$url = false;
			}
		?>
		<?php if ( $image->alttext ): ?>
			<h3><?php echo $image->alttext; ?></h3>
		<?php endif; ?>
		<?php if ( $url ): ?>
		<a href="http://<?php echo $url; ?>">
		<?php endif; ?>
		<img src="<?php echo $image->imageURL ?>" height="320px" width="480px" />
		<?php if ( $description ): ?>
		<div class="panel-overlay">
			<p><?php echo $description; ?></p>
		</div>
		<?php endif; ?>
		<?php if ( $url ): ?>
		</a>
		<?php endif; ?>
	</div>
 	<?php endforeach; ?>
  	<ul class="filmstrip">
  	<?php foreach ($images as $image) : ?>	
	    <li><img src="<?php echo $image->thumbnailURL ?>" alt="<?php echo $image->alttext ?>" title="<?php echo $image->alttext ?>" /></li>
	<?php endforeach; ?>
  	</ul>

</div>

<script type="text/javascript" defer="defer">
	jQuery("document").ready(function(){
		jQuery('#<?php echo $gallery->anchor ?>').galleryView({
			panel_width: 480,
			panel_height: 340,
			frame_width: 40,
			frame_height: 40,
			transition_interval: 10000,
			overlay_color: '#1B1B1B',
			overlay_text_color: 'white',
			caption_text_color: '#222',
			background_color: 'transparent',
			border: 'none',
			nav_theme: 'dark',
			easing: 'easeInOutQuad'
		});
	});
	
</script>

<?php endif; ?>