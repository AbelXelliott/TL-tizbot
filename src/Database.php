<?php
class DataBase {
    // UserMode enum
    public const SuperAdmin=0;
    public const Admin=2;
    public const User=3;
    public const None=4;

    private $root;

    public function __construct($_root="data"){
        $this->root = $_root;
    }

    public function getUsers(){
        return scandir($this->root."/users");
    }

    public function setEntry($id,$entry,$val){
        $blob = fopen($this->root."/users/$id/$entry","w");
        fwrite($blob,$val);
        fclose($blob);
    }

    public function addUser($id,...$info){
        $user = $this->root."/users/$id";
        mkdir($user);
        foreach($info as $k => $v){
            $this->addBlob($user."/$k",$v);
        }
    }

    public function isUser($id){
        return file_exists($this->root."/users/$id");
    }

    public function addAdmin($id){
        if($this->isUser($id)){
            return symlink($this->root."/users/$id",$this->root."/admins/$id");            
        }
        else{
            return false;
        }
    }

    public function isAdmin($id){
        return file_exists($this->root."/admins/$id");
    }

    public function isSuperAdmin($id){
        return file_exists($this->root."/superadmin/$id");
    }

    public function modeOf($id){
        if($this->isSuperAdmin($id)){
            return Database::SuperAdmin;
        }
        elseif($this->isAdmin($id)){
            return Database::Admin;
        }
        elseif($this->isUser($id)){
            return Database::User;
        }
        else{
            return Database::None;
        }
    }

    public function sanityCheck(){
        $ok = false;
        $ok = array_count_values(scandir($this->root."superadmin"))===3;
    }
    
    private function addBlob($key,$value){
        $blob = fopen($key,'w');
        fwrite($blob,$value);
        fclose($blob);
    }
}
$db = new DataBase();