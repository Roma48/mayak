<?php

/**
 * @package		K2
 * @author		GavickPro http://gavick.com
 */

// no direct access
defined('_JEXEC') or die;

// Define default image size (do not change)
K2HelperUtilities::setDefaultImage($this->item, 'itemlist', $this->params);

?>

<article> <?php echo $this->item->event->BeforeDisplay; ?> <?php echo $this->item->event->K2BeforeDisplay; ?>
          <?php if($this->item->params->get('catItemExtraFields') && count($this->item->extra_fields)): ?>
          <?php foreach ($this->item->extra_fields as $key=>$extraField): ?>
          <?php if($extraField->alias == 'eventhours'): ?>
          <div class="eventslist-date"><?php echo $extraField->value; ?></div>
          <?php endif; ?>
          <?php endforeach; ?>
          <?php endif; ?>
          <div class="events-content">
                    <?php if(isset($this->item->editLink)): ?>
                    <a class="catItemEditLink modal" rel="{handler:'iframe',size:{x:990,y:550}}" href="<?php echo $this->item->editLink; ?>"> <?php echo JText::_('K2_EDIT_ITEM'); ?> </a>
                    <?php endif; ?>
                                        
                   	<?php if($this->item->params->get('catItemImage') && !empty($this->item->image)): ?>
                   	<a class="itemImage" href="<?php echo $this->item->link; ?>" title="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>"> <img src="<?php echo $this->item->image; ?>" alt="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>" style="width:<?php echo $this->item->imageWidth; ?>px; height:auto;" /> </a>
                   	<?php endif; ?>
                    
                    <?php if($this->item->params->get('catItemTitle')): ?>
                    <h3>
                              <?php if ($this->item->params->get('catItemTitleLinked')): ?>
                              <a href="<?php echo $this->item->link; ?>"><?php echo $this->item->title; ?></a>
                              <?php else: ?>
                              <?php echo $this->item->title; ?>
                              <?php endif; ?>
                              <?php if($this->item->params->get('catItemFeaturedNotice') && $this->item->featured): ?>
                              <small><?php echo JText::_('K2_FEATURED'); ?></small>
                              <?php endif; ?>
                    </h3>
                    <?php endif; ?>
                    <?php echo $this->item->event->AfterDisplayTitle; ?> <?php echo $this->item->event->K2AfterDisplayTitle; ?>
                    <?php if($this->item->params->get('catItemIntroText')): ?>
                    <?php echo $this->item->introtext; ?>
                    <?php endif; ?>
                    <?php echo $this->item->event->AfterDisplay; ?> <?php echo $this->item->event->K2AfterDisplay; ?> </div>
          <?php 
				
				$event_venue = '';
				$event_speaker = '';
				
				if($this->item->params->get('catItemExtraFields') && count($this->item->extra_fields)) {
					foreach ($this->item->extra_fields as $key=>$extraField) {
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
