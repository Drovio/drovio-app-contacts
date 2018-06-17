<?php
//#section#[header]
// Use Important Headers
use \API\Platform\importer;
use \API\Platform\engine;
use \Exception;

// Check Platform Existance
if (!defined('_RB_PLATFORM_')) throw new Exception("Platform is not defined!");

// Import DOM, HTML
importer::import("UI", "Html", "DOM");
importer::import("UI", "Html", "HTML");

use \UI\Html\DOM;
use \UI\Html\HTML;

// Import application for initialization
importer::import("AEL", "Platform", "application");
use \AEL\Platform\application;

// Increase application's view loading depth
application::incLoadingDepth();

// Set Application ID
$appID = 82;

// Init Application and Application literal
application::init(82);
// Secure Importer
importer::secure(TRUE);

// Import SDK Packages
importer::import("UI", "Apps");

// Import APP Packages
//#section_end#
//#section#[view]
use UI\Apps\APPContent;

$appContent = new APPContent();
$actionFactory = $appContent->getActionFactory();
$appContent->build('tc-secondary-view', 'tc-secondary-view', TRUE);

// [Debug]
$b = engine::getVar('b');
$bEl = HTML::p('b = ' . $b);

$c = engine::getVar('c');
$cEl = HTML::p('c = ' . $c);

$debug = HTML::select('#tc-debug')->item(0);
HTML::append($debug, $bEl);
HTML::append($debug, $cEl);
// [/Debug]

$inner = HTML::select('#tc-secondary-view-inner')->item(0);
$actionFactory->setAction($inner, 'SecondaryView', '#tc-secondary-view-container', array('b' => 2, 'c' => 2));

return $appContent->getReport('#tc-secondary-view-container', APPContent::REPLACE_METHOD);
//#section_end#
?>