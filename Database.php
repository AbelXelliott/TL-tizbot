<?php
class DataBase {
    private $root;

    public function __construct($_root="data"){
        $this->root = $_root;
    }

    public function getUsers(){
        return scandir($this->root."/users");
    }

    public function addUser($id,...$info){
        $user = $this->root."/users"."/$id";
        mkdir($user);
        foreach($info as $k => $v){
            $this->addBlob($user."/$k",$v);
        }
    }
    
    private function addBlob($key,$value){
        $blob = fopen($key,'w');
        fwrite($blob,$value);
        fclose($blob);
    }
}