<?php

interface Check {
  public function isElectric();//isto ime metode koristimo i kod Zastava i kod Tesla, ali sama metoda radi nesto razlicito kod Zastave i kod Tesle.
}

abstract class Car {

}

class Tesla extends Car implements Check {
  public function isElectric(){//this is the triggered function
    return true;
  }
}

class Zastava extends Car {
  public function isElectric(){//this is the triggered function
    return false;
  }
}

class CarChecker{
  public function isElectricEngine(Car $car){//this is the trigger function
    return $car->isElectric();
  }
}

$tesla = new Tesla();
$zastava = new Zastava();
$carChecker = new CarChecker();
var_dump($carChecker->isElectricEngine($tesla));
var_dump($carChecker->isElectricEngine($zastava));

//Now, if we want a new car to be checked, we just need it to implement the Car interface (with the isElectric method).
