<?php 

class App{
    protected $controller = "home" ; // untuk variable controller,untuk menyiapkan default controller file di dalam website 
    protected $method = "index" ; // Method variable , untuk menyiapkan default method dari file controller  untuk website
    protected $params = []; // Params variable

    public function __construct() //Construct function, itu untuk menjalankan class yang di inisiasikan 
    {
        $url = $this->parseUrl(); // $url variable, dimana tempat untuk hasil akan kembali ke parseUrl
        if(isset($url[0])){ // Mengecek variable url di index 0, tidak peduli value yang di keluarkan ada atau tidak (value untuk controller)
            if(file_exists("../app/controller/{$url[0]}.php")){ //untuk mengecek file yang bernamakan controller valuenya berada di $url index 0 
                $this->controller = $url[0]; // memasukan $url index 0 kedalam controller variable 
            }
        }
    }

}