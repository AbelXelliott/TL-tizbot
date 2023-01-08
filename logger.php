<?php
class Logger{
    private $logfile;
    public function __construct($path="./logs"){
        $this->logfile = fopen($path,"a");
    }
    public function log($msg){
        fwrite($this->logfile,$msg);
        return $msg;
    }
    public function __destruct(){
        fclose($this->logfile);
    }
};
$logger = new Logger();