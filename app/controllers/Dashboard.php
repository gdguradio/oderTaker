<?php
    class Dashboard extends Controller{
        public function index($name = 'Alex' , $mood = 'happy'){
            $user = $this->model('User');
            $user->name = $name;
            $this->view (
                'dashboard/index',[
                    'name' =>$user->name,
                    'mood' => $mood
                ]
            );
        }
        public function test(){
            echo "test";
        }
    }
    
    