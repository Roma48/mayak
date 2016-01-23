<?php

/**
 * @package		K2
 * @author		GavickPro http://gavick.com
 */

// no direct access
defined('_JEXEC') or die;

// Code used to generate the page elements
$params = $this->item->params;
$k2ContainerClasses = (($this->item->featured) ? ' itemIsFeatured' : '') . ($params->get('pageclass_sfx')) ? ' '.$params->get('pageclass_sfx') : ''; 

$app        = JFactory::getApplication();
$template   = $app->getTemplate(true);
$gkparams     = $template->params;
$fblang   = $gkparams->get('fb_lang', 'en_US');

?>
<?php if(JRequest::getInt('print')==1): ?>

<a class="itemPrintThisPage" rel="nofollow" href="#" onclick="window.print(); return false;"> <?php echo JText::_('K2_PRINT_THIS_PAGE'); ?> </a>
<?php endif; ?>
<article id="k2Container" class="events<?php echo $k2ContainerClasses; ?>"> <?php echo $this->item->event->BeforeDisplay; ?> <?php echo $this->item->event->K2BeforeDisplay; ?>
          <header>
                    <?php if(isset($this->item->editLink)): ?>
                    <a class="itemEditLink modal" rel="{handler:'iframe',size:{x:990,y:550}}" href="<?php echo $this->item->editLink; ?>"><?php echo JText::_('K2_EDIT_ITEM'); ?></a>
                    <?php endif; ?>
                    <?php if($params->get('itemTitle')): ?>
                    <h1> <?php echo $this->item->title; ?>
                              <?php if($params->get('itemFeaturedNotice') && $this->item->featured): ?>
                              <small><?php echo JText::_('K2_FEATURED'); ?></small>
                              <?php endif; ?>
                    </h1>
                    <?php endif; ?>
                    <?php if($params->get('itemTwitterButton',1) || $params->get('itemFacebookButton',1) || $params->get('itemGooglePlusOneButton',1)): ?>
                    <div class="itemSocialSharing">
                              <?php if($params->get('itemTwitterButton',1)): ?>
                              <div class="itemTwitterButton"> <a href="https://twitter.com/share" class="twitter-share-button" data-count="vertical"<?php if($params->get('twitterUsername')): ?> data-via="<?php echo $params->get('twitterUsername'); ?>"<?php endif; ?>><?php echo JText::_('K2_TWEET'); ?></a> 
                                        <script type="text/javascript" src="//platform.twitter.com/widgets.js"></script> 
                              </div>
                              <?php endif; ?>
                              <?php if($params->get('itemFacebookButton',1)): ?>
                              <div class="itemFacebookButton"> 
                                        <script type="text/javascript">                                                         
                      window.addEvent('load', function(){
                			(function(){
                            	if(document.id('fb-auth') == null) {
                            		var root = document.createElement('div');
                            		root.id = 'fb-root';
                            		$$('.itemFacebookButton')[0].appendChild(root);
                            			(function(d, s, id) {
                              			var js, fjs = d.getElementsByTagName(s)[0];
                              			if (d.getElementById(id)) {return;}
                              			js = d.createElement(s); js.id = id;
                              			js.src = document.location.protocol + "//connect.facebook.net/<?php echo $fblang; ?>/all.js#xfbml=1";
                              			fjs.parentNode.insertBefore(js, fjs);
                            			}(document, 'script', 'facebook-jssdk')); 
                        			}
                      		}());
                  		});
                		</script>
                                        <div class="fb-like" data-width="150" data-layout="box_count" data-action="like" data-show-faces="false"></div>
                              </div>
                              <?php endif; ?>
                              <?php if($params->get('itemGooglePlusOneButton',1)): ?>
                              <div class="itemGooglePlusOneButton">
                                        <div class="g-plusone" data-size="tall"></div>
                                        <script type="text/javascript">                              
                        window.___gcfg = {lang: 'pl'};
                      
                        (function() {
                          var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                          po.src = 'https://apis.google.com/js/platform.js';
                          var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                        })();
                    </script> 
                              </div>
                              <?php endif; ?>
                    </div>
                    <?php endif; ?>
          </header>
          <?php echo $this->item->event->AfterDisplayTitle; ?> <?php echo $this->item->event->K2AfterDisplayTitle; ?>
          <?php if(
			(
				$this->item->params->get('itemExtraFields') && 
				count($this->item->extra_fields)
			) ||
			$params->get('itemCategory')
		): ?>
          <div class="eventslist-date">
                    <?php if($this->item->params->get('itemExtraFields') && count($this->item->extra_fields)): ?>
                    <?php foreach ($this->item->extra_fields as $key=>$extraField): ?>
                    <?php if($extraField->alias == 'eventhours'): ?>
                    <span><?php echo $extraField->value; ?></span>
                    <?php endif; ?>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    <?php if($params->get('itemCategory')): ?>
                    <a href="<?php echo $this->item->category->link; ?>"><?php echo $this->item->category->name; ?></a>
                    <?php endif; ?>
          </div>
          <?php endif; ?>
          <div class="events-content">
                    <?php if($params->get('itemImage') && !empty($this->item->image)): ?>
                    <div> <a class="itemImage modal" rel="{handler: 'image'}" href="<?php echo $this->item->imageXLarge; ?>" title="<?php echo JText::_('K2_CLICK_TO_PREVIEW_IMAGE'); ?>"> <img src="<?php echo $this->item->image; ?>" alt="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>"  /> </a>
                              <?php if($params->get('itemImageMainCredits') && !empty($this->item->image_credits)): ?>
                              <span class="itemImageCredits"><?php echo $this->item->image_credits; ?></span>
                              <?php endif; ?>
                              <?php if($params->get('itemImageMainCaption') && !empty($this->item->image_caption)): ?>
                              <span class="itemImageCaption"><?php echo $this->item->image_caption; ?></span>
                              <?php endif; ?>
                    </div>
                    <?php endif; ?>
                    <div class="itemBody"> <?php echo $this->item->event->BeforeDisplayContent; ?> <?php echo $this->item->event->K2BeforeDisplayContent; ?>
                              <?php if(!empty($this->item->fulltext)): ?>
                              <?php if($params->get('itemIntroText')): ?>
                              <div class="itemIntroText"> <?php echo $this->item->introtext; ?> </div>
                              <?php endif; ?>
                              <?php endif; ?>
                              <?php if($params->get('itemFullText')): ?>
                              <div class="itemFullText"> <?php echo (!empty($this->item->fulltext)) ? $this->item->fulltext : $this->item->introtext; ?> </div>
                              <?php endif; ?>
                              <?php if($params->get('itemVideo') && !empty($this->item->video)): ?>
                              <div class="itemVideoBlock" id="itemVideoAnchor">
                                        <h3><?php echo JText::_('K2_MEDIA'); ?></h3>
                                        <?php if($this->item->videoType=='embedded'): ?>
                                        <div class="itemVideoEmbedded"> <?php echo $this->item->video; ?> </div>
                                        <?php else: ?>
                                        <span class="itemVideo"><?php echo $this->item->video; ?></span>
                                        <?php endif; ?>
                                        <?php if($params->get('itemVideoCaption') && !empty($this->item->video_caption)): ?>
                                        <span class="itemVideoCaption"><?php echo $this->item->video_caption; ?></span>
                                        <?php endif; ?>
                                        <?php if($params->get('itemVideoCredits') && !empty($this->item->video_credits)): ?>
                                        <span class="itemVideoCredits"><?php echo $this->item->video_credits; ?></span>
                                        <?php endif; ?>
                              </div>
                              <?php endif; ?>
                              <?php if($params->get('itemImageGallery') && !empty($this->item->gallery)): ?>
                              <div class="itemImageGallery" id="itemImageGalleryAnchor">
                                        <h3><?php echo JText::_('K2_IMAGE_GALLERY'); ?></h3>
                                        <?php echo $this->item->gallery; ?> </div>
                              <?php endif; ?>
                              <?php echo $this->item->event->AfterDisplayContent; ?> <?php echo $this->item->event->K2AfterDisplayContent; ?>
                              <?php if(
									$params->get('itemTags') ||
									$params->get('itemAttachments')
								): ?>
                              <div class="itemLinks">
                                        <?php if($params->get('itemAttachments') && count($this->item->attachments)): ?>
                                        <div class="itemAttachmentsBlock"> <span><?php echo JText::_('K2_DOWNLOAD_ATTACHMENTS'); ?></span>
                                                  <ul class="itemAttachments">
                                                            <?php foreach ($this->item->attachments as $attachment): ?>
                                                            <li> <a title="<?php echo K2HelperUtilities::cleanHtml($attachment->titleAttribute); ?>" href="<?php echo $attachment->link; ?>"><?php echo $attachment->title; ?>
                                                                      <?php if($params->get('itemAttachmentsCounter')): ?>
                                                                      <span>(<?php echo $attachment->hits; ?> <?php echo ($attachment->hits==1) ? JText::_('K2_DOWNLOAD') : JText::_('K2_DOWNLOADS'); ?>)</span>
                                                                      <?php endif; ?>
                                                                      </a> </li>
                                                            <?php endforeach; ?>
                                                  </ul>
                                        </div>
                                        <?php endif; ?>
                                        <?php if($params->get('itemTags') && count($this->item->tags)): ?>
                                        <div class="itemTagsBlock"> <strong><?php echo JText::_('K2_TAGGED_UNDER'); ?></strong>
                                                  <ul class="itemTags">
                                                            <?php foreach ($this->item->tags as $tag): ?>
                                                            <li> <a href="<?php echo $tag->link; ?>"><?php echo $tag->name; ?></a> </li>
                                                            <?php endforeach; ?>
                                                  </ul>
                                        </div>
                                        <?php endif; ?>
                              </div>
                              <?php endif; ?>
                              <?php if($params->get('itemRelated') && isset($this->relatedItems)): ?>
                              <div class="itemAuthorContent">
                                <h3><?php echo JText::_("K2_RELATED_ITEMS_BY_TAG"); ?></h3>
                                <ul data-cols="<?php echo count($this->relatedItems); ?>">
                                  <?php foreach($this->relatedItems as $key=>$item): ?>
                                  <li class="<?php echo ($key%2) ? "odd" : "even"; ?>"> 
                                  	<?php if($this->item->params->get('itemRelatedImageSize')): ?>
                                  	<a class="itemRelTitle" href="<?php echo $item->link ?>"><img style="width:<?php echo $item->imageWidth; ?>px;height:auto;" class="itemRelImg" src="<?php echo $item->image; ?>" alt="<?php K2HelperUtilities::cleanHtml($item->title); ?>" /></a>
                                  	<?php endif; ?>
                                  	<a class="itemRelTitle" href="<?php echo $item->link ?>"><?php echo $item->title; ?></a> 
                                  </li>
                                  <?php endforeach; ?>
                                </ul>
                              </div>
                              <?php endif; ?>
                              <?php if($params->get('itemNavigation') && !JRequest::getCmd('print') && (isset($this->item->nextLink) || isset($this->item->previousLink))): ?>
                              <div class="itemNavigation"> <span><?php echo JText::_('K2_MORE_IN_THIS_CATEGORY'); ?></span>
                                        <?php if(isset($this->item->previousLink)): ?>
                                        <a class="itemPrevious" href="<?php echo $this->item->previousLink; ?>">&laquo; <?php echo $this->item->previousTitle; ?></a>
                                        <?php endif; ?>
                                        <?php if(isset($this->item->nextLink)): ?>
                                        <a class="itemNext" href="<?php echo $this->item->nextLink; ?>"><?php echo $this->item->nextTitle; ?> &raquo;</a>
                                        <?php endif; ?>
                              </div>
                              <?php endif; ?>
                              <?php echo $this->item->event->AfterDisplay; ?> <?php echo $this->item->event->K2AfterDisplay; ?> </div>
                    <?php if($params->get('itemComments') && ( ($params->get('comments') == '2' && !$this->user->guest) || ($params->get('comments') == '1'))):?>
                    <?php echo $this->item->event->K2CommentsBlock; ?>
                    <?php endif;?>
                    <?php if($params->get('itemComments') && !JRequest::getInt('print') && ($params->get('comments') == '1' || ($params->get('comments') == '2')) && empty($this->item->event->K2CommentsBlock)):?>
                    <div class="itemComments" id="itemCommentsAnchor">
                              <?php if($params->get('commentsFormPosition')=='above' && $params->get('itemComments') && !JRequest::getInt('print') && ($params->get('comments') == '1' || ($params->get('comments') == '2' && K2HelperPermissions::canAddComment($this->item->catid)))): ?>
                              <div class="itemCommentsForm"> <?php echo $this->loadTemplate('comments_form'); ?> </div>
                              <?php endif; ?>
                              <?php if($this->item->numOfComments>0 && $params->get('itemComments') && !JRequest::getInt('print') && ($params->get('comments') == '1' || ($params->get('comments') == '2'))): ?>
                              <h3> <?php echo $this->item->numOfComments; ?> <?php echo ($this->item->numOfComments>1) ? JText::_('K2_COMMENTS') : JText::_('K2_COMMENT'); ?> </h3>
                              <ul class="itemCommentsList">
                                        <?php foreach ($this->item->comments as $key=>$comment): ?>
                                        <li class="<?php echo ($key%2) ? "odd" : "even"; echo (!$this->item->created_by_alias && $comment->userID==$this->item->created_by) ? " authorResponse" : ""; echo($comment->published) ? '':' unpublishedComment'; ?>">
                                                  <?php if($comment->userImage):?>
                                                  <img src="<?php echo $comment->userImage; ?>" alt="<?php echo JFilterOutput::cleanText($comment->userName); ?>" width="<?php echo $params->get('commenterImgWidth'); ?>" />
                                                  <?php endif; ?>
                                                  <div> <span>
                                                            <?php if(!empty($comment->userLink)): ?>
                                                            <a href="<?php echo JFilterOutput::cleanText($comment->userLink); ?>" title="<?php echo JFilterOutput::cleanText($comment->userName); ?>" target="_blank" rel="nofollow"> <?php echo $comment->userName; ?> </a>
                                                            <?php else: ?>
                                                            <?php echo $comment->userName; ?>
                                                            <?php endif; ?>
                                                            </span> <span> <?php echo JHTML::_('date', $comment->commentDate, JText::_('DATE_FORMAT_LC2')); ?> </span> <span> <a class="commentLink" href="<?php echo $this->item->link; ?>#comment<?php echo $comment->id; ?>" name="comment<?php echo $comment->id; ?>" id="comment<?php echo $comment->id; ?>"> <?php echo JText::_('K2_COMMENT_LINK'); ?> </a> </span>
                                                            <?php if($this->inlineCommentsModeration || ($comment->published && ($this->params->get('commentsReporting')=='1' || ($this->params->get('commentsReporting')=='2' && !$this->user->guest)))): ?>
                                                            <span class="commentToolbar">
                                                            <?php if($this->inlineCommentsModeration): ?>
                                                            <?php if(!$comment->published): ?>
                                                            <a class="commentApproveLink" href="<?php echo JRoute::_('index.php?option=com_k2&view=comments&task=publish&commentID='.$comment->id.'&format=raw')?>"><?php echo JText::_('K2_APPROVE')?></a>
                                                            <?php endif;?>
                                                            <a class="commentRemoveLink" href="<?php echo JRoute::_('index.php?option=com_k2&view=comments&task=remove&commentID='.$comment->id.'&format=raw')?>"><?php echo JText::_('K2_REMOVE')?></a>
                                                            <?php endif;?>
                                                            <?php if($comment->published && ($this->params->get('commentsReporting')=='1' || ($this->params->get('commentsReporting')=='2' && !$this->user->guest))): ?>
                                                            <a class="commentReportLink modal" rel="{handler:'iframe',size:{x:640,y:480}}" href="<?php echo JRoute::_('index.php?option=com_k2&view=comments&task=report&commentID='.$comment->id)?>"><?php echo JText::_('K2_REPORT')?></a>
                                                            <?php endif; ?>
                                                            </span>
                                                            <?php endif; ?>
                                                            <p><?php echo $comment->commentText; ?></p>
                                                  </div>
                                        </li>
                                        <?php endforeach; ?>
                              </ul>
                              <div> <?php echo $this->pagination->getPagesLinks(); ?> </div>
                              <?php endif; ?>
                              <?php if($params->get('commentsFormPosition')=='below' && $params->get('itemComments') && !JRequest::getInt('print') && ($params->get('comments') == '1' || ($params->get('comments') == '2' && K2HelperPermissions::canAddComment($this->item->catid)))): ?>
                              <h3> <?php echo JText::_('K2_LEAVE_A_COMMENT') ?> </h3>
                              <div class="itemCommentsForm"> <?php echo $this->loadTemplate('comments_form'); ?> </div>
                              <?php endif; ?>
                              <?php $user = JFactory::getUser(); if ($params->get('comments') == '2' && $user->guest):?>
                              <div> <?php echo JText::_('K2_LOGIN_TO_POST_COMMENTS');?> </div>
                              <?php endif; ?>
                    </div>
                    <?php endif; ?>
          </div>
          <?php 
     	$event_button = '';
     	$event_venue = '';
     	$event_speaker = '';
     	
     	if($this->item->params->get('itemExtraFields') && count($this->item->extra_fields)) {
     		foreach ($this->item->extra_fields as $key=>$extraField) {
     			if($extraField->alias == 'eventeventbrite') {
     				$event_button = $extraField->value;
     			}
     			
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
     			$event_button != '' ||
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
                    <?php if($event_button != '') : ?>
                    <?php echo $event_button; ?>
                    <?php endif; ?>
          </div>
          <?php endif; ?>
</article>
