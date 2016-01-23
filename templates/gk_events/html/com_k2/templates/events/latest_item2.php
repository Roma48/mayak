<?php

/**
 * @package		K2
 * @author		GavickPro http://gavick.com
 */

// no direct access
defined('_JEXEC') or die;

?>

<article class="itemView">
	<?php echo $this->item->event->BeforeDisplay; ?>
	<?php echo $this->item->event->K2BeforeDisplay; ?>
  	
	<div class="gkEventInfo">
		<?php if($this->item->params->get('latestItemImage') && !empty($this->item->image)): ?>
	   	<a class="itemImage" href="<?php echo $this->item->link; ?>" title="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>">
			<img src="<?php echo $this->item->image; ?>" alt="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>" style="width:<?php echo $this->item->imageWidth; ?>px;height:auto;" />
		</a>
		<?php endif; ?>
		
		<div>
			<?php if($this->item->params->get('latestItemTitle')): ?>
			<h3>
				<?php if ($this->item->params->get('latestItemTitleLinked')): ?>
					<a href="<?php echo $this->item->link; ?>"><?php echo $this->item->title; ?></a>
				<?php else: ?>
					<?php echo $this->item->title; ?>
				<?php endif; ?>
			</h3>
			<?php endif; ?>
			
			<?php echo $this->item->event->AfterDisplayTitle; ?>
			<?php echo $this->item->event->K2AfterDisplayTitle; ?>
			
			<?php if(isset($this->item->extra_fields['eventhours'])) : ?>
			<small>
				<i class="gk-icon-clock"></i>
				<?php echo $this->item->extra_fields['eventhours']; ?>
			</small>
			<?php endif; ?>
		</div>
		
		<?php echo $this->item->event->AfterDisplay; ?>
		<?php echo $this->item->event->K2AfterDisplay; ?>
	</div>
</article>