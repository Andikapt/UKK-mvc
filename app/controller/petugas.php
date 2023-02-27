<?php

class petugas extends controller{
    public function index{
        $this->view("templates/header");
        $this->view("petugas/index");
        $this->view("templates/footer");
    }
}