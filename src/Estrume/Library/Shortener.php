<?php
namespace Estrume\Library;

class Shortener
{
	public static $chars;
	public static $c;
	public $int;
	public $code;
	public $lastModified;

	public static function characters( $chars )
	{
		self::$chars = array_unique( $chars );
		self::$c = count( self::$chars );
	}

	public function __set( $var, $val )
	{
		switch ( $var ) {
			case "int":
				$this->int( $val );
				break;
			case "code":
				$this->code( $val );
				break;
		}
	}

	public function int( $num )
	{
		settype( $num, 'int' );
		$this->int = $num;
		$this->lastModified = 'int';

		return $this;
	}
	
	public function code( $code )
	{
		$this->code = $code;
		$this->lastModified = 'code';

		return $this;
	}
	
	private function getNumberSequence( $num, $c )
	{
		$new_code = array();
		
		while ( $num != 0 ) {
			$new_code[] = $num % $c;
			$num = intval( $num / $c );
		}
		
		return array_reverse( $new_code );
	}
	
	private function numberSequenceToCode( $sequence, $chars )
	{
		$code_sequence = array();
		

		foreach ( $sequence as $number ) {
			$code_sequence[] = $chars[ $number ];
		}
		
		return $code_sequence;
	}
	
	private function intToCode()
	{
		$num = &$this->int;
		$c = &self::$c;
		$chars = &self::$chars;
		
		$sequence = $this->getNumberSequence( $num, $c );

		$this->code = $this->numberSequenceToCode( $sequence, $chars );

		return implode( $this->code );
	}
	
	private function getCodeNumberSequence( $code, $chars )
	{
		$sequence = array();
		

		foreach ( $code as $item ) {
			$item = (string) $item;
			$key = array_search( $item, $chars, true );
			
			if ($key === false)
				return false;
			
			$sequence[] = $key;
		}
		
		return $sequence;
	}
	
	private function codeSequenceToInt( $sequence, $c )
	{
		$sum = 0;
		$sequence_counter = count( $sequence );

		for ( $i = 0; $i < $sequence_counter; $i++ ) {
			$exponent = $sequence_counter - 1 - $i;
			$sum += $sequence[$i]*pow( $c, $exponent );
		}
		
		return $sum;
	}
	
	private function codeToInt()
	{
		$code = str_split( $this->code );
		$chars = &self::$chars;
		$c = &self::$c;
		
		$sequence = $this->getCodeNumberSequence( $code, $chars );
		
		$this->int = $this->codeSequenceToInt( $sequence, $c );

		return $this->int;
	}
	
	public function convert()
	{
		switch ( $this->lastModified ) {
			case 'int':
				return $this->intToCode();
				break;
			case 'code':
				return $this->codeToInt();
				break;
			default:
				throw new \Exception("You must set a code or int to convert first.");
				break;
		}
	}
}