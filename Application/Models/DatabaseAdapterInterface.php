<?php

interface DatabaseAdapterInterface{
    function setConnectionInfo($values=array());
    function closeConnection();

    function runQuery($sql,$parameters=array());
    function fetchField($sql,$parameters=array());
    function fetchRow($sql,$parameters=array());
    function fetchAsArray($sql,$parameters=array());

    function insert($tableName,$parameters=array());
    function getLastInsertId();
    function update($tableName,$upadateParameters=array(),$whereCondition='',$whereParameters=array());
    function delete($tableName,$whereCondition=null,$whereParameters=array());
    function getNumRowsAffected();
}