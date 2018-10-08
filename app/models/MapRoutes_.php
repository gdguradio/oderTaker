<?php
    include_once("/orderTaker/app/core/config/config.php");
    class MapRoutes_{

        public $_con;
        public $table;
        public $tablekey;

        function __construct() {
            parent::__construct();
            $this->_con = $this->dbh();
            $this->table = 'MapRouteRecords';
            $this->tatablekeyble = 'MapRouteKey';
        }

        public function loadAllRecords(){
            $queryselectall = "Select * from {$table}";
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
        public function loadKey(){
            $queryselectall = "Select MapRouteKey from {$tablekey}";
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
    }
    