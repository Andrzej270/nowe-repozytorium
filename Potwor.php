<?php
class potwor{
	
use osobatrait; 

private $sk;

public function __construct($szybkosc,$sila,$zrecznosc,$zycie){
	 $this->name="potwor";
	 $this->szybkosc=$szybkosc;
	 $this->sila=$sila;
	 $this->zrecznosc=$zrecznosc;
	 $this->zycie["max"]=$zycie;
	 $this->zycie["now"]=$zycie;
 }
 
  public function __toString(){
  $info="Statystyki Potwora:
         Szybkosc:	{$this->szybkosc}
         sila:	    {$this->sila}
         Zrecznosc:	{$this->zrecznosc}
         Zycie:	    {$this->zycie["max"]}
         Pozostalo:	{$this->zycie["now"]}
		 punkty akcji: {$this->punktyakcji}";
		 return $info;
 }
 
 private function skutecznosc($zrecznosc){
		$this->sk=$this->zrecznosc-$zrecznosc*100;
		$this->sk=$this->sk/$zrecznosc;
		if($this->sk<10){
			$this->sk=10;
		}
		elseif($this->sk>90){
			$this->sk=90;
		}
		
	}
	
	
	public function atak($wiedzmin,$pzrecznosc){
		$this->skutecznosc($pzrecznosc);
		do{
		if(rand(1,100)>=$this->sk){
		  --$this->punktyakcji;
		  $wiedzmin->trafiony();
		  echo"\n Wiedzmin trafiony\n";
		}
		else{
			--$this->punktyakcji;
			echo"\n Pudlo \n";
			}
		}while($this->punktyakcji>0);
	}
	public function koniectury(){
		 ++$this->punktyakcji;
		 
	 }
	 
}
?>

