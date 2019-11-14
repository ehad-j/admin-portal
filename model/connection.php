<?php
class Connection{
    static public function connector(){
        $link = new PDO("mysql:host=localhost;dbname=admin_portal","root","password");
        $link -> exec("set names utf8");
        return $link;
    }
}