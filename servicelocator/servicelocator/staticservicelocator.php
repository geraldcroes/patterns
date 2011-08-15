<?php
require_once __DIR__.'/servicelocator.php';

class StaticServiceLocator
{
    private static $_serviceLocator = false;

    public static function setService($pServiceName, $pService)
    {
        return self::_serviceLocatorInstance()->setService($pServiceName, $pService);
    }

    public static function getService($pServiceName)
    {
        return self::_serviceLocatorInstance()->getService($pServiceName);
    }

    public static function __callStatic($pName, $pParameters)
    {
        return self::_serviceLocatorInstance()->$pName($pParameters);
    }

    private static function _serviceLocatorInstance()
    {
        if (self::$_serviceLocator === false) {
            self::$_serviceLocator = new ServiceLocator();
        }
        return self::$_serviceLocator;
    }
}