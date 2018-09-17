<?php
include_once("crud.php");
//include_once("../config/config.php");
//$con = new connect_pdo();
$crud = new Crud();

$action =  $_POST['action'];
$data =  $_POST['data'];
$sysid="";
if(!empty($_POST['sysid']) && isset($_POST['sysid'])){
    $sysid=$_POST['sysid'];
}



switch (strtolower($action)):
    case("selectall"):
        $table = "list_tbl";
        $selectall = $crud->selectall($table);
        
        echo $selectall;
        break;
    case("add"):
        $table = "list_tbl";
        $insert = $crud->insert($table,$data);
        
        echo $insert;
        break;
    case("edit"):
        $table = "list_tbl";
        $edit = $crud->update($table,$data ,$sysid);
        
        echo $edit;
        break;
    case("delete"):
        $table = "list_tbl";
        $delete = $crud->delete($table,$data ,$sysid);
        
        echo $delete;
        break;
endswitch;
?>
