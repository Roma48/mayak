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
  	
  	<?php if(isset($this->item->extra_fields['eventhours'])) : ?>
  	<div class="eventslist-date"><?php echo $this->item->extra_fields['eventhours']; ?></div>
  	<?php endif; ?>
  	
	<div class="events-content">
		<?php if($this->item->params->get('latestItemImage') && !empty($this->item->image)): ?>
	   	<a class="itemImage" href="<?php echo $this->item->link; ?>" title="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>">
			<img src="<?php echo $this->item->image; ?>" alt="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>" style="width:<?php echo $this->item->imageWidth; ?>px;height:auto;" />
		</a>
		<?php endif; ?>
		
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
		
		<?php if($this->item->params->get('latestItemIntroText')): ?>
			<?php echo $this->item->introtext; ?>
		<?php endif; ?>
		
		<?php echo $this->item->event->AfterDisplay; ?>
		<?php echo $this->item->event->K2AfterDisplay; ?>
	</div>
	
	<?php 
	
		$event_venue = '';
		$event_speaker = '';
		
		if(isset($this->item->extra_fields['eventvenue'])) {
			$event_venue = $this->item->extra_fields['eventvenue'];
		}
		
		if(isset($this->item->extra_fields['eventspeaker'])) {
			$event_speaker = $this->item->extra_fields['eventspeaker'];
		}
		
	?>  
	   
	<?php if(
				$event_venue != '' ||
				$event_speaker != ''
			) : ?>       
	<div class="events-data">
		<dl>
			<?php if($event_venue != '') : ?>
				<dt><?php echo JText::_('TPL_GK_LANG_VENUE'); ?></dt>
				<dd><?php echo $event_venue; ?> </dd>
			<?php endif; ?>
			
			<?php if($event_speaker != '') : ?>
				<dt><?php echo JText::_('TPL_GK_LANG_SPEAKER'); ?></dt>
				<dd><?php echo $event_speaker; ?> </dd>
			<?php endif; ?>
		</dl>
	</div>
	<?php endif; ?>
</article>