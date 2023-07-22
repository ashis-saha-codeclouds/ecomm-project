<?php
interface QueryBuildInterface{
    public function _selectData($tableName,$columns,$conditions);
    public function _updateData($tableName,$params,$conditions);
    
}

?>