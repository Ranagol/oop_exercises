<?php

//https://github.com/kamranahmedse/design-patterns-for-humans#-state
//Let's take an example of text editor, it lets you change the state of text that is typed i.e. if you have selected bold, it starts writing in bold, if italic then in italics etc.

/*MY EXPLANATION
1-Create an interface, that will be implemented to all state-classes
2-Create state-classes. These will be classes with a same method name, but different method behaviour. These states will be changeable. Example: we can change from state A to state B anytime.
3-Create a class that can have states.

*/

interface WritingState {//state interface
  public function write($words);
}

class UpperCaseState implements WritingState {//state 1
  public function write($words){
    echo strtoupper($words);
  }
}

class LowerCaseState implements WritingState {//state 2
  public function write($words){
    echo strtolower($words);
  }
}

class NormalTextState implements WritingState {//state 3
  public function write($words){
    echo ($words);
  }
}

class TextEditor {//the software that has states
  protected $state;//this is where we store the state

  public function __construct($state){//creating a state in the beginning
    $this->state = $state;
  }

  public function setState($state){//setting/changing the state on wish
    $this->state = $state;
  }

  public function type($words){//this function will use the states
    $this->state->write($words);//depening on the current state, our type function writes UPPERCASE or lowercase or Normal text.
  }

}

$textEditor = new TextEditor(new NormalTextState);
$textEditor->type('First line - normal state.<br>');
$textEditor->setState(new UpperCaseState);
$textEditor->type('Second line - uppercase state.<br>');
$textEditor->setState(new LowerCaseState);
$textEditor->type('Third line - lowercase state.<br>');

/* RESULT
First line - normal state.
SECOND LINE - UPPERCASE STATE.
third line - lowercase state.
*/


