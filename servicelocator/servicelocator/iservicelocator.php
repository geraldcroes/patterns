<?php
interface IServiceLocator
{
    public function getService($pServiceName);
    public function setService($pServiceName, $pService);
}