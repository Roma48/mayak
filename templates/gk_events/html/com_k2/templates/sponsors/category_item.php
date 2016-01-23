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
          <?php if($this->item->params->get('catItemImage') && !empty($this->item->image)): ?>
          <img src="<?php echo $this->item->image; ?>" alt="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>" />
          <?php endif; ?>
          <div class="events-content">
                    <?php if($this->item->params->get('catItemTitle')): ?>
                    <h3>
                              <?php if ($this->item->params->get('catItemTitleLinked')): ?>
                              <a href="<?php echo $this->item->link; ?>">
                              <?php 
						$title_data = explode('--', $this->item->title);
						if(count($title_data) > 1) {
							echo $title_data[0] . '<small>' . $title_data[1] . '</small>';
						} else {
							echo $title_data[0];
						}
					?>
                              </a>
                              <?php else: ?>
                              <?php 
						$title_data = explode('--', $this->item->title);
						if(count($title_data) > 1) {
							echo $title_data[0] . '<small>' . $title_data[1] . '</small>';
						} else {
							echo $title_data[0];
						}
					?>
                              <?php endif; ?>
                    </h3>
                    <?php endif; ?>
                    <?php echo $this->item->event->AfterDisplayTitle; ?> <?php echo $this->item->event->K2AfterDisplayTitle; ?>
                    <?php if($this->item->params->get('catItemIntroText')): ?>
                    <?php echo $this->item->introtext; ?>
                    <?php if(isset($this->item->editLink)): ?>
                    <a class="catItemEditLink modal" rel="{handler:'iframe',size:{x:990,y:550}}" href="<?php echo $this->item->editLink; ?>"> <?php echo JText::_('K2_EDIT_ITEM'); ?> </a>
                    <?php endif; ?>
                    <?php endif; ?>
          </div>
          <?php if($this->item->params->get('catItemExtraFields') && count($this->item->extra_fields)): ?>
          <!-- Item extra fields -->
          <div class="events-data">
                    <dl>
                              <?php foreach ($this->item->extra_fields as $key=>$extraField): ?>
                              <?php if($extraField->value != ''): ?>
                              <dt><?php echo $extraField->name; ?></dt>
                              <dd><?php echo $extraField->value; ?></dd>
                              <?php endif; ?>
                              <?php endforeach; ?>
                    </dl>
          </div>
          <?php endif; ?>
          <?php echo $this->item->event->AfterDisplay; ?> <?php echo $this->item->event->K2AfterDisplay; ?> </article>
