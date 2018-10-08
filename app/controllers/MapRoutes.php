<?php
    class MapRoutes extends Controller{


        public function index(){
            // $MapRoute = $this->model('MapRoutes_');
            // $query = $MapRoute->loadKey();
            // print_r($query);

            $this->view ('dashboard/index');
        }
        public function loadAdll(){
            $MapRoute = $this->model('MapRoutes_');
            $query = $MapRoute->Records();
            if($query){
                echo json_encode($query,JSON_UNESCAPED_UNICODE);
            }else{
                echo json_encode(array('error'=> TRUE,'message'=> 'No result found'));
            }
        }
    }
    
    