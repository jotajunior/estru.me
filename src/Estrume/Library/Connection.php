<?php
namespace Estrume\Library;

use Estrume\Config as Config;

class Connection extends \PDO
{
	public static $handle = null;

	public function __construct()
	{
		try {
			if ( self::$handle == null ) {
				$dsn = Config\Database::provider;
				$dsn .= ":dbname=".Config\Database::dbname;
				$dsn .= ";host=".Config\Database::host;

				$dbh = parent::__construct( $dsn, Config\Database::user, Config\Database::password );
				self::$handle = $dbh;

				return self::$handle;
			}
		} catch ( \PDOException $e ) {
			echo 'Connection failed: ' . $e->getMessage();
			return false;
		}
	}

	public function __destruct()
	{
		self::$handle = null;
	}
}