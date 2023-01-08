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
function bot($method,$datas=[]){
    global $logger;
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        $logger->log(curl_error($ch));
    } else {
        $logger->log($res);
        return json_decode($res);
    }
}