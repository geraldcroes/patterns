<?php
require_once __DIR__.'/iservicelocator.php';

class ServiceLocatorException extends Exception
{

}

class ServiceLocator implements IServiceLocator
{
    private $_services = array();

    public function getService ($pServiceName)
    {
       if (isset($this->_services[strtolower($pServiceName)])) {
           return $this->_services[strtolower($pServiceName)];
       }
       throw new ServiceLocatorException("Service $pServiceName is not configured yet");
    }

    public function setService ($pServiceName, $pService)
    {
        $this->_services[strtolower($pServiceName)] = $pService;
        return $this;
    }

    public function __call ($pName, $pParameters)
    {
        if (strpos(strtolower($pName), 'get') === 0) {
            return $this->getService(substr($pName, 3));
        }else{
            echo $pName;
        }
    }
}