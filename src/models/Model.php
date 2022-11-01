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


   public static function getOne($filters = [], $columns = '*') {
        $class = get_called_class();
        $result = static::getResultSetFromSelect($filters, $columns);
        return $result ? new $class($result->fetch_assoc()) : null;
   }

   public static function get($filters = [], $columns = '*') {
     $objects = [];
     $result = static::getResultSetFromSelect($filters, $columns);
     if($result) {
          $class = get_called_class();
          while($row = $result->fetch_assoc()) {
               array_push($objects , new $class($row));
          }
     }
     return $objects;
   }

   public static function getResultSetFromSelect($filters = [], $columns = '*') {
     $filtersFormated = '';
     if(count($filters) > 0) {
         $filtersFormated = ' WHERE ' . static::getFilters($filters);
     }

     $sql = 'SELECT ' . $columns .  ' FROM ' . static::$tableName . $filtersFormated . ';';
     $result = Database::getResultFromQuery($sql);
     if($result->num_rows === 0) {
          return null;
     } else {
          return $result;
     }
   }

   private static function getFilters($filters) {
     $sql = ' ';
     $firstRound = true;
     foreach($filters as $key => $value) {
          if(!$firstRound){
               $sql .= " AND";
          }
          $firstRound = false;
          $sql .= " {$key} = " . static::getFormatedValue($value) . " " ;
     }
     return $sql;
   }

   private static function getFormatedValue($value) {
     if(is_null($value)) {
          return "null";
     } else if(is_string($value)) {
          return "'$value'";
     } else {
          return $value;
     }
   }
}