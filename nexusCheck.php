<?php
use Monolog\Logger;

require 'vendor/autoload.php';

$parameters = \Symfony\Component\Yaml\Yaml::parse(file_get_contents('config.yml'));

$logger = new Logger('default');
$logger->pushHandler(new \Monolog\Handler\SyslogHandler('nexusCheck'));
$logger->pushHandler(new \Monolog\Handler\NativeMailerHandler($parameters['email'], 'Nexus is Availble', 'nexusCheck@op.pl'));
$logger->pushHandler(new \Monolog\Handler\StreamHandler('php://stderr'));

$client  = new \Behat\Mink\Driver\Goutte\Client();
$client->setClient(new \Guzzle\Http\Client('', array()));
$driver = new \Behat\Mink\Driver\GoutteDriver($client);
$session = new \Behat\Mink\Session($driver);

$session->start();
$session->visit($parameters['url']);
$page = $session->getPage();
$soldOutElement  = $page->find('css', $parameters['watched_element_class']);

if( ! $soldOutElement instanceof \Behat\Mink\Element\NodeElement ) {
    $logger->log(\Monolog\Logger::ALERT, "Nexus is availble or nexusCheck has problems, visit: " . $parameters['url']);
}
else {
    $logger->log(\Monolog\Logger::INFO, 'Nexus is not availble');
}

