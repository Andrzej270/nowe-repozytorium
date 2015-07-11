<?php


class tura{
	
private	$wiedzmin;

private $potwor;

private $turn=0;

 public function __construct(Wiedzmin $wiedzmin,potwor $potwor){
	 $this->wiedzmin=$wiedzmin;
	 $this->potwor=$potwor;
	 
 }
	

public function ustawkolej(){
	
	if($this->wiedzmin->getszybkosc() > $this->potwor->getszybkosc()){
		echo "\n Wiedzmin rozpoczyna\n";
		$this->wiedzmin->settura(1);
		$this->potwor->settura(0);
		
				
		
	}
	elseif($this->wiedzmin->getszybkosc() < $this->potwor->getszybkosc()){
		echo "\nPotwor rozpoczyna\n";
		$this->wiedzmin->settura(0);
		$this->potwor->settura(1);
		
		
	}
	elseif($this->wiedzmin->getszybkosc() == $this->potwor->getszybkosc()){
		if(rand(1,2)==1){
			echo "\n Wiedzmin rozpoczyna\n";
	    $this->wiedzmin->settura(1);
		$this->potwor->settura(0);
		
	  
		}
		elseif(rand(1,2)==2){
			echo "\nPotwor rozpoczyna\n";
	    $this->wiedzmin->settura(0);
		$this->potwor->settura(1);
		
		
			
		}
		
	}
}

public function punktyakcji(){
		if($this->wiedzmin->getszybkosc() > $this->potwor->getszybkosc()){
		$punkty=$this->wiedzmin->getszybkosc()/$this->potwor->getszybkosc();
		$wynik=$this->wiedzmin->getpktakcji()*$punkty;
		$this->wiedzmin->setpktakcji($wynik);
		}
		elseif($this->wiedzmin->getszybkosc() < $this->potwor->getszybkosc()){
	    $punkty=$this->potwor->getszybkosc()/$this->wiedzmin->getszybkosc();
		$wynik=$this->potwor->getpktakcji()*$punkty;
		$this->potwor->setpktakcji($wynik);
		}
	
}

public function nastepnakolej(){
	if($this->wiedzmin->gettura()==1){
		$this->wiedzmin->settura(0);
		$this->potwor->settura(1);
		echo"\ntura potwora\n";
		
		}
	elseif($this->potwor->gettura()==1){
		$this->wiedzmin->settura(1);
		$this->potwor->settura(0);
		echo"\ntura Wiedzmina\n";
		
	}
}
	public function kolej(){
		if($this->turn==0){
			$this->punktyakcji();
			$this->ustawkolej();
			++$this->turn;
		}
		elseif($this->turn==1){
			$this->nastepnakolej();
			--$this->turn;
		}
		
	}

}
?>
