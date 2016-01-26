<?php

/**
 *
 * Default view
 *
 * @version             1.0.0
 * @package             Gavern Framework
 * @copyright			Copyright (C) 2010 - 2011 GavickPro. All rights reserved.
 *               
 */

error_reporting(0);
// No direct access.
defined('_JEXEC') or die;
//
$app = JFactory::getApplication();
$user = JFactory::getUser();
// getting User ID
$userID = $user->get('id');
// getting params
$option = JRequest::getCmd('option', '');
$view = JRequest::getCmd('view', '');
// defines if com_users
define('GK_COM_USERS', $option == 'com_users' && ($view == 'login' || $view == 'registration'));
// other variables
$btn_login_text = ($userID == 0) ? JText::_('TPL_GK_LANG_LOGIN') : JText::_('TPL_GK_LANG_LOGOUT');
// make sure that the modal will be loaded
JHTML::_('behavior.modal');
//
$page_suffix_output .= $this->page_suffix;
$page_suffix_table = explode(' ', $page_suffix_output);
$tpl_page_suffix = $page_suffix_output != '' ? ' class="'.$page_suffix_output.'" ' : '';

?>
<!DOCTYPE html>
<html lang="<?php echo $this->APITPL->language; ?>">
<head>
	<?php $this->layout->addTouchIcon(); ?>
	<?php if(
			$this->browser->get('browser') == 'ie6' || 
			$this->browser->get('browser') == 'ie7' || 
			$this->browser->get('browser') == 'ie8' || 
			$this->browser->get('browser') == 'ie9'
		) : ?>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
	<?php endif; ?>
    <?php if($this->API->get('rwd', 1)) : ?>
    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2.0">
	<?php else : ?>
		<meta name="viewport" content="width=<?php echo $this->API->get('template_width', 1020)+80; ?>">
	<?php endif; ?>
    <jdoc:include type="head" />
    <?php $this->layout->loadBlock('head'); ?>
	<?php $this->layout->loadBlock('cookielaw'); ?>
</head>
<body<?php echo $tpl_page_suffix; ?><?php if($this->browser->get("tablet") == true) echo ' data-tablet="true"'; ?><?php if($this->browser->get("mobile") == true) echo ' data-mobile="true"'; ?><?php $this->layout->generateLayoutWidths(); ?> data-zoom-size="<?php echo $this->API->get('gk_zoom_size', '150'); ?>">	
	<?php
	     // put Google Analytics code
	     echo $this->social->googleAnalyticsParser();
	?>
	<?php if ($this->browser->get('browser') == 'ie8' || $this->browser->get('browser') == 'ie7' || $this->browser->get('browser') == 'ie6') : ?>
	<!--[if lte IE 8]>
	<div id="ieToolbar"><div><?php echo JText::_('TPL_GK_LANG_IE_TOOLBAR'); ?></div></div>
	<![endif]-->
	<?php endif; ?>

	<div id="gkBg">
		<?php if($this->API->modules('lang')) : ?>
			<div id="gkLang">
				<div class="gkPage">
					<jdoc:include type="modules" name="lang" style="gk_style" />
				</div>
			</div>
		<?php endif; ?>
	    <header id="gkHeader"<?php if(in_array('frontpage', $page_suffix_table) === FALSE) : ?> class="menu-visible"<?php endif; ?>>		
			<div id="gkHeaderNav"<?php if(in_array('frontpage', $page_suffix_table) === FALSE) : ?> class="static"<?php endif; ?>>
				<div class="gkPage">
	                 <?php $this->layout->loadBlock('logo_small'); ?>
	                 
	                 <?php if($this->API->get('show_menu', 1)) : ?>
	                 <div id="gkMainMenu" class="gkMenuClassic">
	                         <?php
	                 		$this->mainmenu->loadMenu($this->API->get('menu_name','mainmenu')); 
	                 	    $this->mainmenu->genMenu($this->API->get('startlevel', 0), $this->API->get('endlevel',-1));
	                 	?>
	                 </div>
	                 <?php endif; ?>
	                 
	                 <?php if($this->API->get('show_menu', 1)) : ?>
	                 <div id="gkMobileMenu" class="gkPage">
	                     <i id="static-aside-menu-toggler" class="fa fa-bars"></i>
	                 </div>
	                 <?php endif; ?>
		    	</div>
	    	</div>

	    	
	    	<?php if($this->API->modules('header')) : ?>
	    	<div id="gkHeaderMod">
	    		<div class="gkPage">
	    			<?php $this->layout->loadBlock('logo'); ?>
	    			<jdoc:include type="modules" name="header" style="none" />
	    		</div>
			</div>
	    	<?php endif; ?>
	    </header>
	    
	    <?php if(count($app->getMessageQueue())) : ?>
	    <jdoc:include type="message" />
	    <?php endif; ?>
	
		<div id="gkPageContent">
	    	<?php if($this->API->modules('top1')) : ?>
	    	<section id="gkTop1" class="gkCols3<?php if($this->API->modules('top1') == 1) : ?> gkSingleModule<?php endif; ?>">
	    		<div class="gkPage"<?php if(isset($this->module_ids['top1'])) echo ' id="'.$this->module_ids['top1'].'"'; ?>>
	    			<jdoc:include type="modules" name="top1" style="gk_style"  modnum="<?php echo $this->API->modules('top1'); ?>" modcol="3" />
	    		</div>
	    	</section>
	    	<?php endif; ?>
	    	
	    	<?php if($this->API->modules('top2')) : ?>
	    	<section id="gkTop2" class="gkCols3<?php if($this->API->modules('top2') == 1) : ?> gkSingleModule<?php endif; ?>">
	    		<div class="gkPage"<?php if(isset($this->module_ids['top2'])) echo ' id="'.$this->module_ids['top2'].'"'; ?>>
	    			<jdoc:include type="modules" name="top2" style="gk_style" modnum="<?php echo $this->API->modules('top2'); ?>" modcol="3" />
	    		</div>
	    	</section>
	    	<?php endif; ?>
	    	
	    	<div class="gkPage">
	    		<?php if($this->API->modules('breadcrumb')) : ?>
	    		<div id="gkBreadcrumb">
	    			<div class="gkPage">
	    				<jdoc:include type="modules" name="breadcrumb" style="none" />
	    			</div>
	    		</div>
	    		<?php endif; ?>
	    	
	    		<div<?php if($this->API->modules('sidebar')) : ?> data-sidebar-pos="<?php echo $this->API->get('sidebar_position', 'right'); ?>"<?php endif; ?>>
			    	<div id="gkContent">					
						<div id="gkContentWrap"<?php if($this->API->modules('inset')) : ?> data-inset-pos="<?php echo $this->API->get('inset_position', 'right'); ?>"<?php endif; ?>>
							<?php if($this->API->modules('mainbody_top')) : ?>
							<section id="gkMainbodyTop">
								<div<?php if(isset($this->module_ids['mainbody_top'])) echo ' id="'.$this->module_ids['mainbody_top'].'"'; ?>>
									<jdoc:include type="modules" name="mainbody_top" style="gk_style" />
								</div>
							</section>
							<?php endif; ?>	
							
							<section id="gkMainbody">
								<div<?php if(isset($this->module_ids['mainbody'])) echo ' id="'.$this->module_ids['mainbody'].'"'; ?>>
								<?php if(($this->layout->isFrontpage() && !$this->API->modules('mainbody')) || !$this->layout->isFrontpage()) : ?>
									<jdoc:include type="component" />
								<?php else : ?>
									<jdoc:include type="modules" name="mainbody" style="gk_style" />
								<?php endif; ?>
								</div>
							</section>
							
							<?php if($this->API->modules('mainbody_bottom')) : ?>
							<section id="gkMainbodyBottom">
								<div<?php if(isset($this->module_ids['mainbody_bottom'])) echo ' id="'.$this->module_ids['mainbody_bottom'].'"'; ?>>
									<jdoc:include type="modules" name="mainbody_bottom" style="gk_style" />
								</div>
							</section>
							<?php endif; ?>
						</div>
						
						<?php if($this->API->modules('inset')) : ?>
		                <aside id="gkInset" class="dark-area">
		                    <jdoc:include type="modules" name="inset" style="gk_style" />
		                </aside>
		                <?php endif; ?>
			    	</div>
			    	
			    	<?php if($this->API->modules('sidebar')) : ?>
			    	<aside id="gkSidebar">
			    		<div>
			    			<jdoc:include type="modules" name="sidebar" style="gk_style" />
			    		</div>
			    	</aside>
			    	<?php endif; ?>
		    	</div>
			</div>
		</div>
		
		<?php if($this->API->modules('bottom1')) : ?>
		<section id="gkBottom1"<?php if($this->API->modules('bottom1') == 1) : ?> class="gkSingleModule"<?php endif; ?>>
			<div class="gkCols6 gkPage"<?php if(isset($this->module_ids['bottom1'])) echo ' id="'.$this->module_ids['bottom1'].'"'; ?>>
				<jdoc:include type="modules" name="bottom1" style="gk_style" modnum="<?php echo $this->API->modules('bottom1'); ?>" />
			</div>
		</section>
		<?php endif; ?>
	    
	    <?php if($this->API->modules('bottom2')) : ?>
	    <section id="gkBottom2"<?php if($this->API->modules('bottom2') == 1) : ?> class="gkSingleModule"<?php endif; ?>>
	    	<div class="gkCols6 gkPage"<?php if(isset($this->module_ids['bottom2'])) echo ' id="'.$this->module_ids['bottom2'].'"'; ?>>
	    		<jdoc:include type="modules" name="bottom2" style="gk_style" modnum="<?php echo $this->API->modules('bottom2'); ?>" />
	    	</div>
	    </section>
	    <?php endif; ?>
	    
	    <?php if($this->API->modules('bottom3')) : ?>
	    <section id="gkBottom3"<?php if($this->API->modules('bottom3') == 1) : ?> class="gkSingleModule"<?php endif; ?>>
	    	<div class="gkCols6 gkPage"<?php if(isset($this->module_ids['bottom3'])) echo ' id="'.$this->module_ids['bottom3'].'"'; ?>>
	    		<jdoc:include type="modules" name="bottom3" style="gk_style" modnum="<?php echo $this->API->modules('bottom3'); ?>" />
	    	</div>
	    </section>
	    <?php endif; ?>
	    
	    <?php if($this->API->modules('bottom4')) : ?>
	    <section id="gkBottom4"<?php if($this->API->modules('bottom4') == 1) : ?> class="gkSingleModule"<?php endif; ?>>
	    	<div class="gkCols6 gkPage"<?php if(isset($this->module_ids['bottom4'])) echo ' id="'.$this->module_ids['bottom4'].'"'; ?>>
	    		<jdoc:include type="modules" name="bottom4" style="gk_style" modnum="<?php echo $this->API->modules('bottom4'); ?>" />
	    	</div>
	    </section>
	    <?php endif; ?>
	    
	    <?php if($this->API->modules('bottom5')) : ?>
	    <section id="gkBottom5"<?php if($this->API->modules('bottom5') == 1) : ?> class="gkSingleModule"<?php endif; ?>>
	    	<div class="gkCols6 gkPage"<?php if(isset($this->module_ids['bottom5'])) echo ' id="'.$this->module_ids['bottom5'].'"'; ?>>
	    		<jdoc:include type="modules" name="bottom5" style="gk_style" modnum="<?php echo $this->API->modules('bottom5'); ?>" />
	    	</div>
	    </section>
	    <?php endif; ?>
	    

    </div>
    
    <?php $this->layout->loadBlock('footer'); ?>
   	<?php $this->layout->loadBlock('social'); ?>
   	<?php $this->layout->loadBlock('tools/login'); ?>
   		
   	<i id="close-menu" class="fa fa-times"></i>
   	<nav id="aside-menu">
   		<div>
   			<?php
   				$this->asidemenu->loadMenu($this->API->get('menu_name','mainmenu')); 
   		    	$this->asidemenu->genMenu($this->API->get('startlevel', 0), $this->API->get('endlevel',-1));
   			?>
   		</div>
   	</nav>	
   		
	<script>
		if(window.getSize().x > 600) {
			document.getElements('.agenda .gkTabsItem').each(function(tab, i) {
				tab.getElements('.nspArt').each(function(art, i) {
					art.setProperty('data-scroll-reveal', 'enter top and wait '+(i * 0.25)+'s').addClass('scroll-revealed');
				});
			});
			
			window.scrollReveal = new scrollReveal();
		}
	</script>
	
	<jdoc:include type="modules" name="debug" />

	<script>
	jQuery(document).ready(function(){
   		// Target your .container, .wrapper, .post, etc.
   		jQuery("body").fitVids();
	});
	</script>
</body>
</html>