<?php

class Counter {
  private static $instance;//the singleton will be stored here, in this STATIC property
  private $count;

  private function __construct() {//Making the default constructor private, so nobody could activate it, outside of this class. We activate a constructor with new Counter.
    $this->count = 0;
  }



  //Creating a static creation method that will act as a constructor. This method creates an object using the private constructor and saves it in static variable or field. All following calls to this method return the cached object.
  public static function getInstance() {//notice, this is a STATIC method!!!! Static properties can be handled only with static methods.

    if (self::$instance == NULL) {//if there is no singleton...
      self::$instance = new Counter();//activating the counstructor..., creating a singleton
    }
    return self::$instance;//self:: because the instance is static. It is static, so we don't have to instantiate this class (which is actually our main aim here, we want only one singleton object). It is static, so we can acces this property without instantiating a new object.
  }

  public function incrementCount() {
    $this->count++;
  }

  public function getCount() {
    return $this->count;
  }
}

//and this is how we use a singleton, we call it with the static method, without instantiation
$capturedSingleton = Counter::getInstance();
var_dump($capturedSingleton);

Counter::getInstance()->incrementCount();
Counter::getInstance()->incrementCount();
Counter::getInstance()->incrementCount();

var_dump($capturedSingleton);