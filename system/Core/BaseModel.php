 <?php

namespace System\Core;
use System\DB\Database;

/**
 * Base model class containing query builder functions
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
    protected $limit;
    protected $conditions = null;
    protected $order = null;
    protected $sql = '';

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

    public function where($column, $value, $operator = "=")
    {
        if(empty($this->conditions)) {
            $this->conditions = "{$column} {$operator} '{$value}'";
        }
        else {
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
     public function orWhere($column, $value, $operator = "=")
     {
         $this->conditions = " OR{column} {operator} '{value}'";
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
        if(empty($this->order)) {
            $this->order = "{$column} {$direction}";
        }
        else {
            $this->order = ", {$column} {$direction}";
        }
        return $this;
    }

    /**
     *Builds select query and returns the data
     * provided
     * @return array
     */
    public function get()
    {
        $this->buildSelect();

        $result = $this->db->query($this->sql);
        $data = $this->db->fetch_assoc($result);

        $collection = [];

        foreach($data as $item) {
//            dd(get_class($this))

            $classname = get_class($this);
            $obj = new $classname;
//            dd($item);

            foreach ($item as $key => $value) {
                $obj->{$key} = $value;
            }

            $collection[] = $obj;
            return $collection;
        }
    }




    public function load($id) {
        $obj = $this->where($this->pk, $id)->single();

        if(!is_null($obj)) {
            $data = $this->getLoadedData($obj);

            foreach ($data as $key => $value) {

            }
        }
    }
    private function buildSelect()
    {
        $this->sql = "SELECT {$this->select} FROM {$this->table}";

        if(!empty($this->conditions)) {
            $this->sql .="WHERE {$this->conditions}";
        }

        if(!empty($this->order)) {
            $this->sql .= " ORDER BY {$this->order}";
        }

        if(!empty($this->limit)) {
            $this->sql .= "LIMIT {$this->offset}, {$this->limit}";
        }

    }

    private function getLoadedData($obj) {
        $predefined = get_class_vars(get_class($obj));
        $all = get_object_vars($obj);

        $data = [];

        foreach ($all as $key => $value) {
            if(!key_exists($key, $predefined)) {
                $data[$key] = $value;
            }
        }
    }
}