<?php

//https://github.com/kamranahmedse/design-patterns-for-humans#-observer

interface Observer {
  public function onJobPosted($jobPost);
}

class JobPost {
  private $title;

  public function __construct($title){
    $this->title = $title;
  }

  public function getTitle(){
    return $this->title;
  }
}

class JobSeeker implements Observer {//First of all we have job seekers that need to be notified for a job posting
  protected $name;

  public function __construct($name){
    $this->name = $name;
  }

  public function onJobPosted($jobPost){
    echo $this->name . ' will apply for this new job add: ' . $jobPost . '<br>';
  }
}
//---------------------------------------------

interface Observable {
  public function addNewJobPost($jobPost);
}

class EmploymentAgency implements Observable {
  protected $observers = [];

  protected function notify($jobPost){
    foreach ($this->observers as $observer) {
      $observer->onJobPosted($jobPost);
    }
  }

  public function attach($observer){
    $this->observers[] = $observer;
  }

  public function addNewJobPost($jobPost){
    $this->notify($jobPost);
  }
}

// Create subscribers
$jonhDoe = new JobSeeker('John Doe');
$janeDoe = new JobSeeker('Jane Doe');

// Create publisher and attach subscribers
$employmentAgency = new EmploymentAgency;
$employmentAgency->attach($jonhDoe);
$employmentAgency->attach($janeDoe);
var_dump($employmentAgency);

// Add a new job and see if subscribers get notified
$employmentAgency->addNewJobPost('Software engineer');
$employmentAgency->addNewJobPost('Coal mining');