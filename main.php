<?php
require "API_KEY.php";
require "src/functions.php";
require "src/Database.php";

identifyTelegramServer();
logger("New update:");

$update = getUpdate();
$msg = $update->message;
$text = $msg->text;
$first = $msg->from->first_name;
$last = $msg->from->last_name;
$chat_id = $msg->chat->id;
$from_id = $msg->from->id;
$message_id = $msg->message_id;

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

// ini_set( "expose_php","Off" );
// ini_set( "Allow_url_fopen","Off" );
// ini_set( "disable_functions","exec,passthru,shell_exec,system,proc_open,popen,curl_exec,curl_multi_exec,parse_ini_file,show_source,eval,file,file_get_contents,file_put_contents,fclose,fopen,fwrite,mkdir,rmdir,unlink,glob,echo,die,exit,print,scandir" );
// ini_set( "max_execution_time","25" );
// ini_set( "max_input_time","25" );
// ini_set( "memory_limit","15M" );
// ini_set( "file_uploads","Off" );
// ini_set( "post_max_size","10k" );
// error_reporting( 0 );
// ini_set( "log_errors","Off" );
?>