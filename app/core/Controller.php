<?php

class Controller{ //class controller fungsinya sebagai mengontroll website menggunakan url yang sudah di dapatkan di class App.php
    public function view($view, $data, = []){ // function view di pakai untuk menunjukan view website yang akan di tampilkan pertama kali
        require_once "../app/views/{$view}.php"; // Mengambil file view dari folder views
    }

    public function model($model){ // Function model untuk memilih model apa yang ingin di request untuk data
        require_once "../app/models/{$model}.php"; // mengambil file mode dari folder file 
        return new $model; // Mengembalikan inisiasi class sebagai hasil dari model function , jadi itu yang bisa kamu gunakan di Controller Class
    }
}      