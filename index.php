<?php
require_once('osobatrait.php');
require_once('eliksir.php');
require_once('eliksirszybkosc.php');
require_once('eliksirzycie.php');
require_once('eliksirsila.php');
require_once('Potwor.php');
require_once('tura.php');
require_once('Wiedzmin.php');
function pobranie($tekst,$p){
$stdout = fopen('php://stdout', 'w');
fwrite($stdout,$tekst);
fclose($stdout);
$stdin = fopen('php://stdin', 'r');
$wybor=array();
for($i=1; $i<$p+1; $i++){
$wybor[$i]=fgetc($stdin);
}
return $wybor;
fclose($stdin);
}
$tekst1="wybierz cztery parametry potwora(jeden po drugim)";
$tekst2="wybierz cztery parametry wiedzmina(jeden po drugim)";
$tekst3="\nTwoja tura jaki ruch wykonasz(a-atak b-stworzenie eliksiru c-wypicie d-obrona e-koniec tury)\n";
$tekst4="Podaj poziom eliksiru";
do{
$wybor=array();	
$wybor2=array();
$wybor2=pobranie($tekst1,4);
$wybor=pobranie($tekst2,4);
$brak=false;
for($i=1; $i<5; $i++){
if($wybor2[$i]==0 || $wybor[$i]==0){
	
	echo "\nbrak parametru prosze podac jeszcze raz zmienne\n";
	$brak=true;
}
}
}
while($brak);
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

$wyb=array();
$wyb=pobranie($tekst3,1);

$zmienna2->punktyakcji();
$w=$wyb[1];

switch($w){
case "a": 
$zrecznosc=$zmienna3->getzrecz();	
$zmienna2->atak($zmienna3,$zrecznosc);
break;

case "b":
$wyn=array();
$wyn=pobranie($tekst4,1);
$poziom=$wyn[1];
if($zmienna2->getpktakcji()>=$poziom+1){
$typ=$zmienna2->utwurzeliksir();

$eliksir=new $typ($poziom,$zmienna2);
$zmienna2->seteliksir($eliksir,$poziom);
echo"\nEliksir utworzony\n";
}
else{echo"za malo punktow akcji";}	
break;


case"c":
$zmienna2->wypijeliksir();
echo"\nEliksir wypity\n";
break;

case"d":
$zmienna2->obrona();
$zmienna2->koniectury();
$wtura=1;
break;



case"e":
$zmienna2->koniectury();
$wtura=1;
break;


default:
echo"\nProsze zaznaczyc poprawna literke\n";
break;
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
$zmienna3->atak($zmienna2,$wzrecznosc);
$zmienna3->koniectury();
if($zmienna2->getzycie()<=0){
	echo "koniec gry przegrales";
	$koniec=true;
}

}

}
while($koniec!=true);
?>
