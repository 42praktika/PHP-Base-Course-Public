<?php
//
//namespace app\core;
//
//use Psr\Log\AbstractLogger;
//
//class Logger extends AbstractLogger
//{
//    protected string $filename;
//
//    public function __construct(string $filename)
//    {
//        $this->filename = $filename;
//        $directory = dirname($filename);
//        if(file_exists($directory)){
//            return;
//        }
//        $status = mkdir($directory, 0777, true);
//        if(!$status) throw new \RuntimeException();
//    }
//
//
//    public function log($level, $message, array $context = array())
//    {
//        file_put_contents($this->filename,date("H-m-s")." [$level] $message");
//    }
//}