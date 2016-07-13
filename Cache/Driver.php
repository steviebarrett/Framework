<?php
/**
 * Created by PhpStorm.
 * User: stephen
 * Date: 13/07/2016
 * Time: 10:56
 */

namespace Framework\Cache;

use \Framework\Base as Base;
use \Framework\Cache\Exception as Exception;

class Driver extends Base
{
    public function initialize() {
        return $this;
    }

    protected function _getExceptionForImplementation($method)
    {
        return new Exception\Implemtation("{$method} not implemented");
    }
}