<?php 

?>
<?php if (!defined ('ABSPATH')) die ('No direct access allowed'); ?><?php if (!empty ($gallery)) : ?>

<div id="<?php echo $gallery->anchor ?>" class="galleryview">
	<!-- Thumbnails -->
	<?php foreach ($images as $image) : ?>		
	<div class="panel">
		<img src="<?php echo $image->imageURL ?>" />
		<div class="panel-overlay">
			<p><?php echo html_entity_decode ($image->description); ?></p>
		</div>
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
			panel_height: 320,
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