<?php
  class car{
    public $color;
    public $model;
    public function __construct($color,$model){
      $this->color = $color;
      $this->model = $model;
    }
    public function message(){
       return "My car has color: ". $this->color . " and model: " . $this->model;
    }
  }
  $car1 = new car("red","1780");
  $car2 = new car("blue","wooo");
  echo $car1->message();
 // $list = ($car1,$car2);
  //String in PHP
  echo "String in PHP";
  $str = "Hello World";
  echo "Length of String :" . strlen($str);
  echo "Number of word in String: " . str_word_count($str);
  echo "Reverses String: " . strrev($str);
  echo "Search for the text 'World': " .strpos($str,"World");
  echo "Replace a string by other string: ". str_replace("World","Huyen",$str);
  echo $str ."</br>";
  //date
  echo "Time: ". date("Y");