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
                unset($url[0]); // untuk mengunset $url index menjadi 0 value
            }
        }

        require_once "../app/controllers/{$this->controller}.php"; // mengambil file controller
        $this->controller = new $this->controller; // inisiasi class controller dari file controller

        if(isset($url[1])){ //untuk mengecek apakah $url berada pada index value 1 (value untuk method)
            $this->method = $url[1]; //untuk memasukan $url index value 1 ke method variable
            unset($url[1]); //untuk meng-unset si $url index value 1
        }
    } 
    
    if(!empty($url)){ //mengejek jika si $url valuenya tidak kosong dan menjalankan perintah dibawah ini
        $this->params = array_values($url);

    call_user_func_array([$this->controller, $this->method], $this->params); // memanggil semua variable untuk dijalankan
    
}

    public function parseUrl(){
        if(isset($_GET["url"])){ // Mengecek apakah $url ada atau tidak
            $url = rtrim($_GET["url"], "/"); // untuk menghapus "/" menjadi sebuah url saja
            $url = fillter_var($url, FILTER_SANITIZE_URL); //menghapus semua karakter kecuali tulisan, digit , dan lain lainnya
            $url = explode("/" , $url); //explode fuction adalah untuk menghentikan string yang sudah mempunya function sebelumnya 
            return $url;
        }
    }  
}