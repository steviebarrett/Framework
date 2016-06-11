<?php
/**
 * Created by PhpStorm.
 * User: stephen
 * Date: 29/05/2016
 * Time: 18:16
 */

require_once("ArrayMethods.php");
require_once("StringMethods.php");
require_once ("Inspector.php");

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
