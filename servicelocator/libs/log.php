<?php
class Log
{
    private $_writer;

    public function __construct()
    {
       $this->_writer = new FileWriter('/tmp/demo_log.txt');
    }

    public function add ($pText)
    {
        $this->_writer->write(sprintf("%s - %s \n\r", date('d-m-Y H:i:s'), $pText));
    }
}