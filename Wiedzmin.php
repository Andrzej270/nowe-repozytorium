<?php
class Wiedzmin{
	
use osobatrait; 
 
 private $sk;
 
 private $turn;
 
 private $eliksir;
 

 
 
 public function __construct($szybkosc,$sila,$zrecznosc,$zycie){
	 $this->name="Wiedzmin";
	 $this->szybkosc=$szybkosc;
	 $this->sila=$sila;
	 $this->zrecznosc=$zrecznosc;
	 $this->zycie["max"]=$zycie;
	 $this->zycie["now"]=$zycie;
 }
 
 public function __toString(){
  $info="Statystyki wiedzmina:
         Szybkosc:	{$this->szybkosc}
         sila:	    {$this->sila}
         Zrecznosc:	{$this->zrecznosc}
         Zycie:	    {$this->zycie["max"]}
         Pozostalo:	{$this->zycie["now"]}
		 punkty akcji: {$this->punktyakcji}";
		 return $info;
 }
 
 public function utwurzeliksir(){
	$typeliksiru=rand(1,3);
	if($typeliksiru==1){
		$typeliksiru="eliksirzycie";
	}
	 elseif($typeliksiru==2){
		 $typeliksiru="eliksirszybkosc";
		 }
     elseif($typeliksiru==3){
		 $typeliksiru="eliksirsila";
	 }
	 return  $typeliksiru;
 }
   public function seteliksir($eliksir,$poziom){
	 $this->eliksir=$eliksir;
	 $this->punktyakcji=$this->punktyakcji-$poziom-1;  
   }
 public function wypijeliksir(){
	 if($this->punktyakcji<=0){
			 echo"zamało punktów akcji zakończ turę";
			 
		 }else{
			 $this->eliksir->dzialanie();
			 --$this->punktyakcji;
			 }
	 
 }
	
	private function skutecznosc($pzrecznosc){
		$this->sk=$this->zrecznosc-$pzrecznosc*100;
		$this->sk=$this->sk/$pzrecznosc;
		if($this->sk<10){
			$this->sk=10;
		}
		elseif($this->sk>90){
			$this->sk=90;
		}
		
	}
	
	public function obrona(){
		if($this->zatak==1){
			echo"w tej turze juz atakowales więc nie mozesz sie bronic";
		}else{
		$this->punktyakcji=$this->punktyakcji+1;
		$this->zrecznosc=$this->zrecznosc+$this->zrecznosc/2;
		$this->obrona=1;
		}
	}
	public function aktywne(){
		if($this->obrona==1 && $this->tura==1){
			$this->zrecznosc=$this->zrecznosc-$this->zrecznosc/3;
			$obrona=0;
			}
		if(!empty($this->eliksir)){
			$this->eliksir->czydziala();
		}
	}
	
	public function atak($potwor,$pzrecznosc){
		$this->skutecznosc($pzrecznosc);
		if(rand(1,100)>=$this->sk && $this->punktyakcji>0){
		  --$this->punktyakcji;
		  $potwor->trafiony();
		  echo"\n Potwor trafiony\n";
		}
		elseif($this->punktyakcji<=0){
			echo"\nZa malo punktow akcji\n";
		}
		else{
			--$this->punktyakcji;
			echo"\n Pudlo \n";
			}
		$this->zatak=1;
	}
	 public function punktyakcji(){
		 if($this->punktyakcji<=0){
			 echo"za malo punktów akcji zakończ turę";
			 
		 }
		 
	 }

     public function koniectury(){
		 $this->zatak=0;
		 ++$this->turn;
		 ++$this->punktyakcji;
		 
	 }

}

?>
