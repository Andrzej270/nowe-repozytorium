<?php
class eliksirsila{
	use eliksir;
	private $czas;
	public function dzialanie(){
      $zycie=$this->osoba->getzycie()-$this->poziom;
	  $this->osoba->setzycie($zycie);
	  $sila=$this->osoba->getsila()+$this->poziom;
	  $this->osoba->setsila($sila);
	  $this->czas=$this->osoba->getturn()+3;
		
	}
	public function czydziala(){
		if($this->czas==$this->osoba->getturn()){
		  $sila=$this->osoba->getsila()-$this->poziom;
		  $this->osoba->setsila($sila);
		  
		  }
		
	}
	
}
?>
