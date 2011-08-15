<?php
class FileWriter
{
    protected $_fileName;

    public function __construct ($pFileName)
    {
        $this->_fileName = $pFileName;
    }
    public function write($pText)
    {
        file_put_contents($this->_fileName, $pText);
    }
}