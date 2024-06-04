<?php

class Model {
    protected static $tableName = '';
    protected static $columns = [];
    protected $values = [];

    public function __construct($arr){
        $this->loadFromArray($arr);
    }

    public function loadFromArray($arr){
        if($arr){
            foreach($arr as $key => $value){
                $this->$key = $value;
            }
        }
    }

    //usar o get e o set para chamar mais facil

    public function __get($key){
        return $this->values[$key];
    }

    public function __set($key, $value){
        $this->values[$key] = $value;
    }
    public static function getOne($filters = [], $columns = '*'){
        $class = get_called_class();
        $result = static::getResultSetFromSelect($filters, $columns);
        return $result ? new $class($result->fetch_assoc()) : null;
    }
    public static function get($filters = [], $columns = '*'){
        $objects = [];
        $result = static::getResultSetFromSelect($filters, $columns);
        if($result){
            //qual a classe chamou o get e com a classe concsegue usar o new
            $class = get_called_class();
            while($row = $result->fetch_assoc()){
                //passando o construtor pra o user
                //usar array push para subir para o bd;
                array_push($objects, new $class($row));
            }
        }
        return $objects;
    }
//definiu o columns como comando slq e usou o static::para puxar o table nameque tambem é estatico

    public static function getResultSetFromSelect($filters = [], $columns = '*'){
        $sql = 'SELECT ' . $columns . ' FROM ' . static::$tableName . static::getFilters($filters);
        $result = Database::getResultFromQuery($sql);
        if($result->num_rows === 0){
            return null;
        }else{
            return $result;
        }
    }

    private static function getFilters($filters){
        
        $sql = '';
        //vai ter sempre um and
        if(count($filters) > 0){
            $sql .= " WHERE 1=1";
            foreach( $filters as $column => $value){
                $sql .= " AND ". $column = static::getFormatedValue($value);
            }
        }
        return $sql;
    }

    //verificar o valor, primeiro if verificar se foi nulo
    //segundo verificar se é int
    //terceiro retornar o valor;
    private static function getFormatedValue($value){
        if(is_null($value)){
            return "null";
        }else if(gettype($value) == "string"){
            return "''" . $value . "''";
        }else{
            return $value;
        }
    }


}