<?php

/**
 * @package		K2
 * @author		GavickPro http://gavick.com
 */

// no direct access
defined('_JEXEC') or die;

// Get user stuff (do not change)
$user = JFactory::getUser();

?>

<section id="k2Container" class="category userView<?php if($this->params->get('pageclass_sfx')) echo ' '.$this->params->get('pageclass_sfx'); ?>">
  <?php if($this->params->get('show_page_title') && $this->params->get('page_title')!=$this->user->name): ?>
  <header>
     <h1><?php echo $this->escape($this->params->get('page_title')); ?></h1>
  </header>
  <?php endif; ?>
  <?php if ($this->params->get('userImage') || $this->params->get('userName') || $this->params->get('userDescription') || $this->params->get('userURL') || $this->params->get('userEmail')): ?>
  <div class="itemAuthorData">
    <div class="itemAuthorBlock">
      <?php if ($this->params->get('userImage') && !empty($this->user->avatar)): ?>
      <img src="<?php echo $this->user->avatar; ?>" alt="<?php echo $this->user->name; ?>"  />
      <?php endif; ?>
      <div class="itemAuthorDetails">
        <?php if ($this->params->get('userName')): ?>
        <strong><?php echo $this->user->name; ?></strong>
        <?php endif; ?>
        <?php if ($this->params->get('userDescription') && isset($this->user->profile->description)): ?>
        <p><?php echo $this->user->profile->description; ?></p>
        <?php endif; ?>
        <p>
          <?php if ($this->params->get('userEmail')): ?>
          <?php echo JText::_('K2_EMAIL'); ?>: <?php echo JHTML::_('Email.cloak', $this->user->email); ?>
          <?php endif; ?>
          <?php if ($this->params->get('userURL') && isset($this->user->profile->url)): ?>
        <?php echo JText::_('K2_WEBSITE_URL'); ?>: <a href="<?php echo $this->user->profile->url; ?>" target="_blank" rel="me"><?php echo $this->user->profile->url; ?></a>
          <?php endif; ?>
        </p>
      </div>
      <?php echo $this->user->event->K2UserDisplay; ?> 
   </div>
  </div>
  <?php endif; ?>
  <?php if(count($this->items)): ?>
  <section class="itemList">
    <?php foreach ($this->items as $item): ?>
    <article class="itemView<?php if(!$item->published || ($item->publish_up != $this->nullDate && $item->publish_up > $this->now) || ($item->publish_down != $this->nullDate && $item->publish_down < $this->now)) echo ' itemViewUnpublished'; ?><?php echo ($item->featured) ? ' itemIsFeatured' : ''; ?> clearfix"> <?php echo $item->event->BeforeDisplay; ?> <?php echo $item->event->K2BeforeDisplay; ?>
          <div class="itemBlock">
                <?php if($item->params->get('userItemTitle')): ?>
                <header>
                  <h2>
                  	<?php $title = explode('--', $item->title); ?>
                    <?php if ($item->params->get('userItemTitleLinked')): ?>
                    <a href="<?php echo $item->link; ?>"><?php echo $title[0]; ?></a>
                    <?php else: ?>
                    <?php echo $title[0]; ?>
                    <?php endif; ?>
                  </h2>
                </header>
                <?php endif; ?>
                <?php echo $item->event->AfterDisplayTitle; ?> 
                <?php echo $item->event->K2AfterDisplayTitle; ?>
                
                
                <?php if(
                	$item->params->get('userItemDateCreated') ||
                	$this->params->get('userItemCategory')
                ): ?>
                <p> 
                	<i class="gk-icon-calendar"></i>
                      <?php if($item->params->get('userItemDateCreated')): ?>
                      <time datetime="<?php echo JHtml::_('date', $item->created, JText::_(DATE_W3C)); ?>" pubdate> <?php echo JHTML::_('date', $item->created, JText::_('D j M, Y')); ?> </time>
                      <?php endif; ?>
                      <?php if($this->params->get('userItemCategory')): ?>
                      <span><?php echo JText::_('K2_PUBLISHED_IN'); ?></span> <a href="<?php echo $item->category->link; ?>"><?php echo $item->category->name; ?></a>
                      <?php endif; ?>
                      
                      <?php if(isset($item->editLink)): ?>
                     <!-- Item edit link -->
                     <span class="userItemEditLink">
                        <a class="modal" rel="{handler:'iframe',size:{x:990,y:550}}" href="<?php echo $item->editLink; ?>">
                           <?php echo JText::_('K2_EDIT_ITEM'); ?>
                        </a>
                     </span>
                     <?php endif; ?>
                </p>
                <?php endif; ?>
                
                <?php if($this->params->get('userItemImage') && !empty($item->imageLarge)): ?>
                <div class="itemImageBlock"> <a class="itemImage" href="<?php echo $item->link; ?>" title="<?php if(!empty($item->image_caption)) echo K2HelperUtilities::cleanHtml($item->image_caption); else echo K2HelperUtilities::cleanHtml($item->title); ?>"> <img src="<?php echo $item->imageLarge; ?>" alt="<?php if(!empty($item->image_caption)) echo K2HelperUtilities::cleanHtml($item->image_caption); else echo K2HelperUtilities::cleanHtml($item->title); ?>" style="width:<?php echo $this->params->get('itemImageLarge'); ?>px; height:auto;" /> </a> </div>
                <?php endif; ?>
                <div class="itemBody"> 
                	<?php echo $item->event->BeforeDisplayContent; ?> 
                	<?php echo $item->event->K2BeforeDisplayContent; ?>
                      <?php if($this->params->get('userItemIntroText')): ?>
                      <div class="itemIntroText"><?php echo $item->introtext; ?></div>
                      <?php endif; ?>
                      <?php echo $item->event->AfterDisplayContent; ?> <?php echo $item->event->K2AfterDisplayContent; ?>
                      <?php if ($item->params->get('genericItemReadMore')): ?>
                      <a class="button" href="<?php echo $item->link; ?>"> <?php echo JText::_('K2_READ_MORE'); ?> </a>
                      <?php endif; ?>
                </div>
          </div>
          <?php echo $item->event->AfterDisplay; ?> 
          <?php echo $item->event->K2AfterDisplay; ?> 
    </article>
    <?php endforeach; ?>
  </section>
  <?php if($this->params->get('userFeedIcon',1)): ?>
  <a class="k2FeedIcon" href="<?php echo $this->feed; ?>"><?php echo JText::_('K2_SUBSCRIBE_TO_THIS_RSS_FEED'); ?></a>
  <?php endif; ?>
  <?php if(count($this->pagination->getPagesLinks())): ?>
  <?php echo str_replace('</ul>', '<li class="counter">'.$this->pagination->getPagesCounter().'</li></ul>', $this->pagination->getPagesLinks()); ?>
  <?php endif; ?>
  <?php endif; ?>
</section>
