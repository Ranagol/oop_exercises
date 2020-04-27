<?php


abstract class BankAccount {
  protected $stanje = 0;
  protected $daLiJeBlokiran = false;
  protected $dozvoljeniMinus = -200;
  protected $provizija = 0;

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
    //OK, TU JE GRESKA ISPOD

    if ($this->proveriBlokiranost()  && $this->getStanje() > $this->getdozvoljeniMinus()) {
      $this->odBlokirajRacun();
    }
  }

  //ISPLATE
  public function smanjiStanje($amount){
    if ($this->proveriBlokiranost()) {
      echo 'Nazalost vas racun je blokiran. Nema isplate . <br>';
      return;//ako je blokiran, ovde prestaje sve.
    }
    echo 'Cool, klijent nije blokiran. '. '<br>';
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
      return true;
    }
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

class SimpleBankAccount extends BankAccount {
  //ovde nema nista, jer ovo je u principu u dalje BankAccount...
  
}


class SecuredBankAccount extends BankAccount{//e, ovde cemo morati da overridujemo...
  protected $dozvoljeniMinus = -1000;
  protected $provizija = 2.5;

}

//1-build in the provizija shit


class User {
  private $ime;
  private $prezime;
  protected $simpleBankAccount;//simple
  protected $securedBankAccount;//secured

  public function __construct($ime, $prezime){
    $this->ime = $ime;
    $this->prezime = $prezime;
    $this->simpleBankAccount = new SimpleBankAccount;
    $this->securedBankAccount = new SecuredBankAccount;
  }

  public function uplata($amount, $chooseBank){
    $bank = $this->setBankType($chooseBank);
    $bank->povecajStanje($amount);
  }

  public function isplata($amount, $chooseBank){
    $bank = $this->setBankType($chooseBank);
    $bank->smanjiStanje($amount);
  }

  public function setBankType($chooseBank){
    if ($chooseBank == 'simple') {
      return $this->simpleBankAccount;
    } else {
      return $this->securedBankAccount;
    }
  }
}

$user = new User('Marko', 'Markovic');
var_dump($user);
$user->uplata(100, 'simple');
$user->uplata(200, 'secured');
$user->isplata(50, 'simple');
$user->isplata(100, 'secured');
var_dump($user);

