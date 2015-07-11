<?php
class eliksirszybkosc{
	use eliksir;
	private $czas;
	
	public function dzialanie(){
	  $zycie=$this->osoba->getzycie()-$this->poziom;
	  $this->osoba->setzycie($zycie);
	  $szybkosc=$this->osoba->getszybkosc()+$this->poziom;
	  $this->osoba->setszybkosc($szybkosc);
	  $this->czas==$this->osoba->getturn()+3;
	}
	
	public function czydziala(){
		if($this->czas==$this->osoba->getturn()){
		  $szybkosc=$this->osoba->getszybkosc()-$this->poziom;
		  $this->osoba->setszybkosc($szybkosc);
		  
		  }
		
	}
}
?>
