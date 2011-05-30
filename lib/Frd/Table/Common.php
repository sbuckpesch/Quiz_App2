<?php
/*
 * for table which only have a column as primary key (e.g. id)
 *
 * functions:
 *  load :  load a record
 *  loadBy:  load record(s) by column
 *  save:   update or insert
 *  delete:  delete a record
 *  getColumns:  get column names
 *
 * Usage:
 *  $table=new Frd_Table_Common('users','id');
 *  $table->name='fred';
 *  echo $table->save();
 *
 *  if($table->load(1) == true)
 *    echo $table->name; 
 *
 *  $table->delete(1);
 */
class Frd_Table_Common  extends Zend_Db_Table
{
    protected $data=array();
    protected $has_load=false;

    protected $primary_key=null;
    protected $primary_value=null;
    protected $last_insert_id=0;

    /*
     * @param table   string   table name
     * @param primary string   primary key
     */
    function __construct($table,$primary)
    {
        parent::__construct();

        $this->_name=$table;
        $this->_primary=$primary;


        $this->primary_key=$primary;

        //check if table name is correct
        try{
            $this->find(1);
        }
        catch(Zend_Db_Table_Exception $e)
        {
            echo "Table or Primary key not exists ( $table.$primary )";
            echo "<br/>\n";
            echo __FILE__;
            echo " : ";
            echo __LINE__;
            echo "<br/>\n";
            echo "Detail:".$e->getMessage(); 
        }
    }

    function __set($key,$value)
    {
        $this->data[$key]=$value;	
    }

    /*
     * get column
     *
     * @param key column name
     * @return the column's value  or null if not exists (must use  === nuul to check it)
     */
    function __get($name)
    {
        if(isset($this->data[$name]))
            return $this->data[$name];
        else
            return null;
    }

    /*
     * save recored 
     *
     * @return  lastinertid  for update is 0 , for insert is the last insert id
     */
    function save()
    {
        if($this->has_load == true)
        {
            $where=$this->_db->quoteInto($this->primary_key."=?",$this->primary_value);
            $this->update($this->data,$where);
            return 0;
        }
        else
        {
            $this->last_insert_id=$this->insert($this->data);
            return $this->last_insert_id;
        }
    }


    /*
     * load recored 
     *
     * @param id int   primary key
     *
     * @return  true if load success, false if failed (not exists or exception)
     */
    function load($id)
    {
        $success=false;

        $rows=$this->find($id);
        $rows=$rows->toArray();

        if(empty($rows))
        {
            $this->data=array();
            $success=false;
            $this->has_load=false;
        }
        else
        {
            $success=true;
            //返回数组,可能包含多个数据,只需要第一个
            $this->data=$rows[0];
            $this->has_load=true;
            $this->primary_value=$this->data[$this->primary_key];
        }


        return $success;
    }
    /*
     * load by another column
     *
     * @return array   recored which column = $value , if do not have any recored, return array()
     */
    function loadBy($name,$value)
    {
        $success=false;

        //handle column name
        $name=$this->handleColumnName($name);

        $select=$this->_db->select();

        $select->from($this->_name);
        $select->where($name."=?",$value);

        try
        {
            return $this->_db->fetchAll($select);
        }
        catch(Exception $e)
        {
            echo $e->getMessage(); 
            echo "<br/>\n";
            echo __FILE__;
            echo ' : ';
            echo __LINE__;
        }
    }

    /*
     * after save , get lastinsertid
     */
    function lastinsertid()
    {
        return $this->last_insert_id;
    }

    /*
     * delete recored
     *
     * @param key    primary key
     *
     */
    function delete($key)
    {
        $where=$this->_db->quoteInto($this->primary_key."=?",$key);
        parent::delete($where);
    }

    function toArray()
    {
        return $this->data;
    }

    /*
     * get columns 
     *
     * @return array  of column's name
     */
    function getColumns()
    {
        $columns=$this->_db->describeTable($this->_name);

        return array_keys($columns);
    }
    /*
     * handle  column's name for safe
     * column name can not have (',",\,/,?...)
     *
     * @param name string column name
     * @return name string handled  column name
     */
    function handleColumnName($name)
    {
        $filter=array('"',"'",'/','\\','?',';');
        $replace=array('','','','','','');
        return str_replace($filter,$replace,$name);
    }
}
