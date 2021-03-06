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

<article class="itemView group<?php echo ucfirst($this->item->itemGroup); ?><?php echo ($this->item->featured) ? ' itemIsFeatured' : ''; ?><?php if($this->item->params->get('pageclass_sfx')) echo ' '.$this->item->params->get('pageclass_sfx'); ?>"> 
	<?php echo $this->item->event->BeforeDisplay; ?> 
	<?php echo $this->item->event->K2BeforeDisplay; ?>		
	
	<div class="itemBlock">	
		<header>
				<?php if(isset($this->item->editLink)): ?>
				<a class="catItemEditLink modal" rel="{handler:'iframe',size:{x:990,y:550}}" href="<?php echo $this->item->editLink; ?>">
					<?php echo JText::_('K2_EDIT_ITEM'); ?>
				</a>
				<?php endif; ?>
		
				<?php if($this->item->params->get('catItemTitle')): ?>
				<h2>
						<?php if ($this->item->params->get('catItemTitleLinked')): ?>
						<a href="<?php echo $this->item->link; ?>"><?php echo $this->item->title; ?></a>
						<?php else: ?>
						<?php echo $this->item->title; ?>
						<?php endif; ?>
						<?php if($this->item->params->get('catItemFeaturedNotice') && $this->item->featured): ?>
						<sup><?php echo JText::_('K2_FEATURED'); ?></sup>
						<?php endif; ?>
				</h2>
				<?php endif; ?>
		</header>
		
		<?php echo $this->item->event->AfterDisplayTitle; ?> 
		<?php echo $this->item->event->K2AfterDisplayTitle; ?>
		
		<?php if(
			$this->item->params->get('catItemDateCreated') ||
			$this->item->params->get('catItemAuthor')
		): ?>
		<p>
			<i class="gk-icon-calendar"></i>
			<?php if($this->item->params->get('catItemDateCreated')): ?>
			<time datetime="<?php echo JHtml::_('date', $this->item->created, JText::_(DATE_W3C)); ?>" pubdate>
				<?php echo JHTML::_('date', $this->item->created, JText::_('D j M, Y')); ?>
			</time>
			<?php endif; ?>
			
			<?php if($this->item->params->get('catItemAuthor')): ?>
			<?php echo K2HelperUtilities::writtenBy($this->item->author->profile->gender); ?> <?php if(isset($this->item->author->link) && $this->item->author->link): ?><a rel="author" href="<?php echo $this->item->author->link; ?>"><?php echo $this->item->author->name; ?></a><?php else: ?><?php echo $this->item->author->name; ?><?php endif; ?>
			<?php endif; ?>
		</p>
		<?php endif; ?>
		
		<?php if($this->item->params->get('catItemImage') && !empty($this->item->image)): ?>
		<div class="itemImageBlock"> <a class="itemImage" href="<?php echo $this->item->link; ?>" title="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>"> <img src="<?php echo $this->item->image; ?>" alt="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>" style="width:<?php echo $this->item->imageWidth; ?>px; height:auto;" /> </a> </div>
		<?php endif; ?>
		
		<div class="itemBody"> 
				<?php echo $this->item->event->BeforeDisplayContent; ?> 
				<?php echo $this->item->event->K2BeforeDisplayContent; ?>
				
				<?php if($this->item->params->get('catItemIntroText')): ?>
				<div class="itemIntroText"> <?php echo $this->item->introtext; ?> </div>
				<?php endif; ?>
				
				<?php echo $this->item->event->AfterDisplayContent; ?> 
				<?php echo $this->item->event->K2AfterDisplayContent; ?>
				
				<?php if ($this->item->params->get('catItemReadMore')): ?>
				<a class="button" href="<?php echo $this->item->link; ?>"> <?php echo JText::_('K2_READ_MORE'); ?> </a>
				<?php endif; ?>
		</div>
		
		<?php echo $this->item->event->AfterDisplay; ?> 
		<?php echo $this->item->event->K2AfterDisplay; ?>
	</div>
</article>
