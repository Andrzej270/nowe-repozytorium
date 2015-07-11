<?php
trait eliksir{
private $poziom;
	
private $osoba;

public function __construct($poziom,$osoba){
		$this->poziom=$poziom;
		$this->osoba=$osoba;
	}
	
	abstract public function dzialanie();
}
?>
