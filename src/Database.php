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
        logger("Set entry <<$entry>> to <<$val>> for user:<<$id>> ...");
        $blob = fopen($this->root."/users/$id/$entry","w");
        if($blob===false) fuckedup("Failed to open entry!!!");
        $res = fwrite($blob,$val);
        if($res===false) fuckedup("Failed to write entry!!!");
        fclose($blob);
        logger("Entry(<<$id>>.<<$entry>>:<<$val>>) seccessfuly setted.");
    }

    public function addUser($id,...$info){
        logger("Adding user to database ...");
        $user = "$this->root/users/$id";
        logger("creating entity in : $user ...");
        $res = mkdir($user);
        if($res===false) fuckedup("Failed to create(mkdir) entity!!!");
        foreach($info[0] as $k => $v){
            $this->setEntry($user,$k,$v);
        }
        logger("Entity($id) successfuly created.");
    }

    public function isUser($id){
        return file_exists("$this->root/users/$id");
    }

    public function addAdmin($id){
        logger("Adding admin with id=<<$id>>");
        if($this->isUser($id)){
            $res = symlink("$this->root/users/$id","$this->root/admins/$id");
            logger("Adding admin(symlink) ".($res===true ? "Successed.":"Failed."));
            return $res;
        }
        else{
            logger("This id=<<$id>> is NOT a user.");
            return false;
        }
    }

    public function isAdmin($id){
        return file_exists("$this->root/admins/$id");
    }

    public function createSuperAdmin($id){
        fuckedup("NOT IMPELENTED YET");
    }

    public function isSuperAdmin($id){
        return file_exists("$this->root/superadmin/$id");
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
        $ok = array_count_values(scandir("$this->root/superadmin"))===3;
    }
}