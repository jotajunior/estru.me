<?php
namespace Estrume\Model;

use Estrume\Library as Library;

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
                $sth->bindParam(":id", $id, \PDO::PARAM_INT);

				$sth->execute() or throw new \Exception("We couldn't fetch your link.");

                $row = $sth->fetch(\PDO::FETCH_ASSOC);

                if (isset($row['url']))
                	return $row['url'];
        }

        public function getOriginal($code)
        {
                $id = $this->shortener->code($code)->convert();
                return $this->getUrlById($id);
        }

        public function shorten($url)
        {
                $url = $this->filterUrl($url);
                $id = $this->saveUrl($url);

		        return $this->shortener->int($id)->convert();
        }

        private function startsWithHttp($url)
        {
                return substr($url, 0, 7) === "http://";
        }

        private function startsWithHttps($url)
        {
                return substr($url, 0, 8) === "https://";
        }

        private function checkForUrlScheme($url)
        {
                if (!$this->startsWithHttp($url) && !$this->startsWithHttps($url))
                        $url = "http://".$url;

                return $url;
        }

        private function itsMine($url)
        {
                $parsed_url = parse_url($url);

                return $parsed_url['host'] == "estru.me";
        }

		private function removeTags($url)
		{
			return htmlspecialchars(strip_tags(trim(strtolower($url))), ENT_QUOTES, 'UTF-8');
		}

        private function filterUrl($url)
        {
        		$url = $this->removeTags($url);
                $url = $this->checkForUrlScheme($url);
                $filtered_url = filter_var($url, FILTER_VALIDATE_URL);

                if ($filtered_url === false || $this->itsMine($url))
                        throw new \Exception("Invalid url.");

                return $filtered_url;
        }

        public function checkForHits($ip)
        {
                $number_of_hits = apc_fetch($ip);

                if ($number_of_hits === false) {
                        apc_store($ip, 1, 3600);
                        $to_compare = 1;
                } else {
                        apc_inc($ip);
                        $to_compare = $number_of_hits + 1;
                }

                if ($to_compare >= 1000)
                        throw new \Exception("You already shorted too many links.");
        }

        private function saveUrl($url)
        {
                $sql = "INSERT INTO `Links`(url) VALUES (:url)";
                $sth = $this->db->prepare($sql);
                $sth->bindParam(":url", $url, \PDO::PARAM_STR);

				$sth->execute() or throw new \Exception("We couldn't save your url. Sorry.");

                return $this->db->lastInsertId();
        }
}