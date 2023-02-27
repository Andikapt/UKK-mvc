<?php 

class admin extends Controller{
    public function index(){
        $data = [
            'users' => $this->model("User_model")->getAllUsers(),
        ];
        $this->view("templates/header");
        $this->view("admin/index");
        $this->view("templates/footer");
    }
    public function addPetugas(){
        $this->view("templates/header");
        $this->view("admin/add");
        $this->view("templates/footer");
    }

    public function addUser(){
        $this->view("templates/header");
        $this->view("admin/addUser");
        $this->view("templates/footer");
    }

    public function editPetugas($id){
        $data = [
            'user' => $this->model("User_model")->getUserById($id)
        ];
        $this->view("templates/header");
        $this->view("admin/edit", $data);
        $this->view("templates/footer");
    }

    public function addUserAction(){
        if($this->model("User_model")->addUser($_POST) > 0){
            header("Location: " . BASE_URL . "/admin/index");
        } else{
            header("Location: " . BASE_URL . "/admin/index");
        }
    }

    public function addPetugasAction(){
        if($this->model)("User_model")->addPetugas($_POST) > 0){
            header("Location: " . BASE_URL . "/admin/index");
        } else{
            header("Location: " . BASE_URL . "/admin/index");
        }
    }

    public function editPetugasAction(){
        if($this->model("User_model")->editUser($_POST) > 0){
            header("Location: " . BASE_URL . "/admin/index");
        } else{
            header("Location: " . BASE_URL . "/admin/index")
        }
    }

    public function deletePetugasAction(){
        if($this->model("User_model")->deleteUser($_POST) > 0){
            header("Location: " . BASE_URL . "/admin/index");
        } else{
            header("Location: " . BASE_URL . "/admin/index");
        }
    }
}