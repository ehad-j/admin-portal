<?php
class Connection{
    static public function connector(){
        $link = new PDO("mysql:host=remotemysql.com;dbname=wD0qWw5vgI","wD0qWw5vgI","T4tcWrKTnX");
        $link -> exec("set names utf8");
        return $link;
    }
}
