<?php
class Logger{
    private $logfile;
    public function __construct($path="./logs"){
        $this->logfile = fopen($path,"a");
    }
    public function log(String $msg){
        fwrite($this->logfile,$msg);
    }
};
$logger = new Logger();