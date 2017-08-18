<?php
/**
 * Template part to display Carousel widget.
 *
 * @package Chefplaza
 * @subpackage widgets
 */
?>

<div class="inner">
	<div class="content-wrapper">
		<?php echo $date; ?>
		<div class="content-wrapper-inner">
			<header class="entry-header">
				<?php echo $image; ?>
				<?php echo $title; ?>
			</header>
			<div class="entry-content">
				<?php echo $content; ?>
			</div>
		</div>
		<div class="entry-footer">
			<?php echo $more_button; ?>
		</div>
	</div>
</div>