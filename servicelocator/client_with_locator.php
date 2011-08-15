<?php
//Including writers for the demo, this does not have to be included
// in the client file itself but prepared elsewhere
require __DIR__.'/libs/echowriter.php';
require __DIR__.'/libs/filewriter.php';

//Including the Log class that uses the ServiceLocator
require __DIR__.'/libs/logusinglocator.php';

//injection d'un Writer de type EchoWriter dans Log
StaticServiceLocator::setService('Writer', new EchoWriter());
$log = new LogUsingLocator();
$log->add('Bonjour le monde du log qui utilise un Service Locator');

//injection d'un writer de type FileWriter dans log
StaticServiceLocator::setService('Writer', new FileWriter('/tmp/log_locator.txt'));
$log->add('Bonjour le monde du log qui utiliser un Service Locator');