<?php
require "settings.php";
require "src/functions.php";
require "src/Database.php";

identifyTelegramServer();

$update = getUpdate();
$msg = $update->message;
$text = $msg->text;
$first = $msg->from->first_name;
$last = $msg->from->last_name;
$chat_id = $msg->chat->id;
$from_id = $msg->from->id;
$message_id = $msg->message_id;

$db = new DataBase(DATA_ROOT);
switch($db->modeOf($from_id)){
    case DataBase::SuperAdmin:
        require "src/superadminOPS.php";
    case DataBase::Admin:
        require "src/adminOPS.php";
    case DataBase::User:
        require "src/userOPS.php";
        $db->setEntry($from_id,"lastActivity",time());
        break;
    case DataBase::None:
        require "src/userOPS.php";
        $db->addUser($from_id,["last"=>$last,"first"=>$first,"firstActivity"=>time(),"lastActivity"=>time()]);
}

logger(); // flush logs
?>