<?php

interface Check {
  public function isElectric();
}

abstract class Car {

}

class Tesla extends Car implements Check {
  
}

class Zastava extends Car {

}