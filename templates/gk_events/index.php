<?php

/**
 *
 * Main file
 *
 * @version             3.0.0
 * @package             Gavern Framework
 * @copyright			Copyright (C) 2010 - 2012 GavickPro. All rights reserved.
 *               
 */
 
// No direct access.
defined('_JEXEC') or die;
if(!defined('DS')){ define('DS',DIRECTORY_SEPARATOR); }

// enable showing errors in PHP
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_WARNING & ~E_STRICT);
ini_set('display_errors','On');
// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');
// include framework classes and files
require_once('lib/gk.framework.php');
// run the framework
$tpl = new GKTemplate($this, $GK_TEMPLATE_MODULE_STYLES);

// EOF