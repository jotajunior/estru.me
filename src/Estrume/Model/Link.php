<?php
namespace Estrume\Model;

use Estrume\Library as Library;
use Estrume\Config as Config;

class Link
{
	public $url;
	public $id;
	public $db;
	
	public function __construct()
	{
		$this->db = new Library\Connection();
		$chars = array( "0", "1", "2", "3", "4", "5", "6", "7", "8", "9",
						"a", "b", "c", "d", "e", "f", "g", "h", "i", "j",
						"k", "l", "m", "n", "o", "p", "q", "r","s", "t", 
						"u", "v", "w", "x", "y", "z", "A", "B", "C", "D",
						"E", "F", "G", "H", "I", "J", "K", "L", "M", "N",
						"O", "P", "Q", "R", "S", "T", "U", "V", "W", "X",
						"Y", "Z"
					);
						
		Library\Shortener::characters( $chars );
		$this->shortener = new Library\Shortener();
	}

	private function getUrlById($id)
	{
		$sql = "SELECT `url` FROM Links WHERE id = :id";
		
		$sth = $this->db->prepare($sql);
		$sth->bindParam(":id", $id, PDO::PARAM_INT);
		
		if ($sth->execute()) {
			$row = $sth->fetch(PDO::FETCH_ASSOC);
			if (isset($row['url'])) {
				return $row['url'];
			}
		}

		return false;
	}
	
	public function getOriginal($code)
	{
		$id = $this->shortener->code($code)->convert();
		return $this->getUrlById($id);
	}
	
	public function shortLink($url)
	{
		$url = $this->filterUrl($url);
		$id = $this->saveUrl($url);
		
		if($id) {
			$code = $this->shortener->int($id)->convert();
			return Config\Url::base.$code;
		} else {
			throw new Exception("We couldn't save your link. Sorry.");
			return false;
		}
	}

	private function filterUrl($url)
	{
		$filtered_url = filter_var($url, FILTER_VALIDATE_URL);
		
		if ($filtered_url === false) {
			throw new Exception("Invalid url.");
			return false;
		}
		
		return $filtered_url;
	}
	
	private function saveUrl($url)
	{
		$sql = "INSERT INTO `Links`(url) VALUES (:url)";
		$sth = $this->db->prepare($sql);
		$sth->bindParam(":url", $url, PDO::PARAM_STR);
		
		if ($sth->execute()) {
			return $sth->lastInsertId();
		}
		
		return false;
	}
}