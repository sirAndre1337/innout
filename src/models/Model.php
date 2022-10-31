<?php

class Model {
   protected static $tableName = '';
   protected static $columns = []; 
   protected $values = [];

   public function __construct($array) {
        $this->loadFromArray($array);
   }

   public function loadFromArray($array) {
        if($array) {
            foreach($array as $key => $value) {
                $this->$key = $value;
            }
        }
   }

   public function __get($key) {
        return $this->values[$key];
   }

   public function __set($key, $value) {
        $this->values[$key] = $value;
   }
}