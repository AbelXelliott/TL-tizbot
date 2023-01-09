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
        return array_slice(scandir($this->root."/users"),2); // delete . , .. from scandir result;
    }

    public function setEntry($id,$entry,$val){
        $blob = fopen($this->root."/users/$id/$entry","w");
        fwrite($blob,$val);
        fclose($blob);
    }

    public function addUser($id,...$info){
        logger("Adding user to database ...");
        $user = $this->root."/users/$id";
        logger("creating entity in : $user ...");
        if(mkdir($user)){
            logger("Entity successfuly created!");
        }
        foreach($info[0] as $k => $v){
            logger("adding entry to $user ...");
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
            logger("$id is SuperAdmin");
            return Database::SuperAdmin;
        }
        elseif($this->isAdmin($id)){
            logger("$id is Admin");
            return Database::Admin;
        }
        elseif($this->isUser($id)){
            logger("$id is User");
            return Database::User;
        }
        else{
            logger("$id is Not a User");
            return Database::None;
        }
    }

    public function sanityCheck(){
        $ok = false;
        $ok = array_count_values(scandir($this->root."superadmin"))===3;
    }
    
    private function addBlob($key,$value){
        logger("adding entry: $key ...");
        $blob = fopen($key,'w');
        if($blob) logger("entry successfly created ...");
        if(!(fwrite($blob,$value)===false)) logger("entry filled with $value !");
        fclose($blob);
    }
}
$db = new DataBase();