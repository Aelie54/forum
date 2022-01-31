<?php
namespace App;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";
require_once 'dotenv.php';

(new DotEnv())->load();

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$proxyDir = __DIR__."/src/Proxies";
$cache = null;
$useSimpleAnnotationReader = false;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src/Entity"), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);
$config->setAutoGenerateProxyClasses(1);
// or if you prefer yaml or XML
// $config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
// $config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);

// database configuration parameters
$conn = array(
    'driver' => 'pdo_mysql',
    'user'     => getenv('106139_amelie'),
    'password' => getenv('putmej-tizfo5-fegfiJ'),
    'dbname'   => getenv('pawolanmwen_amelie'),
    'host'     => getenv('mysql-pawolanmwen.alwaysdata.net')
);

// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);

