<?php
trait osobatrait{
 
 private $name;
 
 private $szybkosc;
 
 private $sila;
  
 private $zrecznosc;
 
 private $zycie=array();

 private $punktyakcji=1;

 private $tura;
 
 private $obrona=0;
 
 private $turn;
 
 
 abstract public function __toString();
  
 
 public function trafiony(){
	 --$this->zycie["now"];
	 
 }
 public function getsila(){
		 
		 return $this->sila;
	 }
	public function setsila($sila){
		 
		  $this->sila=$sila;
	 } 
  public function getszybkosc(){
		 
		 return $this->szybkosc;
	 }
	  public function setszybkosc($szybkosc){
		 
		$this->szybkosc=$szybkosc;
	 }
 public function getpktakcji(){
		 
		 return $this->punktyakcji;
	 }
public function setpktakcji($pkt){
		 
		$this->punktyakcji=$pkt;
	 }
 public function gettura(){
	 return $this->tura;
 }
public function settura($tura){
	  $this->tura=$tura;
 }
 public function getzycie(){
	 return $this->zycie["now"];
 }
 public function setzycie($zycie){
	 $this->zycie["now"]=$zycie;
 }
 public function getzyciem(){
	 return $this->zycie["max"];
 }
 public function getname(){
	 return $this->name;
 }
 public function getzrecz(){
	 return $this->zrecznosc;
 }
  public function getturn(){
	 return $this->turn;
 }
}

?>
