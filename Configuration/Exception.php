<?php
/**
 * Created by PhpStorm.
 * User: stephen
 * Date: 11/06/2016
 * Time: 13:05
 */

namespace Framework\Configuration {

    class Exception extends \Framework\Core\Exception {
    }
}

namespace Framework\Configuration\Exception {
    class Implementation extends \Framework\Configuration\Exception {
    }
    class Argument extends \Framework\Configuration\Exception {}
}

