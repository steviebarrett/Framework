<?php

ini_set("display_errors", 1);
error_reporting(E_ALL);
/**
 * Created by PhpStorm.
 * User: stephen
 * Date: 29/05/2016
 * Time: 18:16
 */
set_include_path("../");

echo "Hello world";
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

$insp = new \Framework\Inspector(Controller);

print_r($insp->getClassMeta());
//print_r($insp->getMethodMeta("authenticate"));
//print_r($insp->getClassProperties());
//print_r($insp->getPropertyMeta("$_secret"));

