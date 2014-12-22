<?php

/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 03.12.2014
 * Time: 0:28
 */
class Model
{
    protected $db;
    private  $result = array();

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

        $query = "SELECT * FROM {$table} WHERE {$where}";

        $result = mysql_query($query, $this->db);

        if($result) {
            while ($row = mysql_fetch_object($result)) {
                $this->result[] = $row;
            }
        }
        mysql_free_result($result);// Free memory from result data
        return $this;
    }

    public function insert($table, $colVal=array())
    {
        $KeyValSql = $this->fieldValueBuilder($colVal);
        $columns = $KeyValSql['columns'];
        $values =  $KeyValSql['values'];

        $query = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";

        $result = mysql_query($query, $this->db);
        $this->result = $result;
        return $this;
    }

    public function update($table, $colVal=array(), $where = array())
    {
        $newStates = "";
        foreach($colVal as $col=>$val){
            $newStates .= "`{$col}` = '{$val}', ";
        }
        $newStates = rtrim($newStates, ", ");
        $where = $this->whereBuilder($where);
        $query = "UPDATE {$table} SET {$newStates} WHERE {$where}";
        $result = mysql_query($query, $this->db);
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
        //$where[0]=field, $where[1]=operator, $where[2]=value
        $operators = array('<', '>', '<=', '>=', '=');
        if (in_array($where[1], $operators)) {
            return " `{$where[0]}` {$where[1]} \"{$where[2]}\" ";
        }
        return false;
    }

    private function fieldValueBuilder($keyVal=array()){
        $values="";
        $columns="";
        foreach($keyVal as $key => $val){
            $columns .=" {$key}, ";
            $values  .=" '{$val}', ";
        }
        $columns = rtrim($columns, ", ");
        $values = rtrim($values, ", ");
        return array('columns'=>$columns, 'values'=>$values);
    }

    public function first(){

        if(!empty($this->result)) {
            return $this->result[0];
        }else{
            return false;
        }
    }
} 