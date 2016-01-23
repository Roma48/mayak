<?php

/**
 * @package		K2
 * @author		GavickPro http://gavick.com
 */

// no direct access
defined('_JEXEC') or die;

$header_display = $this->item->params->get('latestItemTitle');

?>

<article class="itemView itemViewMoreCols">
	<?php echo $this->item->event->BeforeDisplay; ?>
	<?php echo $this->item->event->K2BeforeDisplay; ?>
  	
  	<?php if($this->item->params->get('latestItemImage') && !empty($this->item->image)): ?>
  	<div class="itemImageBlock<?php if(!($header_display || $content_display)) : ?> nomargin<?php endif; ?>">
  	   	<a class="itemImage" href="<?php echo $this->item->link; ?>" title="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>">
  			<img src="<?php echo $this->item->image; ?>" alt="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>" style="width:<?php echo $this->item->imageWidth; ?>px;height:auto;" />
  		</a>
  	</div>
  	<?php endif; ?>
  	
  	<?php if($header_display): ?>
	<header<?php if(!$this->item->params->get('latestItemDateCreated')): ?> class="nodate"<?php endif; ?>>
		<?php if($this->item->params->get('latestItemTitle')): ?>
		<h2>
			<?php if ($this->item->params->get('latestItemTitleLinked')): ?>
				<a href="<?php echo $this->item->link; ?>"><?php echo $this->item->title; ?></a>
			<?php else: ?>
				<?php echo $this->item->title; ?>
			<?php endif; ?>
		</h2>
		<?php endif; ?>
  	</header>
  	<?php endif; ?>

  	<?php echo $this->item->event->AfterDisplayTitle; ?>
  	<?php echo $this->item->event->K2AfterDisplayTitle; ?>



	<?php echo $this->item->event->AfterDisplay; ?>
  	<?php echo $this->item->event->K2AfterDisplay; ?>
</article>