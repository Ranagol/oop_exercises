<?php


class BankAccount {
  protected $stanje = 0;
  protected $daLiJeBlokiran = false;
  protected $dozvoljeniMinus = -200;

  public function getStanje(){
    return $this->stanje;
  }

  public function blokirajRacun(){
    $this->daLiJeBlokiran = true;
  }

  public function proveriBlokiranost(){
    if ($this->stanje < $this->dozvoljeniMinus) {
      $this->blokirajRacun();
    }
    if ($this->daLiJeBlokiran) {
      echo 'Nazalost vas racun je blokiran. Nema isplate . <br>';
      return;
    }
  }

  public function daLiImaDovoljnoPara($amount){
    if ($this->stanje < $amount) {
      echo 'Nazalost nemate dovoljno para na racunu. Zeleli ste da primite ' . $amount . ' a imate na racunu samo ' . $this->getStanje  . '<br>';
      return;
    }
  }

  public function uplata($amount){
    $this->stanje += $amount;
    echo 'Uplatili ste ' . $amount . ' i vase stanje je trenutno ' . $this->getStanje() . '<br>';
  }

  public function isplata($amount){
    $this->proveriBlokiranost();
    $this->daLiImaDovoljnoPara($amount);
    $this->stanje -= $amount;
    echo 'Isplaceno vam je ' . $amount . ' i vase stanje je trenutno ' . $this->getStanje() . '<br>';
  }


    
}


class User {
  private $ime;
  private $prezime;
  protected $bankAccount;

  public function __construct($ime, $prezime){
    $this->ime = $ime;
    $this->prezime = $prezime;
    $this->bankAccount = new BankAccount;
  }
}

$user = new User('Marko', 'Markovic');
var_dump($user);
$user->bankAccount->uplata(1000);
