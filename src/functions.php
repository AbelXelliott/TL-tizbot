<?php
function dd($v){
    echo "<pre>".var_dump($v)."<pre>";
    die();
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
        logger("Bot Request Error: ".curl_error($ch));
    } else {
        logger("Bot Request Success: ".$res);
        return json_decode($res);
    }
}

function identifyTelegramServer(){
    $telegram_ip_ranges = [['lower' => '149.154.160.0', 'upper' => '149.154.175.255'],['lower' => '91.108.4.0','upper' => '91.108.7.255']];
    $ip_dec = (float) sprintf('%u', ip2long($_SERVER['REMOTE_ADDR']));
    $ok=false;
    foreach ($telegram_ip_ranges as $telegram_ip_range) {
    if (!$ok) {
        
        $lower_dec = (float) sprintf('%u', ip2long($telegram_ip_range['lower']));
        $upper_dec = (float) sprintf('%u', ip2long($telegram_ip_range['upper']));
        if ($ip_dec >= $lower_dec and $ip_dec <= $upper_dec) $ok=true; 

        }
    }
    if (!$ok) die("Go away...");
}

if(LOG_ENABLED){
function logger(...$records){
    static $buffer = [];
    if(!$records){
        if(!file_exists(LOG_ROOT)) mkdir(LOG_ROOT);
        $logfile = fopen(LOG_ROOT.date("Y-m-d"),"a");
        foreach($buffer as $record){
            fwrite($logfile,$record);
            fwrite($logfile,"\n");
        }
        fclose($logfile);
    }
    else{
        foreach($records as $record){
            array_push($buffer,$record);
        }
    }
}
}else{
function logger(){};
}

function fuckedup($msg){
    logger("FUCKED UP: ".$msg);
    logger(); //flush
    die();
}


function getUpdate(){
    logger("New update:");
    $update = file_get_contents('php://input');
    logger($update);
    return json_decode($update);
}