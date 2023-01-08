<?php
function dd($v){
    echo "<pre>".var_dump($v)."<pre>";
    die();
}
function sendaction($chat_id, $action){
    bot('sendchataction',[
        "chat_id"=>$chat_id,
        'action'=>$action
    ]);
}
function save($filename,$TXTdata){ // Unused!!!!
	$myfile = fopen($filename, "w") or die("Unable to open file!");
	fwrite($myfile, "$TXTdata");
	fclose($myfile);
}