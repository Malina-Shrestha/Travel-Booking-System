<?php

namespace System\Core;

use System\DB\Database;

/**
 * Base model class containing query
 * builder functions
 * Class BaseModel
 * @package System\Core
 */
abstract class BaseModel
{
    protected $table = '';
    protected $pk = 'id';
    protected $db = null;
    protected $select = '*';
    protected $offset = 0;
    protected $limit = null;
    protected $conditions = null;
    protected $order = null;
    protected $sql = '';
    protected $editable = false;

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * Get columns for selecting columns from database
     * @param string $columns
     * @return BaseModel $this
     */

    public function select($columns = '*')
    {
        $this->select = $columns;
        return $this;
    }

    /**
     * Get offset for selecting data from database
     * @param int $offset
     * @return BaseModel $this
     */
    public function offset($offset = 0)
    {
        $this->offset = $offset;
        return $this;
    }

    /**
     * Get limit for selecting data from database
     * @param int $limit
     * @return BaseModel $this
     */
    public function limit($limit)
    {
        $this->limit = $limit;
        return $this;
    }


    /**
     * Get conditions for selecting data from database.
     * @param string $column
     * @param string $valu e
     * @param string $operator
     * @return BaseModel $this
     */
    public function where($column, $value, $operator = '=')
    {
        if (empty($this->conditions)) {
            $this->conditions = "{$column} {$operator} '{$value}'";
        } else {
            $this->conditions .= "AND {$column} {$operator} '{$value}'";
        }

        return $this;

    }

    /**
     * Get conditions for selecting data from database.
     * @param string $column
     * @param string $value
     * @param string $operator
     * @return BaseModel $this
     */
    public function orWhere($column, $value, $operator = '=')
    {
        $this->conditions .= " OR {$column} {$operator} '{$value}'";
        return $this;
    }


    /**
     * Get order for selecting data from database
     * @param string $column
     * @param string $direction
     * @return BaseModel $this
     */

    public function order($column, $direction = 'ASC')
    {
        if (empty($this->order)) {
            $this->order = "{$column} {$direction}";
        }
        else {
            $this->order = ", {$column} {$direction}";
        }
        return $this;
    }

    /**
     * Build select query and return data
     * provided by database
     * @return array
     */
    public function get()
    {
        $this->buildSelect();

       $result = $this->db->query($this->sql);
       $data = $this->db->fetch_assoc($result);

       $collection = [];

       foreach ($data as $item) {
           $classname = get_class($this);
           $obj = new $classname;
           $obj->editable = true;

           foreach($item as $key => $value) {
               $obj->{key} = $value;
           }

           $collection[] = $obj;

    }

    $this->resetVars();
    return $collection;

    }

    /**
     *Returns first item from the data
     * returned by the database.
     *
     * @return BaseModel|null
     */
    public function single()
    {
        $collection = $this->get();

        if(!empty($collection)) {
            return $collection[0];
        }
        else {
            return null;
        }
    }

    /**
     * Quickly load data on the current model
     * @param int $id
     * @return bool
     */
    public function load($id)
    {
        $obj = $this->where($this->pk, $id)->single();

        if(!is_null($obj)) {
            $data = $this->getLoadedData($obj);

            foreach ($data as $key => $value) {
                $this->{$key}= $value;
            }

            $this->editable = true;

            return true;

        }
        else {
            return false;
        }
    }

    /**
     * Insert/Update data in database
     * @return bool
     */
    public function save()
    {
        $data = $this->getLoadedData($this);
        $setData = [];
        foreach ($data as $key => $value) {
            $setData[] = "{$key} = '$value' ";
        }
        if($this->editable) {
            $this->sql = "UPDATE {$this->table} SET ".implode(', ', $setData)." WHERE {$this->pk} =  {$this->{$this->pk}}";
        }
        else {
            $this->sql = "INSERT INTO {$this->table} SET ".implode(', ', $setData);
        }

        $this->db->query($this->sql);

        if(!$this->editable) {
            $this->{$this->pk} = $this->db->insert_id();
            $this->editable = true;
        }

        $this->resetVars();
        return true;
    }

    /**
     * Delete data from database
     *
     * @return bool
     */
    public function delete()
    {
        $this->sql = "DELETE FROM {$this->table} WHERE {$this->pk} = '{$this->{$this->pk}}'";

        $this->db->query($this->sql);
        $data = $this->getLoadedData($this);

        foreach ($data as $key => $value) {
            unset($this->{$key});
        }
        $this->editable = false;
        $this->resetVars();

        return true;
    }
    /**
     * Builds select query based on the given
     * parameters set by the query builder
     * functions
     */
    private function buildSelect()
    {
        if(strpos($this->select, $this->pk) == false) {
            $this->select .= ', id';
        }
        $this->sql = "SELECT {$this->select} FROM {$this->table}";

        if(!empty($this->conditions)) {
            $this->sql .=" WHERE {$this->conditions}";
        }

        if(!empty($this->order)) {
            $this->sql .= " ORDER BY {$this->order}";
        }

        if(!empty($this->limit)) {
            $this->sql .= " LIMIT {$this->offset}, {$this->limit}";
        }

    }

    /**
     * Gets data loaded from the database
     * on the given object.
     *
     * @param BaseModel $obj
     * @return array
     */

    private function getLoadedData($obj)
    {
        $predefined = get_class_vars(get_class($obj));
        $all = get_object_vars($obj);

        $data = [];

        foreach ($all as $key => $value) {
            if(!key_exists($key, $predefined)) {
                $data[$key] = $value;
            }
        }

        return $data;
    }

    /**
     * Resets query builder variables
     * into their default values
     */
    private function resetVars()
    {
        $this->select = '*';
        $this->offset = 0;
        $this->limit = null;
        $this->conditions = null;
        $this->order = null;
        $this->sql = '';

    }
}














