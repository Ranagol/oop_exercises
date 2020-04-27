<?php


class BankAccount {
  protected $stanje = 0;
  protected $daLiJeBlokiran = false;
  protected $dozvoljeniMinus = -200;

  public function getStanje(){
    return $this->stanje;
  }

  public function getDozvoljeniMinus(){
    return $this->dozvoljeniMinus;
  }

  //UPLATE
  public function povecajStanje($amount){
    $this->stanje += $amount;
    echo 'Uplatili ste ' . $amount . ' i vase stanje je trenutno ' . $this->getStanje() . '<br>';
    if ($this->getStanje() > $this->getdozvoljeniMinus()) {
      $this->odBlokirajRacun();
    }
  }

  //ISPLATE
  public function smanjiStanje($amount){
    if ($this->proveriBlokiranost()) {
      return;//ako je blokiran, ovde prestaje sve.
    }
    if ($this->daLiImaDovoljnoPara($amount)) {//ako ima dovoljno para, onda...
      $this->stanje -= $amount;
      echo 'Isplaceno vam je ' . $amount . ' i vase stanje je trenutno ' . $this->getStanje() . '<br>';
    }
    if ($this->getStanje() == $this->getdozvoljeniMinus()) {//provera da li je otisao u -200, jer ako da, onda se blokira
      $this->blokirajRacun();
    }
  }

  public function daLiImaDovoljnoPara($amount){
    if (($this->stanje - $this->getDozvoljeniMinus()) < $amount) {
      echo 'Nazalost nemate dovoljno para na racunu. Zeleli ste da primite ' . $amount . ' a imate na racunu samo ' . $this->getStanje() . '<br>';
      return false;
    }
    return true;
  }

  //BLOKIRANJE
  public function proveriBlokiranost(){
    if ($this->daLiJeBlokiran) {
      echo 'Nazalost vas racun je blokiran. Nema isplate . <br>';
      return true;
    }
    echo 'Cool, klijent nije blokiran. '. '<br>';
    return false;
  }

  public function blokirajRacun(){
    $this->daLiJeBlokiran = true;
    echo 'Nazalost, upravo smo blokirali vas racun. Vase stanje je ' . $this->getStanje(). '<br>' ;
  }

  public function odBlokirajRacun(){
    $this->daLiJeBlokiran = false;
    echo 'Upravo smo odblokirali vas racun. Vase stanje je  ' . $this->getStanje(). '<br>' ;
  }
    
}
//problem: nema blokiranja

class User {
  private $ime;
  private $prezime;
  protected $bankAccount;

  public function __construct($ime, $prezime){
    $this->ime = $ime;
    $this->prezime = $prezime;
    $this->bankAccount = new BankAccount;
  }

  public function uplata($amount){
    $this->bankAccount->povecajStanje($amount);
  }

  public function isplata($amount){
    $this->bankAccount->smanjiStanje($amount);
  }
}

$user = new User('Marko', 'Markovic');
var_dump($user);
$user->uplata(1000);
$user->uplata(1000);
$user->uplata(1000);
//$user->isplata(500);
$user->isplata(3200);
$user->isplata(1);
$user->isplata(1);
$user->uplata(10);
$user->isplata(1);
var_dump($user);

