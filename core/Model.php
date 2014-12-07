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
            $this->db = $this->connect();
        } catch (Exception $e) {
            die("Can't connect to DB");
        }
    }

    private static function connect()
    {
        $connect = mysql_connect('localhost', 'root', '');
        if (mysql_select_db('mvcdev', $connect)) {
            return $connect;
        }
        return false;
    }

    public function get($table, $where = array())
    {
        $where = $this->whereBuilder($where);
        $result = mysql_query("SELECT * FROM {$table} WHERE {$where}", $this->db);
        while ($row = mysql_fetch_assoc($result)) {
            $this->result = $row;
        }
        return $this;
    }

    public function insert($table, $columns, $values)
    {
        $result = mysql_query("INSERT INTO {$table} $columns VALUES {$values}", $this->db);
        $this->result = $result;
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

    private function whereBuilder($where = array())
    {
        $operators = array('<', '>', '<=', '>=', '=');
        if (in_array($where['operator'], $operators)) {
            return " {$where['field']} {$where['operator']} \"{$where['value']}\" ";
        }
        return false;
    }
} 