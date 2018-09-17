<?php
include_once("../config/config.php");

class Crud extends connect_pdo {

    public $_con;

    function __construct() {
        parent::__construct();
        $this->_con = $this->dbh();
    }
    function selectall($table_name) {

        $queryselectall = "Select * from {$table_name}";
        $selectall = $this->_con->prepare($queryselectall);
        if ($selectall->execute()) {
            if ($selectall->rowCount() > 0) {
                $result = $selectall->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($result, JSON_UNESCAPED_UNICODE);
            }else{
                echo array('error'=> TRUE, 'message'=> 'No result found.');
            }
        }
    }
    
    function insert($table_name, $res) {

        parse_str($res, $data);

        $limit = count($data);
        $ctr = 0;
        $columns = "";
        $values = "";
        foreach ($data as $key => $value) {
            $ctr++;
            $columns.= "{$key}";
            $values .= ":{$key}";
            if ($ctr < $limit) {
                $columns.= ",";
                $values .= ",";
            }
        }
        $query = "INSERT INTO {$table_name} ({$columns})VALUES({$values})";
        try {
            $create = $this->_con->prepare($query);
            foreach ($data as $key => $value) {
                $keys = ":{$key}";
                $create->bindValue($keys, $value, PDO::PARAM_STR);
            }
            if ($create->execute()) {
                $lastinserted_id = $this->_con->lastInsertId();
                echo json_encode(array('error'=> FALSE, 'message'=> 'Data successfully added.','query'=> $query), JSON_UNESCAPED_UNICODE);
                
            } else {
                echo json_encode(array('error' => TRUE, 'message' => 'Execution failed, please contact system support!'), JSON_UNESCAPED_UNICODE);
                
                
            }
        } catch (Exception $ex) {
            echo json_encode(array('error' => TRUE, 'message' => $ex), JSON_UNESCAPED_UNICODE);
                
        }
    }
    
    function update($table_name,$res,$sysid){
        
        parse_str($res, $data);
        
        $limit = count($data);
        $ctr = 0;
        $columns = "";
        foreach($data as $key => $value){
            $ctr++;
            $columns .= "{$key} = :{$key}";
            
            if($ctr < $limit){
                $columns .= ",";
            }
        }
        $where = " sys_id = {$sysid}";
        $query = "UPDATE {$table_name} SET {$columns} WHERE {$where}";
        try{
            $update = $this->_con->prepare($query);
            foreach($data as $key => $value){
                $var = ":{$key}";
                $update->bindValue($var,$value,PDO::PARAM_STR);
            }
            if($update->execute()){
                echo json_encode(array('error'=> FALSE, 'message'=> 'Data successfully updated.','query'=> $query), JSON_UNESCAPED_UNICODE);
            }
        } 
        catch (Exception $ex){
            echo json_encode(array('error'=> TRUE,'message'=> 'Execution failed, please contact system support','message2'=> $ex, 'query'=> $query), JSON_UNESCAPED_UNICODE);
        }
    }
    function delete($table_name,$res,$sysid){
        
        $query = "DELETE FROM {$table_name} WHERE sys_id = :sysid";
        try{
            $delete = $this->_con->prepare($query);
            $delete->bindValue(":sysid",$sysid,PDO::PARAM_STR);
            if($delete->execute()){
                echo json_encode(array('error'=> FALSE, 'message'=> 'Data successfully deleted.','query'=> $query), JSON_UNESCAPED_UNICODE);
            }
        } 
        catch (Exception $ex){
            echo json_encode(array('error'=> TRUE,'message'=> 'Execution failed, please contact system support','message2'=> $ex, 'query'=> $query), JSON_UNESCAPED_UNICODE);
        }
    }
}
?>