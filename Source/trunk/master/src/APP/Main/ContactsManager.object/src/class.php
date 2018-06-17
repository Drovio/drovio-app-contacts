<?php
//#section#[header]
// Namespace
namespace APP\Main;

require_once($_SERVER['DOCUMENT_ROOT'].'/_domainConfig.php');

// Use Important Headers
use \API\Platform\importer;
use \Exception;

// Check Platform Existance
if (!defined('_RB_PLATFORM_')) throw new Exception("Platform is not defined!");

// Import application loader
importer::import("AEL", "Platform", "application");
use \AEL\Platform\application;
//#section_end#
//#section#[class]
/**
 * @library	APP
 * @package	Main
 * 
 * @copyright	Copyright (C) 2015 [test] Messaging. All rights reserved.
 */

application::import("Main", "DatabaseConnectionBuilder");

use APP\Main\DatabaseConnectionBuilder;

/**
 * Retrieves the contacts of a user.
 * 
 * {description}
 * 
 * @version	0.1-1
 * @created	August 25, 2015, 17:16 (EEST)
 * @updated	August 25, 2015, 17:16 (EEST)
 */
class ContactsManager
{
	private static $DB_TABLE_CONTACTS = 'test_contacts';

	private $databaseConnectionBuilder;

	/**
	 * {description}
	 * 
	 * @return	void
	 */
	public function __construct(DatabaseConnectionBuilder $dbConnBuilder)
	{
		$this->databaseConnectionBuilder = $dbConnBuilder;
	}
	
	public function getContacts() {
		$dbc = $this->databaseConnectionBuilder->getConnection();
		$query = "SELECT *"
			. " FROM " . static::$DB_TABLE_CONTACTS
			. " ORDER BY id ASC";
		$result = $dbc->execute($query);
		
		return $dbc->fetch($result, true);
	}
}
//#section_end#
?>