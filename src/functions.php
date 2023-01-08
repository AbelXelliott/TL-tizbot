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
        $logger->log(curl_error($ch));
    } else {
        $logger->log($res);
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
function logger(String $msg="",$flush=false){
    static $buffer = [];
    if($flush){
        $logfile = fopen("logs/".date("Y-m-d"),"a");
        $indent = 0;
        foreach($buffer as $record){
            if($record==="\t"){
                $indent+=1;
                continue;
            }
            fwrite($logfile,$record);
            fwrite($logfile,"\n");
            fwrite($logfile,str_repeat("\t",$indent));
        }
        fclose($logfile);
    }
    else{
        array_push($buffer,$msg);
        return $msg;
    }
}