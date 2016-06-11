<?php
/**
 * Created by PhpStorm.
 * User: stephen
 * Date: 11/06/2016
 * Time: 13:48
 */

namespace Framework;

use Framework\Base as Base;
//use Framework\Configuration as Configuration;
use Framework\Configuration\Exception as Exception;

class Configuration extends Base {

    /**
     * @readwrite
     */
    protected $_type;

    /**
     * @readwrite
     */
    protected $_options;

    protected function _getExceptionForImplementation($method) {
        return new Exception\Implementation("{$method} not implemented");
    }

    public function initialize() {
        if (!$this->_type) {
            throw new Exception\Argument("Invalid type");
        }

        switch ($this->_type) {
            case "ini": {
                return new Configuration\Driver\Ini($this->_options);
                break;
            }
            default: {
                throw new Exception\Argument("Invalid type");
                break;
            }
        }
    }
}