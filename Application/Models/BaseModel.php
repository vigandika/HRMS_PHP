<?php


class BaseModel{
    protected $adapter;
    protected $table;
    protected $modelName;
    protected $columnNames=array();
    public $id;

    public function __construct($table){
        $this->adapter=DB::getInstance();
        $this->table=$table;
        $this->setTableColumns();
    }

    protected function setTableColumns(){
        $columns=$this->getColumns();
        foreach ($columns as $column){
            $this->columnNames[]=$column->Field;
            $this->{$columnNames}=null;
        }
    }

    public function getColumns(){
        return $this->adapter->getColumns($this->table);
    }
}