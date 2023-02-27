<?php

//class auth adalah controller untuk autentikasi seperti login, register, logout , dll

    class Auth extends Controller {
        //function atau metod dinamakan index untuk mengontrol apa yang akan di tunjukan , dan juga kamu bisa merequest data dari model
        public function index(){
            //seperti contoh merequest data dari model 
            $data ['$user'] = $this ->model("User_model")->getAllUser();
            $this->view("templates/header");
            //setelah mendapakan data dari model, masukan kedalam, masukan kedalam function view, kemudian lihat lah yang di bawah ini

            //jika kamu memiliki $data['contoh'] lebih dari satu variable, kamu tidak perlu menulis semuanya kedalam view function
            //cukup tulis $data, dan semua data kamu akan masuk kedalam function ini 
            $this->view("auth/login", $data);
            $this->view("templates/footer");
        }

        public function register(){
            $this->view("templates/header");
            $this->view("auth/register");
            $this->view(templates/footer);
        }

        public function login(){
            if($_POST['username'] == 'admin' && $_POST['password'] == 'admin'){
                header("Location: " . BASE_URL . "/admin");
            } else{
                $user = $this->model("User_model")->getUserByUsername($_POST['username']);
                if($this->model("User_model")->authByUsername($_POST) > 0){
                    if($user['role'] == '1'){
                        header("Location: " . BASE_URL . "/Petugas");
                    } else{
                        header("Location " . BASE_URL . "/home");
                    }
                } else{
                    header("Location: " . BASE_URL . "/auth");
                }
            }
        }

        public function regisUser(){
            if($this->model("User_model")->addUser($_POST) > 0){
                header("Location: " . BASE_URL . "/login");
            } else{
                header("Location: ". BASE_URL . "/auth");
            }
        }

        public function logout(){
            session_unset();
            session_destroy();
            header("Location: " . BASE_URL . "/auth/login");
        }
    }