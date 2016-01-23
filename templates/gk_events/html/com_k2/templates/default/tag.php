<?php

/**
 * @package		K2
 * @author		GavickPro http://gavick.com
 */

// no direct access
defined('_JEXEC') or die;

?>

<?php

/**
 * @package		K2
 * @author		GavickPro http://gavick.com
 */

// no direct access
defined('_JEXEC') or die;

?>

<section id="k2Container" class="category latestView<?php if($this->params->get('pageclass_sfx')) echo ' '.$this->params->get('pageclass_sfx'); ?>">
	<?php if($this->params->get('show_page_title')): ?>
	<header>
		<h1><?php echo $this->escape($this->params->get('page_title')); ?></h1>
	</header>
	<?php endif; ?>
	
	<?php if(count($this->items)): ?>
		<section class="itemList">
			<?php foreach($this->items as $item): ?>
				<?php $is_event_item = false; ?>
				<?php if($item->params->get('tagItemExtraFields') && count($item->extra_fields)): ?>
					<?php foreach ($item->extra_fields as $key=>$extraField): ?>
						<?php if($extraField->alias == 'eventhours'): ?>
						<?php $is_event_item = true; ?>
						<?php endif; ?>
					<?php endforeach; ?>
				<?php endif; ?>
			
				<?php if($is_event_item) : ?>
				<article class="itemView">
					<?php if(
							(
								$item->params->get('tagItemExtraFields',0) && 
								count($item->extra_fields)
							) ||
							$params->get('itemCategory')
						): ?>
					<div class="eventslist-date">
						<?php if($item->params->get('tagItemExtraFields') && count($item->extra_fields)): ?>
							<?php foreach ($item->extra_fields as $key=>$extraField): ?>
								<?php if($extraField->alias == 'eventhours'): ?>
								<span><?php echo $extraField->value; ?></span>
								<?php endif; ?>
							<?php endforeach; ?>
						<?php endif; ?>
						
						<?php if($item->params->get('genericItemCategory')): ?>
						<a href="<?php echo $this->item->category->link; ?>"><?php echo $item->category->name; ?></a>
						<?php endif; ?>
					</div>
					<?php endif; ?>
					
					<div class="events-content">	
						<?php if($item->params->get('genericItemTitle')): ?>
						<h3>
							<?php if ($item->params->get('genericItemTitleLinked')): ?>
							<a href="<?php echo $item->link; ?>"> <?php echo $item->title; ?> </a>
							<?php else: ?>
							<?php echo $item->title; ?>
							<?php endif; ?>
						</h3>
						<?php endif; ?>
	
			
						<?php if($item->params->get('genericItemIntroText')): ?>
						<?php echo $item->introtext; ?>
						<?php endif; ?>
						
						<?php if ($item->params->get('genericItemReadMore')): ?>
						<a class="button" href="<?php echo $item->link; ?>"> <?php echo JText::_('K2_READ_MORE'); ?> </a>
						<?php endif; ?>
					</div>
					
					<?php 
						$event_venue = '';
						$event_speaker = '';
						
						if($item->params->get('tagItemExtraFields') && count($item->extra_fields)) {
							foreach ($item->extra_fields as $key=>$extraField) {
								if($extraField->alias == 'eventvenue') {
									$event_venue = $extraField->value;
								}
								
								if($extraField->alias == 'eventspeaker') {
									$event_speaker = $extraField->value;
								}
							}
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
				<?php else : ?>
				<article class="itemView">
					<div class="itemBlock">
						<?php if($item->params->get('genericItemTitle')): ?>
						<header>
							<h2>
								<?php if ($item->params->get('genericItemTitleLinked')): ?>
								<a href="<?php echo $item->link; ?>"> <?php echo $item->title; ?> </a>
								<?php else: ?>
								<?php echo $item->title; ?>
								<?php endif; ?>
							</h2>
						</header>
						<?php endif; ?>
						
						<?php if(
							$item->params->get('genericItemDateCreated') ||
							$this->params->get('genericItemCategory')
						): ?>
						<p>
							<i class="gk-icon-calendar"></i>
							<?php if($item->params->get('genericItemDateCreated')): ?>
							<time datetime="<?php echo JHtml::_('date', $item->created, JText::_(DATE_W3C)); ?>" pubdate>
								<?php echo JHTML::_('date', $item->created, JText::_('D j M, Y')); ?>
							</time>
							<?php endif; ?>
							
							<?php if($this->params->get('genericItemCategory')): ?>
							<span><?php echo JText::_('K2_PUBLISHED_IN'); ?></span>
							<a href="<?php echo $item->category->link; ?>"><?php echo $item->category->name; ?></a>
							<?php endif; ?>
						</p>
						<?php endif; ?>
						
						<?php if($item->params->get('genericItemImage') && !empty($item->imageLarge)): ?>
						<div class="itemImageBlock"> <a class="itemImage" href="<?php echo $item->link; ?>" title="<?php if(!empty($item->image_caption)) echo $item->image_caption; else echo $item->title; ?>"> <img src="<?php echo $item->imageLarge; ?>" alt="<?php if(!empty($item->image_caption)) echo $item->image_caption; else echo $item->title; ?>" /> </a> </div>
						<?php endif; ?>
						
						<div class="itemBody">
							<?php if($item->params->get('genericItemIntroText')): ?>
							<div class="itemIntroText"> <?php echo $item->introtext; ?> </div>
							<?php endif; ?>
							
							<?php if ($item->params->get('genericItemReadMore')): ?>
							<a class="button" href="<?php echo $item->link; ?>"> <?php echo JText::_('K2_READ_MORE'); ?> </a>
							<?php endif; ?>
						</div>
					</div>
				</article>
				<?php endif; ?>
			<?php endforeach; ?>
		</section>
		
		<?php if($this->params->get('tagFeedIcon',1)): ?>
		<a class="k2FeedIcon" href="<?php echo $this->feed; ?>"><?php echo JText::_('K2_SUBSCRIBE_TO_THIS_RSS_FEED'); ?></a>
		<?php endif; ?>
		
		<?php if($this->pagination->getPagesLinks()): ?>
		<?php echo str_replace('</ul>', '<li class="counter">'.$this->pagination->getPagesCounter().'</li></ul>', $this->pagination->getPagesLinks()); ?>
		<?php endif; ?>
	<?php endif; ?>
</section>
