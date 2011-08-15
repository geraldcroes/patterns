<?php
//Including a static service locator
require __DIR__ . '/../servicelocator/staticservicelocator.php';

class LogUsingLocator
{
    public function add ($pText)
    {
        StaticServiceLocator::getWriter()->write(sprintf("%s - %s \n\r", date('d-m-Y H:i:s'), $pText));
    }
}