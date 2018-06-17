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
application::import("Main");
//#section_end#
//#section#[view]
use \UI\Apps\APPContent;

$appContent = new APPContent();
$actionFactory = $appContent->getActionFactory();

$appContent->build("test-messaging-application", "test-messaging-application", TRUE);


$startButton = HTML::select(".test-messaging-application .start-button")->item(0);
$actionFactory->setAction($startButton, "contacts/index");

return $appContent->getReport();
//#section_end#
?>