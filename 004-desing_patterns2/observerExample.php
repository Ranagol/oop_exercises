<?php

//https://github.com/kamranahmedse/design-patterns-for-humans#-observer
//https://refactoring.guru/design-patterns/observer

/* OBSERVER PATTERN IN MY WORDS
1. We need two interfaces: Observer and Observable
2. There will be an Observer class (here: JobSeeker, that are observing the new job ads) and an Observable class (here: EmploymentAgency, that is creating new job ads).
3. All the observer objects have to be collected in the Observable/EmploymentAgency class, in an array
4. Use foreach on this array, and for every object trigger their REACTION, via polymorphism
5. The Observable class must have a protected notify function, which will be called only if the desired event is happened
*/

//****************************************THE OBSERVER PART********************************* */
interface Observer {
  public function onJobPosted($jobPost);//whoever want to follow the new job ads, must have an Observer interface implemented
}

class JobSeeker implements Observer {//First of all we have job seekers that need to be notified for a job posting. When they are notified, they will react to the job ad.
  protected $name;

  public function __construct($name){
    $this->name = $name;
  }

  public function onJobPosted($jobPost){//this will be the REACTION if a new job post will happen in the employment agency
    echo $this->name . ' will apply for this new job add: ' . $jobPost->getTitle() . '<br>';
  }
}


//***************************************** THE OBSERVABLE PART************************************************* */
interface Observable {
  public function addNewJobPost($jobPost);
}

class EmploymentAgency implements Observable {
  protected $observers = [];//

  protected function notify($jobPost){//this function notifies every observer, with a foreach
    foreach ($this->observers as $observer) {
      $observer->onJobPosted($jobPost);//polymorphism. onJobPosted() is the jobSeekers function.
    }
  }

  public function attach($observer){//this is just for adding observers into the array
    $this->observers[] = $observer;
  }

  public function addNewJobPost($title){//This is the TRIGGER. When a new job post is added/created...
    $jobPost = new JobPost($title);
    $this->notify($jobPost);//all observers will be notified
  }
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