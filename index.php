<?php
require_once('osobatrait.php');
require_once('eliksir.php');
require_once('eliksirszybkosc.php');
require_once('eliksirzycie.php');
require_once('eliksirsila.php');
require_once('Potwor.php');
require_once('tura.php');
require_once('Wiedzmin.php');
do{
$p1=1;
$p2=1;	
$stdout = fopen('php://stdout', 'w');
fwrite($stdout, "wybierz cztery parametry potwora(jeden po drugim) ");
fclose($stdout);
$stdin = fopen('php://stdin', 'r');
$wybor2=array();
for($i=1; $i<5; $i++){
$wybor2[$i]=fgetc($stdin);
if($wybor2[$i]==0){
	echo "\nbrak parametru potwora\n";
	$p1=0;
}
}
fclose($stdin);
$stdout = fopen('php://stdout', 'w');
fwrite($stdout, "wybierz cztery parametry wiedzmina(jeden po drugim) ");
fclose($stdout);
$stdin = fopen('php://stdin', 'r');
$wybor=array();
for($i=1; $i<5; $i++){
$wybor[$i]=fgetc($stdin);
if($wybor[$i]==0){
	echo "\nbrak parametru wiedzmna\n";
	$p2=0;
}
}
fclose($stdin);
echo $wybor[1];
echo $wybor[2];
echo $wybor[3];
echo $wybor[4];
echo $p1;
echo $p2;
}
while($p1==0 || $p2==0);
$zmienna3=new potwor($wybor2[1],$wybor2[2],$wybor2[3],$wybor2[4]);
$zmienna2=new Wiedzmin($wybor[1],$wybor[2],$wybor[3],$wybor[4]);
$koniec=false;
$zmienna= new tura($zmienna2,$zmienna3);
do{	
$zmienna->kolej();
$zmienna2->aktywne();
if($zmienna2->gettura()==1){
$wtura=0;	
while($wtura==0){	
echo $zmienna2;
echo"\n";	
echo $zmienna3;
$stdout = fopen('php://stdout', 'w');
fwrite($stdout, "\nTwoja tura jaki ruch wykonasz(a-atak b-stworzenie eliksiru c-wypicie d-obrona e-koniec tury) ");
fclose($stdout);
$stdin = fopen('php://stdin', 'r');
$wybor=fgetc($stdin);
fclose($stdin);

if($wybor=="a"){
$zrecznosc=$zmienna3->getzrecz();	
$atak=$zmienna2->atak($zrecznosc);
if($atak==true){ 
$zmienna3->trafiony();
echo"\n Potwor trafiony\n";}
else{echo "pudlo";}
}

elseif($wybor=="b"){
$stdout = fopen('php://stdout', 'w');	
fwrite($stdout,"Podaj poziom eliksiru");
fclose($stdout);
$stdin = fopen('php://stdin', 'r');
$poziom=fgetc($stdin);
fclose($stdin);
if($zmienna2->getpktakcji()>1+$poziom){
$typ=$zmienna2->utwurzeliksir();
$eliksir=new $typ($poziom,$zmienna2);
$zmienna2->seteliksir($eliksir,$poziom);
echo"\nEliksir utworzony\n";
}
else{echo"za malo punktow akcji";}	
}


elseif($wybor=="c"){
$zmienna2->wypijeliksir();
echo"\nEliksir wypity\n";
}

elseif($wybor=="d")	{
$zmienna2->obrona();
$zmienna2->koniectury();
$wtura=1;
}


elseif($wybor=="e"){
$zmienna2->koniectury();
$wtura=1;
}
if($zmienna3->getzycie()<=0){
	echo "koniec gry wygrales";
	$koniec=true;
	break;
}
}
}
elseif($zmienna3->gettura()==1){
$wzrecznosc=$zmienna2->getzrecz();	
$atak=$zmienna3->atak($wzrecznosc);
if($atak==true){ 
$zmienna2->trafiony();
echo"Wiedzmin trafiony";}
else{echo "\n pudlo";}
$zmienna3->koniectury();
if($zmienna2->getzycie()<=0){
	echo "koniec gry przegrales";
	$koniec=true;
}

}

}
while($koniec!=true);
?>
