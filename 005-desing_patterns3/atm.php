<?php

/*
1.	Kreirati bankomat - Cash Machine (ATM)

Bankomat ima tri akcije
-	Unos kartice i PIN-a (insertCardAndPin),
-	Unos kolicine novca i potvrda (inputAmountAndConfirm),
-	Zahtev za potvrdu (demandCheck),
i tri stanja:
-	Spreman (Ready),
-	Validirano (Validated),
-	Isplata (Payout).

Simulirati rad bankomata. Zabraniti izvrsavanje nedozvoljenih akcija za odredjena stanja bankomata.
*/

interface BankomatFunkcije {
  public function insertCardAndPin();
  public function inputAmountAndConfirm();
  public function demandCheck();
}

class ReadyState {
  public function insertCardAndPin($card){
    echo 'Please insert your card.<br>';
  }
  public function inputAmountAndConfirm(){

  }
  public function demandCheck(){

  }
}

class ValidatedState {
  public function insertCardAndPin(){
    
  }
  public function inputAmountAndConfirm(){

  }
  public function demandCheck(){
    
  }
}

class PayoutState {
  public function insertCardAndPin(){
    
  }
  public function inputAmountAndConfirm(){

  }
  public function demandCheck(){
    
  }
}

class ATM {
  protected $state;

  public function setState($state){
    $this->state = $state;
  }


}

class Card {
  private $PIN;
  private $balance;
  private $user;

  public function __construct($PIN, $balance, $user){
    $this->PIN = $PIN;
    $this->balance = $balance;
    $this->user = $user;
  }
}


