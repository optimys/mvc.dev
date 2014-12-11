<?php

/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 03.12.2014
 * Time: 0:28
 */
class Model
{
    private $db;
    public $result = array();

    public function __construct()
    {
        try {
            $this->db = mysql_connect('localhost', 'root', '');
            mysql_select_db('mvcdev', $this->db);
        } catch (Exception $e) {
            die("Can't connect to DB");
        }
    }

    public function get($table, $where = array())
    {
        $where = $this->whereBuilder($where);
        $result = mysql_query("SELECT * FROM {$table} WHERE {$where}", $this->db);
        if($result) {
            while ($row = mysql_fetch_assoc($result)) {
                $this->result[] = $row;
            }
        }
        return $this;
    }

    public function insert($table, $keyVal=array())
    {
        $values="";
        $columns="";
        foreach($keyVal as $key => $val){
            $columns .=" {$key} ";
            $values .=" '{$val}', ";
        }
        $columns = trim($columns);
        $values = rtrim($values, ",");
        $query = "INSERT INTO {$table} {$columns} VALUES {$values}";
        $result = mysql_query("INSERT INTO {$table} {$columns} VALUES {$values}", $this->db);
        $this->result = $result;
        echo $query;
        return $this;
    }

    public function update($table, $columns, $values, $where = array())
    {
        $result = mysql_query("UPDATE {$table} SET $columns = {$values} WHERE {$where}", $this->db);
        $this->result = $result;
        return $this;
    }

    public function delete($table, $where = array())
    {
        $result = mysql_query("DELETE * FROM {table} WHERE {$where}", $this->db);
        $this->result = $result;
        return $this;
    }

    private  function whereBuilder($where = array())
    {
        $operators = array('<', '>', '<=', '>=', '=');
        if (in_array($where['operator'], $operators)) {
            return " {$where['field']} {$where['operator']} \"{$where['value']}\" ";
        }
        return false;
    }

    public function first(){
        if(!empty($this->result)) {
            return $this->result[0];
        }else{
            return false;
        }
    }

} 