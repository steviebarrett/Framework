<?php
/**
 * Created by PhpStorm.
 * User: stephen
 * Date: 11/06/2016
 * Time: 13:02
 */

namespace Framework\Configuration;

use Framework\Base as Base;
use Framework\Configuration\Exception as Exception;

class Driver extends Base {

    protected $_parsed = array();

    public function initialize() {
        return $this;
    }

    protected function _getExceptionForImplementation($method) {
        return new Exception\Implementation("{$method} method not implemented");
    }
}