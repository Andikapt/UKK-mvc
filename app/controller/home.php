<?php
// ini tidak beda jauh dari controller auth.php
    class Home extends Controller{
        public function index(){
            $this->view("templates/header");
            $this->view("home/index");
            $this->view("templates/footer");
        }
    }