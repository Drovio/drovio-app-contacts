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
use \APP\Main\ContactsManager;

$appContent = new APPContent();
$actionFactory = $appContent->getActionFactory();
$appContent->build("", "", TRUE);

$contactsManager = new ContactsManager();
$contacts = $contactsManager->getContacts();
$contacts = empty($contacts) ? array() : $contacts;

//$listEl = HTML::select("#contacts-list");
////$listEl->clear();
//foreach ($contacts as $contact) {
//	$nameEl = HTML::create("span", $contact["name"], "", "contact-name");
//	$listItemEl = HTML::create('li', "", "", "contacts-list-item");
//	HTML::append($listItemEl, $nameEl);
//	HTML::append($listEl, $listItemEl);
//}

return $appContent->getReport(".test-messaging-application .contacts-list-placeholder", APPContent::REPLACE_METHOD);
//#section_end#
?>