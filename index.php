<?php

echo <<<HTML

<!DOCTYPE html>
<html>

    <head>
    
        <title>! Framework !</title>
    </head>
HTML;

ini_set("display_errors", 1);
error_reporting(E_ALL);
set_include_path("../");    //Framework isn't in the include path - index.php will need to be one level up

echo "Hello world";

/*
define('MEMCACHED_HOST', '127.0.0.1');
define('MEMCACHED_PORT', '11211');
$memcache = new Memcached;
$cacheAvailable = $memcache->addServer(MEMCACHED_HOST, MEMCACHED_PORT);

$memcache->set("name", "stevie");

$name = $memcache->get("name");

print_r($name);
die();
*/

/*
 * Autoload function for now
 * TODO: Move to class
 */
function autoload($class) {
    $paths = explode(PATH_SEPARATOR, get_include_path());
    $flags = PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE;
    $file = strtolower(str_replace("\\", DIRECTORY_SEPARATOR, trim($class, "\\"))).".php";

    foreach($paths as $path) {
        $combined = $path.DIRECTORY_SEPARATOR.$file;
        if(file_exists($combined)) {
            include($combined);
            return;
        }
    }
    throw new Exception("{$class} not found");
}
spl_autoload_register("autoload");
/*
 * ///
 */

/*
 * Cache test
 */
function getFriends() {
    $cache = new Framework\Cache(array("type" => "memcached"));
    $driver = $cache->initialize();
    $driver->connect();

    $friends = $driver->get("name");
    if (empty($friends)) {
        $driver->set("name", "stevie");
    }
    return $friends;
}
print_r(getFriends());
print_r(getFriends());
die();

/*
 * Configuration file and code test
 */
$config = new \Framework\Configuration\Driver\Ini();
$myConf = $config->parse("_configuration");
print_r($myConf);
echo "<h2>host: {$myConf->database->default->host} </h2>";

/**
 * Class Controller
 * @readwrite
 */
class Controller {

    /**
     * @readwrite
     */
    protected $_view;
    public $testVar;
    private $_secret = "ishikawa";

    /**
     * @once
     */
    public function authenticate() {
        echo "You are in";
    }


}

//Inspector test
$insp = new \Framework\Inspector(Controller);

print_r($insp->getClassMeta());
print_r($insp->getMethodMeta("authenticate"));
print_r($insp->getClassProperties());
//print_r($insp->getPropertyMeta("$_secret"));


echo <<<HTML
</html>
HTML;
