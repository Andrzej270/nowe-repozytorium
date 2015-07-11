<?php
class eliksirzycie {
	use eliksir;
	public function dzialanie(){
		if($this->osoba->getzyciem()==$this->osoba->getzycie()){
			echo"Masz maksymlną ilosc punktow zycia";
			
		}
		elseif($this->osoba->getzycie()+$this->poziom>$this->osoba->getzyciem()){
			$zycie=$this->osoba->getzyciem();
			$this->osoba->setzycie($zycie);
		}
		else{
			$zycie=$this->osoba->getzycie()+$this->poziom;
			$this->osoba->setzycie($zycie);
		}
		
	}
	
	
}

?>
