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
importer::import("UI", "Content");

// Import APP Packages
//#section_end#
//#section#[view]
use \UI\Apps\APPContent;

$appContent = new APPContent();
$actionFactory = $appContent->getActionFactory();

$appContent->build("", "", TRUE);

$contactId = engine::getVar("contact_id");
//$contactIdEl = HTML::select(".test-messaging-application .chat-contact");
//HTML::innerHtml($contactIdEl, $contactId);
$appContent->addReportAction('test_messaging.chat');

return $appContent->getReport();
//#section_end#
?>